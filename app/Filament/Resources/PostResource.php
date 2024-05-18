<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Main Content')
                ->schema([
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
                ])
                ->columns(2),

            Section::make('Meta')
                ->schema([
                    FileUpload::make('image')
                        ->image()
                        ->directory('posts/thumbnails'),

                    DateTimePicker::make('published_at')
                        ->nullable(),

                    Checkbox::make('featured'),

                    Checkbox::make('is_approved')
                        ->label('Approved')
                        ->visible(fn () => Auth::user()->isAdmin()),

                    Select::make('user_id')
                        ->relationship('author', 'name')
                        ->options([Auth::id() => Auth::user()->name])
                        ->default(Auth::id())
                        ->searchable()
                        ->required(),

                    Select::make('categories')
                        ->multiple()
                        ->relationship('categories', 'title')
                        ->searchable(),
                ]),

            Section::make('Admin Actions')
                ->schema([
                    RichEditor::make('admin_message')
                        ->label('Admin Message')
                        ->disabled(fn () => !Auth::user()->isAdmin())
                        ->visible(true)
                        ->columnSpanFull(),
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

            CheckboxColumn::make('is_approved')
                ->label('Approved')
                ->sortable()
               ->visible(fn () => Auth::user()->isAdmin()),

            TextColumn::make('admin_message')
                ->label('Admin Message')
                ->visible(true)  // Visible to everyone
                ->limit(50)
                ->html(),
        ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public  static function getRelationManagers(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        if (!Auth::user()->isAdmin()) {
            $query->where('user_id', Auth::id());
        }
        return $query;
    }
}

