<?php

namespace ArseniyInk\TaskTwo\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class CategoryViewModel implements ArgumentInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    public function getCurrentCategoryHeading()
    {
        $currentCategory = $this->registry->registry('current_category');

        if ($currentCategory) {
            $_heading = trim($currentCategory->getHeading());

            if ($_heading === '') {
                $_heading = $currentCategory->getName();
            }
        }

        return $_heading;
    }
}




























