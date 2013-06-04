<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JadeIT\CatalogDBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use JadeIT\CatalogDBundle\Event\EventSubscriber;

class JadeITCatalogDBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        if ($this->container->getParameter('kernel.debug')) {
            //$subscriber = $this->container->get('event_subscriber');
            //$this->container->get('event_dispatcher')->addSubscriber($subscriber);
        }
    }
}
