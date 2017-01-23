# Working with the layout

## Within Blocks
Within Block classes, the `$context` variable is used to insert an instance of the layout in the variable `$this->_layout`,
which can also be fetched using `$this->getLayout()`. Alternatively, if you are in an observer or alike, instantiate
yourself with `\Magento\Framework\View\LayoutFactory`.

## Creating a child block
Within a Block class:
```php
class Example extends \Magento\Framework\View\Element\Template;
{
    protected function addChildBlock()
    {
        $data = [];
        $this->_layout->addChild(
            'my_child',
            'Yireo\FooBar\Block\Example\Child',
            $data
        );
    }
}
```

Within an observer:
```php
class Example
{
    /** @var \Magento\Framework\View\LayoutFactory $layoutFactory */
    protected $layoutFactory;

    public function __constructor(
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->layoutFactory = $layoutFactory;
    }

    protected function addChildBlock()
    {
        $layout = $this->layoutFactory->create();

        $data = [];
        $layout->addChild(
            'my_child',
            'Yireo\FooBar\Block\Example\Child',
            $data
        );
    }
}
```
