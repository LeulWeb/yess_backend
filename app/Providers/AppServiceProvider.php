<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Support\Facades\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Notification::resolved(function ($service) {
            $service->extend(MailChannel::class, function ($service) {
                $service->to($this->app['config']['mail.channel']);
            });
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('profile.create-admin', \App\Livewire\Profile\CreateAdmin::class);
    }
}
