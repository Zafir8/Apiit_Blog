<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventsResource\Pages;
use App\Models\Event;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Forms\Components;
use Filament\Tables\Columns;

class EventsResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Main Content')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->minLength(1)
                        ->maxLength(150)
                        ->live()
                        ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->required()
                        ->minLength(1)
                        ->maxLength(150),

                    Forms\Components\RichEditor::make('description')
                        ->required(),

                    Forms\Components\DatePicker::make('start_date')
                        ->required(),

                    Forms\Components\DatePicker::make('end_date')
                        ->required(),

                    Forms\Components\DatePicker::make('published_at')
                        ->required(),

                    Forms\Components\TextInput::make('location')
                        ->required(),

                    Forms\Components\TextInput::make('rsvp_link') // Adding rsvp_link field
                    ->url()
                        ->label('RSVP Link')

                ])
                ->columns(2),

            Forms\Components\Section::make('Meta')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->directory('events/images'),

                    Forms\Components\Checkbox::make('featured'),

                    Select::make('user_id')
                        ->relationship('author', 'name')
                        ->options([Auth::id() => Auth::user()->name])
                        ->default(Auth::id())
                        ->required(),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Columns\ImageColumn::make('image'),
            Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),

            Columns\TextColumn::make('location')
                ->searchable()
                ->sortable(),

            Columns\TextColumn::make('start_date')
                ->searchable()
                ->sortable(),

            Columns\TextColumn::make('end_date')
                ->searchable()
                ->sortable(),

            Columns\TextColumn::make('published_at')
                ->searchable()
                ->sortable(),

            Columns\CheckboxColumn::make('featured')
                ->label('Featured')
                ->sortable(),

            Columns\TextColumn::make('author.name')
                ->searchable()
                ->sortable(),

            Columns\TextColumn::make('rsvp_link') // Adding rsvp_link column
            ->label('RSVP Link')
                ->url(fn (Event $record) => $record->rsvp_link) // Provide callable for url()
                ->sortable(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvents::route('/create'),
            'edit' => Pages\EditEvents::route('/{record}/edit'),
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

