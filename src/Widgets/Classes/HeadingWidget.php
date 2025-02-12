<?php

namespace LaraZeus\DynamicDashboard\Widgets\Classes;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Tabs;
use LaraZeus\DynamicDashboard\Concerns\InteractWithWidgets;

class HeadingWidget implements \LaraZeus\DynamicDashboard\Contracts\Widget
{
    use InteractWithWidgets;

    public function form(): Builder\Block
    {
        return Builder\Block::make('paragraph')
            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.paragraph'))
            ->schema([
                Tabs::make('paragraph_tabs')
                    ->schema([
                        Tabs\Tab::make('paragraph')
                            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.paragraph'))
                            ->schema([
                                MarkdownEditor::make('content')
                                    ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.content'))
                                    ->required(),
                            ]),
                        $this->defaultOptionsTab(),
                    ]),
            ]);
    }
}
