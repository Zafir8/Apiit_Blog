<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventsResource\Pages;
use App\Filament\Resources\EventsResource\RelationManager;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use App\Models\User;

class EventsResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->required()
                    ->options(User::all()->pluck('name', 'id')) // Assuming you have a User model
                    ->searchable(),


                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->minLength(1)
                    ->maxLength(150)
                    ->live()
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation === 'edit') {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->minLength(1)
                    ->unique(ignoreRecord: true)
                    ->maxLength(150),
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->required()
                    ->minLength(1)
                    ->maxLength(250),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('End Date')
                    ->required(),
                Forms\Components\DatePicker::make('published_at')
                    ->label('Published At')
                    ->required(),
                Forms\Components\Checkbox::make('featured')
                    ->label('Featured')
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->label('Location')
                    ->required()
                    ->minLength(1)
                    ->maxLength(150),
//                image column
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('events/images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//               text column
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('end_date')
                    ->label('End Date')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published At')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('featured')
                    ->label('Featured')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->searchable()
                    ->sortable(),
//                text column
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvents::route('/create'),
            'edit' => Pages\EditEvents::route('/{record}/edit'),
        ];
    }
}
