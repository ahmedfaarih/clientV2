<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\Auth;

class UserChart extends ChartWidget
{
    protected static ?string $heading = 'Users statistics';

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
        return [

            'datasets' => [
                [
                    'label' => 'User Registrations',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->hasRole('Super Admin');
    }

    protected function getType(): string
    {
        return 'line';
    }
}
