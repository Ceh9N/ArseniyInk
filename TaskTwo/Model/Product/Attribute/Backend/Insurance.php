<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ArseniyInk\TaskTwo\Model\Product\Attribute\Backend;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Insurance extends AbstractBackend
{
    /**
     * Validate
     * @param Product $object
     * @throws LocalizedException
     * @return bool
     */
    public function validate($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        if ( ($object->getAttributeSetId() == 10) && ($value == '2.5')) {
            throw new LocalizedException(
                __('Bottom can not be arseniy.')
            );
        }
        return true;
    }
}
