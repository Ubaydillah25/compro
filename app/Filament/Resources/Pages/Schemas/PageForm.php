<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('Page Information')
                ->columns(2)
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))
                        ),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                ]),

            Section::make('Page Content')
                ->schema([
                    RichEditor::make('content')
                        ->label('Main Content')
                        ->columnSpanFull(),
                ]),

            Section::make('SEO')
                ->columns(2)
                ->collapsed()
                ->schema([
                    TextInput::make('meta_title')
                        ->label('Meta Title'),

                    Textarea::make('meta_description')
                        ->label('Meta Description')
                        ->rows(3),
                ]),

            Toggle::make('is_published')
                ->label('Published')
                ->default(true),

        ]);
    }
}
