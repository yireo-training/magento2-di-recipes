<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\ViewModel;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class StoreManagerExample
 *
 * @package Yireo\DiRecipes\ViewModel
 */
class StoreManagerExample
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * StoreManagerExample constructor.
     *
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        StoreManagerInterface $storeManager
    ){
        $this->storeManager = $storeManager;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    protected function getCurrentUrl(): string
    {
        return $this->storeManager->getStore()->getCurrentUrl();
    }
}