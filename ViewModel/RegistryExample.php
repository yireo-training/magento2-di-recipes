<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;

class RegistryExample
{
    /** @var Registry $registry */
    protected $registry;

    /**
     * RegistryExample constructor.
     *
     * @param Registry $registry
     */
    public function __construct(
        Registry $registry
    ) {
        $this->registry = $registry;
    }

    /**
     * @return ProductInterface
     * @throws NoSuchEntityException
     */
    public function getCurrentProduct(): ProductInterface
    {
        $product = $this->registry->registry('product');

        if (!$product instanceof ProductInterface) {
            throw new NoSuchEntityException(__('No product in registry'));
        }

        return $product;
    }
}