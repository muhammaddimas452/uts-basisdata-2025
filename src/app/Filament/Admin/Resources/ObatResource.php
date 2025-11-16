<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ObatResource\Pages;
use App\Filament\Admin\Resources\ObatResource\RelationManagers;
use App\Models\Obat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ObatResource extends Resource
{
    protected static ?string $model = Obat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rumah_sakit_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kode_obat')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('nama_obat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('produsen')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kategori')
                    ->required(),
                Forms\Components\TextInput::make('bentuk_sediaan')
                    ->required(),
                Forms\Components\TextInput::make('dosis')
                    ->maxLength(50)
                    ->default(null),
                Forms\Components\TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\Toggle::make('perlu_resep')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rumah_sakit_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kode_obat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_obat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('produsen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori'),
                Tables\Columns\TextColumn::make('bentuk_sediaan'),
                Tables\Columns\TextColumn::make('dosis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('perlu_resep')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListObats::route('/'),
            'create' => Pages\CreateObat::route('/create'),
            'edit' => Pages\EditObat::route('/{record}/edit'),
        ];
    }
}
