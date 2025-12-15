<?php

namespace App\Filament\Resources\PracticeAreas\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PracticeAreaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('Practice Area Information')
                ->columns(2)
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('slug', Str::slug($state))
                        ),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                ]),

            Textarea::make('short_description')
                ->label('Short Description')
                ->rows(3)
                ->columnSpanFull(),

            RichEditor::make('content')
                ->label('Main Content')
                ->columnSpanFull(),

            Section::make('Display Settings')
                ->columns(3)
                ->schema([
                    TextInput::make('icon')
                        ->label('Icon')
                        ->helperText('Contoh: heroicon-o-scale'),

                    TextInput::make('order')
                        ->numeric()
                        ->default(0),

                    Toggle::make('published')
                        ->default(true),
                ]),
        ]);
    }
}
