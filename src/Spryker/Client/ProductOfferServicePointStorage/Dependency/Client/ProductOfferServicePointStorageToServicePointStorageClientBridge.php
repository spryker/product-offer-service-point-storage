<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductOfferServicePointStorage\Dependency\Client;

use Generated\Shared\Transfer\ServicePointStorageCollectionTransfer;
use Generated\Shared\Transfer\ServicePointStorageCriteriaTransfer;

class ProductOfferServicePointStorageToServicePointStorageClientBridge implements ProductOfferServicePointStorageToServicePointStorageClientInterface
{
    /**
     * @var \Spryker\Client\ServicePointStorage\ServicePointStorageClientInterface
     */
    protected $servicePointStorageClient;

    /**
     * @param \Spryker\Client\ServicePointStorage\ServicePointStorageClientInterface $servicePointStorageClient
     */
    public function __construct($servicePointStorageClient)
    {
        $this->servicePointStorageClient = $servicePointStorageClient;
    }

    public function getServicePointStorageCollection(
        ServicePointStorageCriteriaTransfer $servicePointStorageCriteriaTransfer
    ): ServicePointStorageCollectionTransfer {
        return $this->servicePointStorageClient->getServicePointStorageCollection($servicePointStorageCriteriaTransfer);
    }
}
