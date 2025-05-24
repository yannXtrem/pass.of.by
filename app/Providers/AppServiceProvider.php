<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Comment;
use App\Models\Media;
use App\Policies\EventPolicy;
use App\Policies\ReservationPolicy;
use App\Policies\CommentPolicy;
use App\Policies\MediaPolicy;
class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // Définition des gates (autorisations) basées sur les rôles
        Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        Gate::define('manage-events', function ($user) {
            return $user->isOrganizer();
        });

        Gate::define('manage-users', function ($user) {
            return $user->isAdmin();
        });

        Gate::policy(Event::class, EventPolicy::class);
        Gate::policy(Reservation::class, ReservationPolicy::class);
        Gate::policy(Comment::class, CommentPolicy::class);
        Gate::policy(Media::class, MediaPolicy::class);
    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        
    }
}
