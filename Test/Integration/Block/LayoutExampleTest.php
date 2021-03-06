<?php
declare(strict_types=1);

namespace Yireo\DiRecipes\Test\Integration\Block;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\AbstractController;
use Yireo\DiRecipes\Block\LayoutExample;
use Zend\View\Helper\Layout;

/**
 * Class LayoutExampleTest
 *
 * @package Yireo\DiRecpipes\Test\Integration\Block
 */
class LayoutExampleTest extends AbstractController
{
    /**
     *
     */
    public function testChildBlockInParent()
    {
        $this->markTestSkipped('This test is not part of a real-life module ');

        $layout = $this->getLayout();
        $layout->getUpdate()->addHandle('default');
        $layout->getUpdate()->addPageHandles(['1column']);

        /** @var LayoutExample $layoutExampleBlock */
        $layoutExampleBlock = $layout->addBlock(LayoutExample::class, 'example');
        $this->assertEquals(get_class($layoutExampleBlock), LayoutExample::class);

        $childNames = $layout->getChildNames($layoutExampleBlock->getNameInLayout());
        $this->assertContains('example', $childNames, var_export($childNames, true));
    }

    /**
     * @return LayoutInterface
     */
    private function getLayout(): LayoutInterface
    {
        return $this->getObjectManager()->get(LayoutInterface::class);
    }

    /**
     * @return ObjectManagerInterface
     */
    private function getObjectManager(): ObjectManagerInterface
    {
        return Bootstrap::getObjectManager();
    }
}
