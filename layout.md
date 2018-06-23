# Working with the layout

## Within Blocks
Within Block classes, the `$context` variable is used to insert an instance of the layout in the variable `$this->_layout`,
which can also be fetched using `$this->getLayout()`. Alternatively, if you are in an observer or alike, instantiate
yourself with `\Magento\Framework\View\LayoutFactory`.

See:
- `Yireo\DiRecipes\Block\LayoutExample`
- `Yireo\DiRecipes\Observer\LayoutExample`
