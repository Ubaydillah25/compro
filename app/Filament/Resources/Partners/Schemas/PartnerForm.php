<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('Basic Information')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('slug', Str::slug($state))
                        ),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    TextInput::make('title')
                        ->label('Title / Position')
                        ->placeholder('Managing Partner, Associate, dll'),
                ]),

            Section::make('Profile')
                ->schema([
                    Textarea::make('short_bio')
                        ->label('Short Bio')
                        ->rows(3),

                    RichEditor::make('full_bio')
                        ->label('Full Biography')
                        ->columnSpanFull(),
                ]),

            Section::make('Contact Information')
                ->columns(2)
                ->schema([
                    TextInput::make('email')
                        ->email(),

                    TextInput::make('phone'),
                ]),

            Section::make('Photo & Settings')
                ->columns(3)
                ->schema([
                    FileUpload::make('photo')
                        ->image()
                        ->directory('partners')
                        ->imagePreviewHeight('150'),

                    TextInput::make('order')
                        ->numeric()
                        ->default(0),

                    Toggle::make('published')
                        ->default(true),
                ]),
        ]);
    }
}
