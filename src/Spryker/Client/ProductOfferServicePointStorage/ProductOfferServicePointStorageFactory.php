<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductOfferServicePointStorage;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\ProductOfferServicePointStorage\Dependency\Client\ProductOfferServicePointStorageToServicePointStorageClientInterface;
use Spryker\Client\ProductOfferServicePointStorage\Dependency\Client\ProductOfferServicePointStorageToStorageClientInterface;
use Spryker\Client\ProductOfferServicePointStorage\Dependency\Client\ProductOfferServicePointStorageToStoreClientInterface;
use Spryker\Client\ProductOfferServicePointStorage\Dependency\Service\ProductOfferServicePointStorageToSynchronizationServiceInterface;
use Spryker\Client\ProductOfferServicePointStorage\Dependency\Service\ProductOfferServicePointStorageToUtilEncodingServiceInterface;
use Spryker\Client\ProductOfferServicePointStorage\Expander\ProductOfferStorageServiceExpander;
use Spryker\Client\ProductOfferServicePointStorage\Expander\ProductOfferStorageServiceExpanderInterface;
use Spryker\Client\ProductOfferServicePointStorage\Extractor\ProductOfferServiceStorageExtractor;
use Spryker\Client\ProductOfferServicePointStorage\Extractor\ProductOfferServiceStorageExtractorInterface;
use Spryker\Client\ProductOfferServicePointStorage\Extractor\ProductOfferStorageExtractor;
use Spryker\Client\ProductOfferServicePointStorage\Extractor\ProductOfferStorageExtractorInterface;
use Spryker\Client\ProductOfferServicePointStorage\Extractor\ServicePointStorageExtractor;
use Spryker\Client\ProductOfferServicePointStorage\Extractor\ServicePointStorageExtractorInterface;
use Spryker\Client\ProductOfferServicePointStorage\Generator\ProductOfferServiceStorageKeyGenerator;
use Spryker\Client\ProductOfferServicePointStorage\Generator\ProductOfferServiceStorageKeyGeneratorInterface;
use Spryker\Client\ProductOfferServicePointStorage\Mapper\ProductOfferServiceStorageMapper;
use Spryker\Client\ProductOfferServicePointStorage\Mapper\ProductOfferServiceStorageMapperInterface;
use Spryker\Client\ProductOfferServicePointStorage\Reader\ProductOfferServiceStorageReader;
use Spryker\Client\ProductOfferServicePointStorage\Reader\ProductOfferServiceStorageReaderInterface;
use Spryker\Client\ProductOfferServicePointStorage\Reader\ServicePointStorageReader;
use Spryker\Client\ProductOfferServicePointStorage\Reader\ServicePointStorageReaderInterface;

class ProductOfferServicePointStorageFactory extends AbstractFactory
{
    public function createProductOfferStorageServiceExpander(): ProductOfferStorageServiceExpanderInterface
    {
        return new ProductOfferStorageServiceExpander(
            $this->createProductOfferStorageExtractor(),
            $this->createProductOfferServiceStorageReader(),
            $this->createProductOfferServiceStorageExtractor(),
            $this->createServicePointStorageReader(),
            $this->createServicePointStorageExtractor(),
        );
    }

    public function createServicePointStorageExtractor(): ServicePointStorageExtractorInterface
    {
        return new ServicePointStorageExtractor();
    }

    public function createProductOfferStorageExtractor(): ProductOfferStorageExtractorInterface
    {
        return new ProductOfferStorageExtractor();
    }

    public function createProductOfferServiceStorageExtractor(): ProductOfferServiceStorageExtractorInterface
    {
        return new ProductOfferServiceStorageExtractor();
    }

    public function createProductOfferServiceStorageReader(): ProductOfferServiceStorageReaderInterface
    {
        return new ProductOfferServiceStorageReader(
            $this->getStoreClient(),
            $this->getStorageClient(),
            $this->createProductOfferServiceStorageKeyGenerator(),
            $this->getUtilEncodingService(),
            $this->createProductOfferServiceStorageMapper(),
        );
    }

    public function createProductOfferServiceStorageKeyGenerator(): ProductOfferServiceStorageKeyGeneratorInterface
    {
        return new ProductOfferServiceStorageKeyGenerator(
            $this->getSynchronizationService(),
        );
    }

    public function createServicePointStorageReader(): ServicePointStorageReaderInterface
    {
        return new ServicePointStorageReader(
            $this->getServicePointStorageClient(),
            $this->getStoreClient(),
        );
    }

    public function createProductOfferServiceStorageMapper(): ProductOfferServiceStorageMapperInterface
    {
        return new ProductOfferServiceStorageMapper();
    }

    public function getStoreClient(): ProductOfferServicePointStorageToStoreClientInterface
    {
        return $this->getProvidedDependency(ProductOfferServicePointStorageDependencyProvider::CLIENT_STORE);
    }

    public function getStorageClient(): ProductOfferServicePointStorageToStorageClientInterface
    {
        return $this->getProvidedDependency(ProductOfferServicePointStorageDependencyProvider::CLIENT_STORAGE);
    }

    public function getServicePointStorageClient(): ProductOfferServicePointStorageToServicePointStorageClientInterface
    {
        return $this->getProvidedDependency(ProductOfferServicePointStorageDependencyProvider::CLIENT_SERVICE_POINT_STORAGE);
    }

    public function getSynchronizationService(): ProductOfferServicePointStorageToSynchronizationServiceInterface
    {
        return $this->getProvidedDependency(ProductOfferServicePointStorageDependencyProvider::SERVICE_SYNCHRONIZATION);
    }

    public function getUtilEncodingService(): ProductOfferServicePointStorageToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(ProductOfferServicePointStorageDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
