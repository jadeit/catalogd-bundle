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

use JadeIT\CatalogDBundle\Entity\Tag;

class TagEvent extends Event
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Return the Tag associated with the event.
     *
     * @return User
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the Tag associated with the event.
     *
     * @param Tag $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }
}
