<?php

namespace ArseniyInk\TaskTwo\Model\Customer\Attribute\Source;

class Employment extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
            ['label' => __('Unemployment'), 'value' => 'unemployment'],
            ['label' => __('Pupil'), 'value' => 'pupil'],
            ['label' => __('Student'), 'value' => 'student'],
            ['label' => __('Employee'), 'value' => 'employee'],
            ['label' => __('Arseniy'), 'value' => 'arseniy']
            ];
        }
    return $this->_options;
    }
}
