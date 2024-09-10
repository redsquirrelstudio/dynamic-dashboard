<?php

namespace LaraZeus\DynamicDashboard\Filament\Resources\LayoutResource\Pages;

use Filament\Actions\Action;

class EditLayout extends CreateLayout
{
    public function getTitle(): string
    {
        return __('zeus-dynamic-dashboard::dynamic-dashboard.edit_dashboard');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view')
                ->label(__('zeus-dynamic-dashboard::dynamic-dashboard.view'))
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->tooltip(__('zeus-dynamic-dashboard::dynamic-dashboard.view_form'))
                ->color('warning')
                ->url(fn () => route('landing-page', $this->dashLayout->layout_slug))
                ->openUrlInNewTab(),
        ];
    }
}
