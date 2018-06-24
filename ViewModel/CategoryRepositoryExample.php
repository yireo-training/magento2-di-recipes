<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\ViewModel;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;

/**
 * Class CategoryRepositoryExample
 *
 * @package Yireo\DiRecipes\ViewModel
 */
class CategoryRepositoryExample
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;


    /**
     * CategoryRepositoryExample constructor.
     *
     * @param Registry $registry
     * @param CategoryRepositoryInterface $categoryRepository
     * @param SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
     */
    public function __construct(
        Registry $registry,
        CategoryRepositoryInterface $categoryRepository,
        SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
    ) {
        $this->registry = $registry;
        $this->categoryRepository = $categoryRepository;
        $this->searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
    }

    /**
     * @return CategoryInterface[]
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getSubCategories(): array
    {
        /** @var CategoryInterface $currentCategory */
        $currentCategory = $this->registry->registry('category');
        if (empty($currentCategory)) {
            throw new NoSuchEntityException(__('No category loaded into registry'));
        }

        $subCategoryIds = $currentCategory->getChildren();
        if (!empty($subCategoryIds) && is_string($subCategoryIds)) {
            $subCategoryIds = explode(',', $subCategoryIds);
        }

        $subCategories = [];

        foreach ($subCategoryIds as $subCategoryId) {
            $subCategories[] = $this->categoryRepository->get($subCategoryId);
        }

        return $subCategories;
    }
}