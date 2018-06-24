<?php
namespace Yireo\DiRecipes\Test\Integration;

use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase as PhpunitTestCase;

/**
 * Class TestCase
 * @package Yireo\DiRecipes\Test\Integration
 */
class TestCase extends PhpunitTestCase
{
    /**
     * @return ObjectManagerInterface
     */
    protected function getObjectManager(): ObjectManagerInterface
    {
        return Bootstrap::getObjectManager();
    }
}