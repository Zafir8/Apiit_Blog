<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Main Content')->schema([
                TextInput::make('title')
                    ->required()
                    ->minLength(1)
                    ->maxLength(150)
                    ->live()
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->minLength(1)
                    ->maxLength(150)
                    ->unique(Post::class, 'slug', fn ($record) => $record),
                RichEditor::make('body')
                    ->required()
                    ->fileAttachmentsDirectory('posts/images')
                    ->columnSpanFull(),
            ])->columns(2),
            Section::make('Meta')->schema([
                FileUpload::make('image')
                    ->image()
                    ->directory('posts/thumbnails'),
                DateTimePicker::make('published_at')
                    ->nullable(),
                Checkbox::make('featured'),
                Checkbox::make('is_approved') // Adding the approval checkbox
                ->label('Approved')
                    ->visible(fn () => Auth::user()->isAdmin()), // Visible only to admins
                Select::make('user_id')
                    ->relationship('author', 'name')
                    ->options([Auth::id() => Auth::user()->name])
                    ->searchable()
                    ->default(Auth::id())
                    ->required(),
                Select::make('categories')
                    ->multiple()
                    ->relationship('categories', 'title')
                    ->searchable(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image'),
            TextColumn::make('title')
                ->sortable()
                ->searchable(),
            TextColumn::make('slug')
                ->sortable()
                ->searchable(),
            TextColumn::make('author.name')
                ->sortable()
                ->searchable(),
            TextColumn::make('published_at')
                ->date('Y-m-d')
                ->sortable()
                ->searchable(),
            CheckboxColumn::make('featured'),
            CheckboxColumn::make('is_approved') // Show approval status in the table
            ->label('Approved')
                ->sortable(),
        ])->filters([
            Tables\Filters\TrashedFilter::make(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            // Your relations here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Adjusting the query to ensure non-admins only see their approved posts
        if (!Auth::user()->isAdmin()) {
            $query->where('is_approved', true);
        }

        return $query;
    }
}
