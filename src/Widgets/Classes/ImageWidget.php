<?php

namespace LaraZeus\Rain\Widgets\Classes;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use LaraZeus\Rain\Concerns\InteractWithWidgets;
use LaraZeus\Rain\RainPlugin;

class ImageWidget implements \LaraZeus\Rain\Contracts\Widget
{
    use InteractWithWidgets;

    public function form(): Builder\Block
    {
        return Builder\Block::make('image')
            ->label(__('Image'))
            ->schema([
                Tabs::make('image_tabs')
                    ->schema([
                        Tabs\Tab::make('image')
                            ->label(__('Image'))
                            ->schema([
                                FileUpload::make('url')
                                    ->label(__('Image'))
                                    ->disk(RainPlugin::get()->getUploadDisk())
                                    ->directory(RainPlugin::get()->getUploadDirectory())
                                    ->image()
                                    ->imageEditor()
                                    ->required(),

                                TextInput::make('alt')
                                    ->label(__('image alt text'))
                                    ->required(),
                            ]),

                        $this->defaultOptionsTab(),
                    ]),
            ]);
    }
}
