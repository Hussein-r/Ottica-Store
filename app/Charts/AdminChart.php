<?php

declare(strict_types = 1);
namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Glass;
class AdminChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    // public ?string $name = 'custom_chart_name';
    public ?string $name = 'admin_chart';
    public ?string $routeName = 'chart_route_name';

    public ?array $middlewares = ['auth'];

    public function handler(Request $request): Chartisan
    {
        $glass = Glass::pluck('price_before_discount','id');

        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample','line', $glass->values());
            // ->dataset('Sample 2', [3, 2, 1]);
    }
}

