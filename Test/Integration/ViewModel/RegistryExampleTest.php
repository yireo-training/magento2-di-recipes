<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\Test\Integration\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Yireo\DiRecipes\Test\Integration\TestCase;
use Yireo\DiRecipes\ViewModel\RegistryExample as Target;

/**
 * Class RegistryExampleTest
 *
 * @package Yireo\DiRecpipes\Test\Integration\ViewModel
 */
class RegistryExampleTest extends TestCase
{
    /**
     * @expectedException \Magento\Framework\Exception\NoSuchEntityException
     */
    public function testGetCurrentProductWithoutRegistering()
    {
        $target = $this->getTarget();
        $this->assertNotEmpty($target->getCurrentProduct());
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple.php
     * @throws NoSuchEntityException
     */
    public function testGetCurrentProduct()
    {
        $productRepository = $this->getProductRepository();
        $product = $productRepository->get('simple');

        $registry = $this->getRegistry();
        $registry->register('product', $product);

        $target = $this->getTarget();
        $this->assertNotEmpty($target->getCurrentProduct());
    }

    /**
     * @return Registry
     */
    private function getRegistry(): Registry
    {
        return $this->getObjectManager()->get(Registry::class);
    }

    /**
     * @return ProductRepositoryInterface
     */
    private function getProductRepository():ProductRepositoryInterface
    {
        return $this->getObjectManager()->create(ProductRepositoryInterface::class);
    }

    /**
     * @return Target
     */
    private function getTarget(): Target
    {
        return $this->getObjectManager()->create(Target::class);
    }
}