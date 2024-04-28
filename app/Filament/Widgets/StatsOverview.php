<?php

namespace App\Filament\Widgets;

use App\Models\ClientCase;
use App\Models\DocumentRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Cases count', ClientCase::query()->count())
            ->description('All cases')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Document requests', DocumentRequest::query()->count())
            ->description('Document requests')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Case updates given', DocumentRequest::query()->count())
            ->description('Case updates')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];

        
    }

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->hasRole('Super Admin');
    }
}
