<?php

namespace ArseniyInk\TaskTwo\Setup\CountRooms;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;

    public function __construct(\Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
//        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
//        if (version_compare($context->getVersion(), '1.0.1') < 0) {
//            $customerSetup->addAttribute('customer_address', 'new_field_count_rooms', [
//                'label' => 'Count Rooms',
//                'input' => 'text',
//                'type' => 'int',
//                'source' => '',
//                'required' => false,
//                'position' => 90,
//                'visible' => true,
//                'system' => false,
//                'is_used_in_grid' => true,
//                'is_visible_in_grid' => true,
//                'is_filterable_in_grid' => true,
//                'is_searchable_in_grid' => true,
//                'frontend_input' => 'hidden',
//                'backend' => ''
//            ]);
//
//            $attribute=$customerSetup->getEavConfig()
//                ->getAttribute('customer_address','new_field_count_rooms')
//                ->addData(['used_in_forms' => [
//                    'adminhtml_customer_address',
//                    'adminhtml_customer',
//                    'customer_address_edit',
//                    'customer_register_address',
//                    'customer_address',
//                ]
//                ]);
//            $attribute->save();
//        }
    }
}
