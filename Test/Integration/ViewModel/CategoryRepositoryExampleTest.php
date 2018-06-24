<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\Test\Integration\ViewModel;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Yireo\DiRecipes\Test\Integration\TestCase;
use Yireo\DiRecipes\ViewModel\CategoryRepositoryExample as Target;

/**
 * Class CategoryRepositoryExampleTest
 *
 * @package Yireo\DiRecpipes\Test\Integration\ViewModel
 */
class CategoryRepositoryExampleTest extends TestCase
{
    /**
     * @throws NoSuchEntityException
     * @expectedException \Magento\Framework\Exception\NoSuchEntityException
     */
    public function testGetSubCategoriesWithoutRegistryEntry()
    {
        $target = $this->getTarget();
        $this->assertEmpty($target->getSubCategories());
    }

    /**
     * @throws NoSuchEntityException
     * @@magentoDataFixture Magento/Catalog/_files/categories.php
     */
    public function testGetSubCategories()
    {
        $category = $this->getCategory();
        $registry = $this->getObjectManager()->get(Registry::class);
        $registry->register('category', $category);

        $target = $this->getTarget();
        $this->assertNotEmpty($target->getSubCategories());
    }

    /**
     * @return CategoryInterface
     * @throws NoSuchEntityException
     */
    private function getCategory(): CategoryInterface
    {
        /** @var CategoryRepositoryInterface $categoryRepository */
        $categoryRepository = $this->getObjectManager()->get(CategoryRepositoryInterface::class);
        $categoryId = 2;
        $category = $categoryRepository->get($categoryId);
        $this->assertNotEmpty($category);
        $this->assertEquals($category->getId(), $categoryId);

        return $category;
    }

    /**
     * @return Target
     */
    private function getTarget(): Target
    {
        return $this->getObjectManager()->create(Target::class);
    }
}