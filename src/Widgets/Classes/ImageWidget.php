<?php

namespace LaraZeus\DynamicDashboard\Widgets\Classes;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use LaraZeus\DynamicDashboard\Concerns\InteractWithWidgets;
use LaraZeus\DynamicDashboard\DynamicDashboardPlugin;

class ImageWidget implements \LaraZeus\DynamicDashboard\Contracts\Widget
{
    use InteractWithWidgets;

    public function form(): Builder\Block
    {
        return Builder\Block::make('image')
            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.image'))
            ->schema([
                Tabs::make('image_tabs')
                    ->schema([
                        Tabs\Tab::make('image')
                            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.image'))
                            ->schema([
                                FileUpload::make('url')
                                    ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.image'))
                                    ->disk(DynamicDashboardPlugin::get()->getUploadDisk())
                                    ->directory(DynamicDashboardPlugin::get()->getUploadDirectory())
                                    ->image()
                                    ->imageEditor()
                                    ->required(),

                                TextInput::make('alt')
                                    ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.image_alt_text'))
                                    ->required(),
                            ]),

                        $this->defaultOptionsTab(),
                    ]),
            ]);
    }
}
