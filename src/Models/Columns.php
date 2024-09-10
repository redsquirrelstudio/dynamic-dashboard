<?php

namespace LaraZeus\DynamicDashboard\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $key
 * @property string $name
 * @property string $class
 */
class Columns extends Model
{
    use \Sushi\Sushi;

    public function getRows(): array
    {
        return [
            ['key' => 'headerColumn', 'name' => __('zeus-dynamic-dashboard::dynamic-dashboard.top'), 'class' => 'w-full col-span-12 md:col-span-12'],
            ['key' => 'leftColumn', 'name' => __('zeus-dynamic-dashboard::dynamic-dashboard.left'), 'class' => 'w-full col-span-12 md:col-span-3'],
            ['key' => 'middleColumn', 'name' => __('zeus-dynamic-dashboard::dynamic-dashboard.middle'), 'class' => 'w-full col-span-12 md:col-span-6'],
            ['key' => 'rightColumn', 'name' => __('zeus-dynamic-dashboard::dynamic-dashboard.right'), 'class' => 'w-full col-span-12 md:col-span-3'],
            ['key' => 'footerColumn', 'name' => __('zeus-dynamic-dashboard::dynamic-dashboard.bottom'), 'class' => 'w-full col-span-12 md:col-span-12'],
        ];
    }
}
