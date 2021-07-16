<?php

namespace milind\PubSub\Adapters;

use milind\PubSub\PubSubAdapterInterface;

class LocalPubSubAdapter implements PubSubAdapterInterface {

    /**
     * @var array
     */
    protected $subscribers = [];

    /**
     * Subscribe a handler to a channel.
     *
     * @param string $channel
     * @param callable $handler
     */
    public function subscribe($channel, callable $handler, $extraConfig = null) {
        if (!isset($this->subscribers[$channel])) {
            $this->subscribers[$channel] = [];
        }
        $this->subscribers[$channel][] = $handler;
    }

    /**
     * Publish a message to a channel.
     *
     * @param string $channel
     * @param mixed $message
     */
    public function publish($channel, $message, $extraConfig = null) {
        foreach ($this->getSubscribersForChannel($channel) as $handler) {
            call_user_func($handler, $message);
        }
    }

    /**
     * Publish multiple messages to a channel.
     *
     * @param string $channel
     * @param array $messages
     */
    public function publishBatch($channel, array $messages, $extraConfig = null) {
        foreach ($messages as $message) {
            $this->publish($channel, $message, $extraConfig);
        }
    }

    /**
     * Return all subscribers on the given channel.
     *
     * @param string $channel
     *
     * @return array
     */
    public function getSubscribersForChannel($channel) {
        return isset($this->subscribers[$channel]) ? $this->subscribers[$channel] : [];
    }

}
