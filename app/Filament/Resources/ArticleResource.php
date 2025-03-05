<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('author')->required(),
                TextInput::make('facebook')->url()->placeholder('https://facebook.com/in/user'),
                TextInput::make('instagram')->url()->placeholder('https://instagram.com/user'),
                TextInput::make('github')->url()->placeholder('https://github.com/user'),
                TextInput::make('linkedin')->url()->placeholder('https://linkedin.com/in/user'),
                TextInput::make('twitter')->url()->placeholder('https://twitter.com/user'),
                Textarea::make('description')->rows(3),
                RichEditor::make('content')->required(),
                FileUpload::make('photo')->image()->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')->circular(),
                TextColumn::make('author')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')
                    ->limit(50)
                    ->tooltip(fn($record) => $record->description)
                    ->wrap(),
                TextColumn::make('facebook')->sortable()->searchable(),
                TextColumn::make('instagram')->sortable()->searchable(),
                TextColumn::make('github')->sortable()->searchable(),
                TextColumn::make('linkedin')->sortable()->searchable(),
                TextColumn::make('twitter')->sortable()->searchable(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
