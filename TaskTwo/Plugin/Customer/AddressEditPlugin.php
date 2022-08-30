<?php


namespace ArseniyInk\TaskTwo\Plugin\Customer;

use Magento\Framework\View\LayoutInterface;

class AddressEditPlugin
{

    /**
     * @var LayoutInterface
     */
    private $layout;

    public function __construct(
        LayoutInterface $layout
    ) {
        $this->layout = $layout;
    }

    public function afterGetNameBlockHtml(
        \Magento\Customer\Block\Address\Edit $edit,
        $result
    ) {
        $customBlock = $this->layout->createBlock(
            'ArseniyInk\TaskTwo\Block\Customer\Address\Form\Edit\Count',
            'arseniyink_task_two'
        );

        return $result . $customBlock->toHtml();

    }
}
