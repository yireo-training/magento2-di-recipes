# Working with the registry
To work with the registry, you would inject yourself with an instance of `\Magento\Framework\Registry`.
For a Block class, this could look as follows:
```php
class Example extends Magento\Framework\View\Element\Template;
{
    /** @var \Magento\Framework\Registry $registry */
    protected $registry;

    public function __construct(
        \Magento\Framework\Registry $registry,
        Template\Context $context,
        array $data
        )
    {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('product');
    }
}
```

For an observer, this might look as follows:
```php
class Example implements Magento\Framework\Event\ObserverInterface
{
    /** @var \Magento\Framework\Registry $registry */
    protected $registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // Handling some event
        return $this->registry->register('something', $observer->getEvent()->getSomething());
    }
}
```
