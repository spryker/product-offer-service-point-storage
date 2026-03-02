<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferServicePointStorage\Persistence;

use Orm\Zed\ProductOfferServicePointStorage\Persistence\SpyProductOfferServiceStorageQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Spryker\Zed\ProductOfferServicePointStorage\Persistence\Propel\Mapper\ProductOfferServiceStorageMapper;

/**
 * @method \Spryker\Zed\ProductOfferServicePointStorage\ProductOfferServicePointStorageConfig getConfig()
 * @method \Spryker\Zed\ProductOfferServicePointStorage\Persistence\ProductOfferServicePointStorageEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\ProductOfferServicePointStorage\Persistence\ProductOfferServicePointStorageRepositoryInterface getRepository()
 */
class ProductOfferServicePointStoragePersistenceFactory extends AbstractPersistenceFactory
{
    public function getProductOfferServiceStorageQuery(): SpyProductOfferServiceStorageQuery
    {
        return SpyProductOfferServiceStorageQuery::create();
    }

    public function createProductOfferServiceStorageMapper(): ProductOfferServiceStorageMapper
    {
        return new ProductOfferServiceStorageMapper();
    }
}
