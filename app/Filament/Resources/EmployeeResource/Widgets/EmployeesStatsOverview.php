<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeesStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'US')->withCount('employees')->first();
        $mx = Country::where('country_code', 'MX')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($mx->name. ' Employees', $mx->employees_count),
            Card::make($us->name. ' Employees', $us->employees_count),
        ];
    }
}
