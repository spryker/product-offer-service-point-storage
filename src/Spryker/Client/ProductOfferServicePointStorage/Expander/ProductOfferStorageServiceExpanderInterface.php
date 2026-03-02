<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductOfferServicePointStorage\Expander;

use Generated\Shared\Transfer\ProductOfferStorageCollectionTransfer;

interface ProductOfferStorageServiceExpanderInterface
{
    public function expandProductOfferStorageCollection(
        ProductOfferStorageCollectionTransfer $productOfferStorageCollectionTransfer
    ): ProductOfferStorageCollectionTransfer;
}
