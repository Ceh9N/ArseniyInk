<?php

namespace ArseniyInk\TaskTwo\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Eav\Model\Config as EavConfig;

class Index extends Template
{
    protected $eavConfig;

    public function __construct(
        Context   $context,
        EavConfig $eavConfig
    ) {
        $this->eavConfig = $eavConfig;
        parent::__construct($context);
    }

    public function getOptions(){
    $Attribute=$this->eavConfig->getAttribute('product','new_test_product_insurance_attribute');

        if($Attribute->getSource()) {
        $option = $Attribute->getSource()->getAllOptions();
        return $option;
        }
        return 0;
    }
}
