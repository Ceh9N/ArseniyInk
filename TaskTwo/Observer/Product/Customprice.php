<?php

namespace ArseniyInk\TaskTwo\Observer\Product;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class Customprice implements ObserverInterface
{
    protected $_request;

    public function __construct(
        RequestInterface $request,
        array $data = []
    ) {
        $this->_request = $request;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {

        /* @var $product \Magento\Catalog\Model\Product */
        $product = $observer->getEvent()->getProduct();
        $originprice = $product->getPrice();

        $postData = $this->_request->getParam('value');
        $optionValue = $postData['value'];

        $item = $observer->getEvent()->getData('quote_item');
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        $price = $originprice * $optionValue;
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        $item->getProduct()->setIsSuperMode(true);

    }

}
