<?php

namespace ArseniyInk\TaskTwo\Model\Product\Attribute\Source;

class Insurance extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
            ['label' => __('not necessary'), 'value' => '1'],
            ['label' => __('1 Year'), 'value' => '1.5'],
            ['label' => __('2 Years'), 'value' => '2'],
            ['label' => __('3 Years'), 'value' => '2.5']
            ];
        }
    return $this->_options;
    }
}
