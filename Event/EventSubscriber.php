<?php
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
        return array(
            'jadeit.catalogd.events.category.new' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.category.update' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.category.delete' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.tag.new' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.tag.update' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.tag.delete' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.item.new' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.item.update' => array(array('onCatalogDEvent', 0)),
            'jadeit.catalogd.events.item.delete' => array(array('onCatalogDEvent', 0)),
        );
    }

    public function onCatalogDEvent(Event $event)
    {
        $this->logger->debug('Fired Event ' . $event->getName());
    }
}
