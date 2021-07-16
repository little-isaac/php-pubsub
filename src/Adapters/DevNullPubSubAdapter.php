<?php

namespace milind\PubSub\Adapters;

use milind\PubSub\PubSubAdapterInterface;

class DevNullPubSubAdapter implements PubSubAdapterInterface {

    /**
     * Subscribe a handler to a channel.
     *
     * @param string $channel
     * @param callable $handler
     */
    public function subscribe($channel, callable $handler, $extraConfig = null) {
        // you ain't subscribing to anything
    }

    /**
     * Publish a message to a channel.
     *
     * @param string $channel
     * @param mixed $message
     */
    public function publish($channel, $message, $extraConfig = null) {
        // your message is going to /dev/null
    }

    /**
     * Publish multiple messages to a channel.
     *
     * @param string $channel
     * @param array $messages
     */
    public function publishBatch($channel, array $messages, $extraConfig = null) {
        // your messages are going to /dev/null
    }

}
