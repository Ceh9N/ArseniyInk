<?php

namespace ArseniyInk\TaskTwo\Block;

use ArseniyInk\TaskTwo\Model\Product\Attribute\Source\Insurance;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Eav\Model\Config as EavConfig;

class Index extends Template
{
    protected $insurance;
    protected $eavConfig;

    public function __construct(
        Context   $context,
        EavConfig $eavConfig,
        Insurance $insurance
    ) {
        $this->insurance = $insurance;
        $this->eavConfig = $eavConfig;
        parent::__construct($context);
    }

    public function getOptions()
    {
       $attribute = $this->insurance->getAllOptions();
       return $attribute;
//    $Attribute=$this->eavConfig->getAttribute('product','new_test_product_insurance_attribute');
//
//        if($Attribute->getSource()) {
//        $option = $Attribute->getSource()->getAllOptions();
//        return $option;
//        }
//        return die();
    }
}
