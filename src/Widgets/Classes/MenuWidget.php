<?php

namespace LaraZeus\DynamicDashboard\Widgets\Classes;

use Filament\Facades\Filament;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use LaraZeus\DynamicDashboard\Concerns\InteractWithWidgets;

class MenuWidget implements \LaraZeus\DynamicDashboard\Contracts\Widget
{
    use InteractWithWidgets;

    public function enabled(): bool
    {
        return class_exists(\LaraZeus\Sky\SkyServiceProvider::class) && Filament::hasPlugin('zeus-sky');
    }

    public function form(): Builder\Block
    {
        return Builder\Block::make('Menu')
            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.menu'))
            ->schema([
                Tabs::make('Menu_tabs')
                    ->schema([
                        Tabs\Tab::make('Menu')
                            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.menu'))
                            ->schema([
                                Select::make('menu_slug')
                                    ->label('zeus-dynamic-dashboard::dynamic-dashboard.menu_slug')
                                    ->required()
                                    ->options(
                                        // @phpstan-ignore-next-line
                                        \LaraZeus\Sky\SkyPlugin::get()->getModel('Navigation')::pluck('name', 'handle')
                                    ),
                                Select::make('menu_dir')
                                    ->default('vertical')
                                    ->options([
                                        'vertical' => __('zeus-dynamic-dashboard::dynamic-dashboard.vertical'),
                                        'horizontal' => __('zeus-dynamic-dashboard::dynamic-dashboard.horizontal'),
                                    ]),
                            ]),
                        $this->defaultOptionsTab(),
                    ]),
            ]);
    }

    public function viewData(array $data): array
    {
        return [
            // @phpstan-ignore-next-line
            'menu' => ($data['menu_slug'] !== null) ? config('zeus-sky.models.Navigation')::fromHandle($data['menu_slug']) : null,
        ];
    }
}
