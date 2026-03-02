<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\ProductOfferServicePointStorage;

use Codeception\Actor;
use Orm\Zed\ProductOffer\Persistence\SpyProductOfferQuery;
use Orm\Zed\ProductOfferServicePoint\Persistence\SpyProductOfferServiceQuery;
use Orm\Zed\ServicePoint\Persistence\SpyServicePointQuery;
use Orm\Zed\ServicePoint\Persistence\SpyServiceQuery;
use Orm\Zed\ServicePoint\Persistence\SpyServiceTypeQuery;

/**
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 *
 * @SuppressWarnings(\SprykerTest\Zed\ProductOfferServicePointStorage\PHPMD)
 */
class ProductOfferServicePointStorageCommunicationTester extends Actor
{
    use _generated\ProductOfferServicePointStorageCommunicationTesterActions;

    public function ensureProductOfferServiceTableAndRelationsAreEmpty(): void
    {
        $this->ensureDatabaseTableIsEmpty($this->getProductOfferServiceQuery());
        $this->ensureDatabaseTableIsEmpty($this->getProductOfferQuery());
        $this->ensureDatabaseTableIsEmpty($this->getServiceQuery());
        $this->ensureDatabaseTableIsEmpty($this->getServicePointQuery());
        $this->ensureDatabaseTableIsEmpty($this->getServiceTypeQuery());
    }

    protected function getProductOfferServiceQuery(): SpyProductOfferServiceQuery
    {
        return SpyProductOfferServiceQuery::create();
    }

    protected function getProductOfferQuery(): SpyProductOfferQuery
    {
        return SpyProductOfferQuery::create();
    }

    protected function getServiceQuery(): SpyServiceQuery
    {
        return SpyServiceQuery::create();
    }

    protected function getServicePointQuery(): SpyServicePointQuery
    {
        return SpyServicePointQuery::create();
    }

    protected function getServiceTypeQuery(): SpyServiceTypeQuery
    {
        return SpyServiceTypeQuery::create();
    }
}
