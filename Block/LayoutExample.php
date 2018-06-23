<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\Block;

use Magento\Framework\View\Element\Template;
use Yireo\DiRecipes\Block\LayoutExample\Child;

/**
 * Class LayoutExample
 *
 * @package Yireo\DiRecipes\Block
 */
class LayoutExample extends Template
{
    /**
     * Magento constructor
     */
    public function _construct()
    {
        $this->addChildBlock();
    }

    /**
     * Some method
     */
    protected function addChildBlock()
    {
        $data = [];
        $this->_layout->addChild(
            'my_example_child',
            Child::class,
            $data
        );
    }
}