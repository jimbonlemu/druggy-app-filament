<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SignatureServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer('filament-panels::*', function ($view) {
            $view->with('appSignature', '© 2025 by Mochamad Iqbal Maulana E41212178');
        });
    }
}
