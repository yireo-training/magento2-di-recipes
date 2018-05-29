# Magento 2 DI Recipes
This repository contains various recipes for using DI (Dependency
Injection in your classes) to insert certain functionality.

## Basic usage
Within a Magento 2 class, you can use DI via the constructor to inject
yourself with the dependencies that you need. For any of these classes
counts that if the parent class already has such a dependency injected, that you should use that injected
dependency instead. For instance, if the parent offers a `$context` variable, inspect it to see if it offers
what you need.

If there is no such dependency yet, you can inject such a dependency as follows:

## Block class with template
For a Block class with template functionality, the default constructor looks as follows (or it might have
been left-out because it only forwards functionality to its parent constructor):
```php
class Example extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
}
```

A new dependency with `Yireo\Foo\Bar` would look like this:
```php
class Example extends \Magento\Framework\View\Element\Template
{
    protected $foobar;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Yireo\Foo\Bar $foobar,
        array $data = []
    ) {
        $this->foobar = $foobar;
        parent::__construct($context, $data);
    }
}
```

## Generic class with no parent
A generic class (like a cronjob class, an observer, or anything else) might have an empty constructor:
```php
class Example
{
    public function __construct()
    {
    }
}
```

A new dependency with `Yireo\Foo\Bar` would look like this:
```php
class Example
{
    protected $foobar;

    public function __construct(
        \Yireo\Foo\Bar $foobar
    ) {
        $this->foobar = $foobar;
    }
}
```

## DI recipiees
See each file for more examples:
- [Registry](registry.md)
- [Layout](layout.md)
- [Urls](urls.md)

