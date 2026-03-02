<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductOfferServicePointStorage\Dependency\Client;

use Generated\Shared\Transfer\ServicePointStorageCollectionTransfer;
use Generated\Shared\Transfer\ServicePointStorageCriteriaTransfer;

interface ProductOfferServicePointStorageToServicePointStorageClientInterface
{
    public function getServicePointStorageCollection(
        ServicePointStorageCriteriaTransfer $servicePointStorageCriteriaTransfer
    ): ServicePointStorageCollectionTransfer;
}
