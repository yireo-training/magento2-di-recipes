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
        parent::_construct();
        $this->addChildBlock();
    }

    /**
     * Some method
     */
    protected function addChildBlock()
    {
        $data = ['foo' => 'bar'];

        /** @var Child $childBlock */
        $thisName = $this->getNameInLayout();
        $childName = $thisName . '.child';
        $childBlock = $this->_layout->addBlock(Child::class, $childName);
        $childBlock->setData($data);

        $this->setChild('child', $childBlock);
    }
}