<?php

namespace ArseniyInk\TaskTwo\Block\Customer\Widget;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;

class Count extends Template
{
    /**
     * @var AddressMetadataInterface
     */
    private $addressMetaData;

    public function __construct(
        Template\Context $context,
        AddressMetadataInterface $addressMetaData,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->addressMetaData = $addressMetaData;
    }


    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/count.phtml');
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
      return $this->getAttribute()
            ? $this->getAttribute()->isRequired()
            : false;
    }

    /**
     * @return string
     */
    public function getFieldId()
    {
        return 'test_address_counter_rooms';
    }

    /**
     * @return \Magento\Framework\Phrase|string
     */
    public function getFieldLabel()
    {
        return $this->getAttribute()
        ? $this->getAttribute()->getFrontendLabel()
        : __('Count Rooms');
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return 'test_address_counter_rooms';
    }

    /**
     * @return string|null
     */
    public function getValue()
    {
        /** @var AddressInterface $address */
        $address = $this->getAddress();
        if ($address instanceof AddressInterface) {
            return $address->getCustomAttribute('test_address_counter_rooms')
                ? $address->getCustomAttribute('test_address_counter_rooms')->getValue()
                : null;
        }
        return null;
    }

    private function getAttribute()
    {
        try {
            $attribute = $this->addressMetaData->getAttributeMetadata('test_address_counter_rooms');
        } catch (NoSuchEntityException $exception) {
            return null;
        }

        return $attribute;
    }
}
