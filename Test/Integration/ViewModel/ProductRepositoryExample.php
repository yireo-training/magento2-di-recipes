<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\Test\Integration\ViewModel;

use Magento\Framework\Exception\NoSuchEntityException;
use Yireo\DiRecipes\Test\Integration\TestCase;
use Yireo\DiRecipes\ViewModel\ProductRepositoryExample as Target;

/**
 * Class ProductRepositoryExampleTest
 *
 * @package Yireo\DiRecpipes\Test\Integration\ViewModel
 */
class ProductRepositoryExampleTest extends TestCase
{
    /**
     * @throws NoSuchEntityException
     * @@magentoDataFixture Magento/Catalog/_files/product_simple.php
     */
    public function testGetSubCategories()
    {
        $target = $this->getTarget();
        $this->assertNotEmpty($target->getProducts());
    }

    /**
     * @return Target
     */
    private function getTarget(): Target
    {
        return $this->getObjectManager()->create(Target::class);
    }
}