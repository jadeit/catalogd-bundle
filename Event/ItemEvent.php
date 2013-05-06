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

use Symfony\Component\EventDispatcher\Event;

use JadeIT\CatalogDBundle\Entity\Item;

class ItemEvent extends Event
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Return the Item associated with the event.
     *
     * @return User
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set the Item associated with the event.
     *
     * @param Item $item
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }
}
