<?php
namespace Rocketeer\Plugins\Discord;

use Illuminate\Container\Container;
use Rocketeer\Plugins\AbstractNotifier;
use Woeler\DiscordPhp\Message\DiscordTextMessage;
use Woeler\DiscordPhp\Webhook\DiscordWebhook;

class RocketeerDiscord extends AbstractNotifier
{
    /**
     * Setup the plugin
     *
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        parent::__construct($app);

        $this->configurationFolder = __DIR__ . '/../config';
    }

    /**
     * Bind additional classes to the Container
     *
     * @param Container $app
     *
     * @return void
     */
    public function register(Container $app)
    {
        $app->bind('discord', function ($app) {
            return new DiscordWebhook($app['config']->get('rocketeer-discord::url'));
        });

        return $app;
    }

    /**
     * Get the default message format
     *
     * @param string $message The message handle
     *
     * @return string
     */
    public function getMessageFormat($message)
    {
        return $this->app['config']->get('rocketeer-discord::' . $message);
    }

    /**
     * Send a given message
     *
     * @param string $message
     *
     * @return void
     */
    public function send($message)
    {
        $message = (new DiscordTextMessage())
            ->setContent($message)
            ->setUsername($this->config->get('rocketeer-discord::username'));

        $this->discord->send($message);
    }
}
