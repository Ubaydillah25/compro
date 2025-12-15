<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->toggleable(),

                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),

                TextColumn::make('updated_at')
                    ->date()
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->actions([
                EditAction::make(),
            ]);
    }
}

