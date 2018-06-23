<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
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
     */
    public function getCurrentProduct(): ProductInterface
    {
        return $this->registry->registry('product');
    }
}