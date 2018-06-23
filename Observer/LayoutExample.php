<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutFactory;
use Yireo\DiRecipes\Block\LayoutExample\Child;

/**
 * Class LayoutExample
 *
 * @package Yireo\DiRecipes\Observer
 */
class LayoutExample implements ObserverInterface
{
    /** @var LayoutFactory $layoutFactory */
    protected $layoutFactory;

    /**
     * @param LayoutFactory $layoutFactory
     */
    public function __constructor(
        LayoutFactory $layoutFactory
    ) {
        $this->layoutFactory = $layoutFactory;
    }

    /**
     * Some method
     */
    protected function addChildBlock()
    {
        $layout = $this->layoutFactory->create();

        $data = [];
        $layout->addChild(
            'my_child',
            Child::class,
            $data
        );
    }

    /**
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        $this->addChildBlock();
    }
}