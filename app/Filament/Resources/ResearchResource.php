<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResearchResource\Pages;
use App\Models\Research;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;

class ResearchResource extends Resource
{
    protected static ?string $model = Research::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {   // the form for the main content
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
                        ->unique(Research::class, 'slug', fn ($record) => $record),

                    RichEditor::make('description')
                        ->required()
                        ->fileAttachmentsDirectory('research/images')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Meta')
                ->schema([
                    FileUpload::make('image')
                        ->image()
                        ->directory('research/images'),

                    DateTimePicker::make('published_at')
                        ->required(),

                    Checkbox::make('featured'),
                    // to get the current user id and set it as the author
                    Select::make('user_id')
                        ->relationship('author', 'name')
                        ->options([Auth::id() => Auth::user()->name])
                        ->searchable()
                        ->default(Auth::id())
                        ->required(),
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
        ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResearch::route('/'),
            'create' => Pages\CreateResearch::route('/create'),
            'edit' => Pages\EditResearch::route('/{record}/edit'),
        ];
    }

    // to get the current user id and ensure that only the user's research entries are displayed
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        if (!Auth::user()->isAdmin()) {
            $query->where('user_id', Auth::id());
        }
        return $query;
    }
}
