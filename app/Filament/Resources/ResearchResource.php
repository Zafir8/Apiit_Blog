<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResearchResource\Pages;
use App\Filament\Resources\ResearchResource\RelationManagers;
use App\Models\Research;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ResearchResource extends Resource
{
    protected static ?string $model = Research::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                research model fiillables
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



                // get slug automatically
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
                Forms\Components\DatePicker::make('published_at')
                    ->label('Published At')
                    ->required(),
                Forms\Components\Checkbox::make('featured')
                    ->label('Featured'),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('research/images')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('featured')
                    ->label('Featured')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
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
            'index' => Pages\ListResearch::route('/'),
            'create' => Pages\CreateResearch::route('/create'),
            'edit' => Pages\EditResearch::route('/{record}/edit'),
        ];
    }
}
