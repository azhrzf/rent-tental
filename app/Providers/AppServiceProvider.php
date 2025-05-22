<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $latestUnpaidOrder = Order::where('user_id', Auth::id())
                    ->where('status', 'unpaid')
                    ->latest()
                    ->first();

                $cartItemCount = 0;
                if ($latestUnpaidOrder) {
                    $cartItemCount = $latestUnpaidOrder->orderDetails()
                        ->sum('quantity');
                }

                $view->with('cartItemCount', $cartItemCount);
            } else {
                $view->with('cartItemCount', 0);
            }
        });
    }
}
