<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->greeting('Greeting ' . $notifiable->name . ',') // Custom greeting
                ->line('We are excited to have you with us.') // Custom line
                ->action('Verify your Email Address', $url)
                ->line('If you did not create an account, no further action is required.') // Another custom line
                ->salutation('Best Regards,') // Custom salutation
                ->salutation('Your Company Name'); // Custom salutation
        });

    }
}
