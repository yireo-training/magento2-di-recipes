<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;

/**
 * Class ProductRepositoryExample
 *
 * @package Yireo\DiRecipes\ViewModel
 */
class ProductRepositoryExample
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var SearchCriteriaBuilderFactory
     */
    private $searchCriteriaBuilderFactory;


    /**
     * ProductRepositoryExample constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
    }

    /**
     * @return ProductInterface[]
     */
    public function getProducts(): array
    {
        $searchCriteriaBuilder = $this->searchCriteriaBuilderFactory->create();
        $searchCriteriaBuilder->addFilter('name', 'si%', 'like');
        $searchCriteriaBuilder->setPageSize(3);

        $searchCriteria = $searchCriteriaBuilder->create();
        $searchResult = $this->productRepository->getList($searchCriteria);

        return $searchResult->getItems();
    }
}