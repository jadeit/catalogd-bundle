<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JadeIT\CatalogDBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Psr\Log\LoggerInterface;

class EventSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        $reflection = new \ReflectionClass('\JadeIT\CatalogDBundle\Event\CatalogDEvent');

        $keys = array_values($reflection->GetConstants());
        $value = array(array('onCatalogDEvent', 0));
        $values = array_fill(0, count($keys), $value);
        $result = array_combine($keys, $values);
        return $result;
    }

    public function onCatalogDEvent(Event $event)
    {
        $this->logger->debug(sprintf('Fired event "%s"', $event->getName()));
    }
}
