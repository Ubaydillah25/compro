<?php

namespace App\Filament\Resources\Partners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Position'),

                IconColumn::make('published')
                    ->boolean(),

                TextColumn::make('order')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->date(),
            ])
            ->defaultSort('order')
            ->actions([
                EditAction::make(),
            ]);
    }
}
