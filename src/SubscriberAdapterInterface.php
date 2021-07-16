<?php

namespace milind\PubSub;

interface SubscriberAdapterInterface
{
    /**
     * Subscribe a handler to a channel.
     *
     * @param string $channel
     * @param callable $handler
     */
    public function subscribe($channel, callable $handler, $extraConfig = null);
}
