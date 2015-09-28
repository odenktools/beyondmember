<?php

namespace Ngakost\BeyondMember\Providers;

use Illuminate\Support\ServiceProvider;

use Ngakost\BeyondMember\Repositories\Eloquent\EloquentUserRepository;

/**
 *
 * @todo
 * @license MIT
 */
class BeyondMemberServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('beyondmember', function ($app)
        {
            // Get the model name from the auth config file
            // file and instantiate a new Hasher and our
            // PasswordUpgrader from the container.
            $model 	= $app->config['auth.model'];
            $hash 	= $app['hash'];

            // Instantiate our own UserProvider class.
            $provider = new EloquentUserRepository($hash, $model);

            // Return a new Guard instance and pass our
            // UserProvider class into its constructor.
            return new \Ngakost\BeyondMember\Guards\BeyondMemberGuard($provider, $app['session.store']);

        });
    }

    public function provides()
    {
        return ['beyondmember', 'beyondmember.user'];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('beyondmember.user', function ($app) {
            $userModel = $app['config']->get('auth.model', 'App\User');
            return new EloquentUserRepository($app, $app->make($userModel));
        });

        $this->app->singleton('Ngakost\BeyondMember\Contracts\Repositories', function ($app) {
            return $app['beyondmember.user'];
        });


    }

}
