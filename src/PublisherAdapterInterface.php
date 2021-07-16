<?php

namespace milind\PubSub;

interface PublisherAdapterInterface
{
    /**
     * Publish a message to a channel.
     *
     * @param string $channel
     * @param mixed $message
     */
    public function publish($channel, $message, $extraConfig = null);

    /**
     * Publish multiple messages to a channel.
     *
     * @param string $channel
     * @param array $messages
     */
    public function publishBatch($channel, array $messages, $extraConfig = null);
}
