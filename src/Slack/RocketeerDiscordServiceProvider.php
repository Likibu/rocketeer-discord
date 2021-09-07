<?php
namespace Rocketeer\Plugins\Discord;

use Illuminate\Support\ServiceProvider;
use Rocketeer\Facades\Rocketeer;

/**
 * Register the Discord plugin with the Laravel framework and Rocketeer
 */
class RocketeerDiscordServiceProvider extends ServiceProvider
{
    /**
     * Register classes
     *
     * @return void
     */
    public function register()
    {
        // ...
    }

    /**
     * Boot the plugin
     *
     * @return void
     */
    public function boot()
    {
        Rocketeer::plugin('Rocketeer\Plugins\Discord\RocketeerDiscord');
    }
}
