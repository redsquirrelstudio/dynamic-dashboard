<?php

namespace LaraZeus\DynamicDashboard\Widgets\Classes;

use Filament\Facades\Filament;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use LaraZeus\DynamicDashboard\Concerns\InteractWithWidgets;

class FaqWidget implements \LaraZeus\DynamicDashboard\Contracts\Widget
{
    use InteractWithWidgets;

    public function enabled(): bool
    {
        return class_exists(\LaraZeus\Sky\SkyServiceProvider::class) && Filament::hasPlugin('zeus-sky');
    }

    public function form(): Builder\Block
    {
        return Builder\Block::make('Faq')
            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.faq'))
            ->schema([
                Tabs::make('Faq_tabs')
                    ->schema([
                        Tabs\Tab::make('Faq')
                            ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.faq'))
                            ->schema([
                                Select::make('faq_cat')
                                    ->required()
                                    ->options(
                                        // @phpstan-ignore-next-line
                                        \LaraZeus\Sky\SkyPlugin::get()->getModel('Tag')::query()
                                            ->where('type', 'faq')
                                            ->get()
                                            ->pluck('name', 'slug')
                                    ),
                            ]),
                        $this->defaultOptionsTab(),
                    ]),
            ]);
    }

    public function viewData(array $data): array
    {
        return [
            // @phpstan-ignore-next-line
            'faqs' => ($data['faq_cat'] !== null) ? config('zeus-sky.models.Faq')::withAnyTags([$data['faq_cat']], 'faq')->get() : null,
        ];
    }
}
