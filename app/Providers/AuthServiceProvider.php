<?php

namespace App\Providers;

use App\Models\Comment;
use App\Policies\CommentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Comment::class => CommentPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
        
        Gate::define('delete-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
        
    }
}
