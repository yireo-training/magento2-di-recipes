# Magento 2 DI Recipes
This repository contains various recipes for using DI (Dependency Injection in your classes) to insert certain functionality.

This is NOT a Magento extension. It simply contains code samples.

## Installation
```bash
composer config repositories.yireo-training-di-examples vcs git@github.com:yireo-training/magento2-di-recipes.git
composer require yireo-training/magento2-di-recipes:dev-master
```

## Basic usage
Within a Magento 2 class, you can use DI via the constructor to inject
yourself with the dependencies that you need. For any of these classes
counts that if the parent class already has such a dependency injected, that you should use that injected
dependency instead. For instance, if the parent offers a `$context` variable, inspect it to see if it offers
what you need.

## Working with the registry
To work with the registry, you would inject yourself with an instance of `\Magento\Framework\Registry`.

- `Yireo\DiRecipes\ViewModel\Registry`

# Working with the layout
Within Block classes, the `$context` variable is used to insert an instance of the layout in the variable `$this->_layout`,
which can also be fetched using `$this->getLayout()`. Alternatively, if you are in an observer or alike, instantiate
yourself with `\Magento\Framework\View\LayoutFactory`.

- `Yireo\DiRecipes\Block\LayoutExample`
- `Yireo\DiRecipes\Observer\LayoutExample`

# Working with URLs
To inject URLs, you could inject `\Magento\Framework\UrlInterface`. However, it is much safer to get clean instances by injecting `\Magento\Framework\UrlFactory` instead. The current URL could be fetched using `\Magento\Store\Model\StoreManagerInterface`.