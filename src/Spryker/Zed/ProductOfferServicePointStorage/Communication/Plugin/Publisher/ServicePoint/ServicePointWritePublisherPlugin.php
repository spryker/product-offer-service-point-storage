<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferServicePointStorage\Communication\Plugin\Publisher\ServicePoint;

use Spryker\Shared\ProductOfferServicePointStorage\ProductOfferServicePointStorageConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;

/**
 * @method \Spryker\Zed\ProductOfferServicePointStorage\Business\ProductOfferServicePointStorageFacadeInterface getFacade()
 * @method \Spryker\Zed\ProductOfferServicePointStorage\Communication\ProductOfferServicePointStorageCommunicationFactory getFactory()
 * @method \Spryker\Zed\ProductOfferServicePointStorage\ProductOfferServicePointStorageConfig getConfig()
 */
class ServicePointWritePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
{
    /**
     * {@inheritDoc}
     * - Publishes product offer services data by `SpyServicePoint` entity events.
     * - Extracts service point IDs from the `$eventEntityTransfers` created by service point entity events.
     * - Gets product offer services data.
     * - Stores data in storage table.
     * - Sends a copy of data to the queue.
     *
     * @api
     *
     * @param list<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName): void
    {
        $this->getFacade()->writeProductOfferServiceStorageCollectionByServicePointEvents($eventEntityTransfers);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return list<string>
     */
    public function getSubscribedEvents(): array
    {
        return [
            ProductOfferServicePointStorageConfig::ENTITY_SPY_SERVICE_POINT_UPDATE,
            ProductOfferServicePointStorageConfig::SERVICE_POINT_PUBLISH,
        ];
    }
}
