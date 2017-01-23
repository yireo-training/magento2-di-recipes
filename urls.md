# Working with URLs

## Getting the current URL (1)
A nice way to get the current URL is to inject `\Magento\Framework\UrlInterface` which leads to the same thing:
```php
class Example
{
    /** @var \Magento\Framework\UrlInterface $url */
    protected $url;

    public function __construct(
        \Magento\Framework\UrlInterface $url
    ) {
        $this->url = $url;
    }

    protected function getCurrentUrl()
    {
        return $this->url->getCurrentUrl();
    }
}
```

## Getting the current URL (2)
Alternatively, the current URL is also part of the current store configuration, which is managed by a thing called the Store Manager, which is
then injected via `\Magento\Store\Model\StoreManagerInterface`.

For a generic class like an observer this would look like:
```php
class Example implements Magento\Framework\Event\ObserverInterface
{
    /** @var \Magento\Store\Model\StoreManagerInterface $storeManager */
    protected $storeManager;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    protected function getCurrentUrl()
    {
        return $this->storeManager->getStore()->getCurrentUrl();
    }
}
```

Within Blocks, the `$context` variable adds an instance to the same class via `$this->_storeManager`, which should
therefore used instead.

## Creating new URLs
When creating new URLs, it is better to use the `UrlFactory`:
```php
class Example
{
    /** @var \Magento\Framework\UrlFactory $urlFactory */
    protected $urlFactory;

    public function __construct(
        \Magento\Framework\UrlFactory $urlFactory
    ) {
        $this->urlFactory = $urlFactory;
    }

    protected function getCustomerAccountLoginUrl()
    {
        return $this->urlFactory->create()->getUrl('customer/account/login');
    }
}
```

Technically, you can use `UrlInterface` for this as well.
