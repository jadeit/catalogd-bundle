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

use JadeIT\CatalogDBundle\Entity\Category;

final class CatalogDEvent
{
    const ITEM_CREATE = 'jadeit.catalogd.events.item.create';
    const ITEM_READ = 'jadeit.catalogd.events.item.read';
    const ITEM_UPDATE = 'jadeit.catalogd.events.item.update';
    const ITEM_DELETE = 'jadeit.catalogd.events.item.delete';

    const CATEGORY_CREATE = 'jadeit.catalogd.events.category.create';
    const CATEGORY_READ = 'jadeit.catalogd.events.category.read';
    const CATEGORY_UPDATE = 'jadeit.catalogd.events.category.update';
    const CATEGORY_DELETE = 'jadeit.catalogd.events.category.delete';

    const TAG_CREATE = 'jadeit.catalogd.events.tag.create';
    const TAG_READ = 'jadeit.catalogd.events.tag.read';
    const TAG_UPDATE = 'jadeit.catalogd.events.tag.update';
    const TAG_DELETE = 'jadeit.catalogd.events.tag.delete';
}
