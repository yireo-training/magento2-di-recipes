<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\ViewModel;

use Magento\Framework\UrlFactory;

/**
 * Class UrlExample
 *
 * @package Yireo\DiRecipes\ViewModel
 */
class UrlExample
{
    /** @var UrlFactory $urlFactory */
    protected $urlFactory;

    /**
     * UrlExample constructor.
     *
     * @param UrlFactory $urlFactory
     */
    public function __construct(
        UrlFactory $urlFactory
    ) {
        $this->urlFactory = $urlFactory;
    }

    /**
     * @return string
     */
    public function getCustomerAccountLoginUrl(): string
    {
        return $this->urlFactory->create()->getUrl('customer/account/login');
    }
}