<?php


namespace ArseniyInk\TaskTwo\Setup;

//use Magento\Framework\Setup\InstallDataInterface;
//use Magento\Framework\Setup\ModuleContextInterface;
//use Magento\Framework\Setup\ModuleDataSetupInterface;
//use Magento\Eav\Setup\EavSetup;
//use Magento\Eav\Setup\EavSetupFactory;
//use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
//
//class InstallData implements InstallDataInterface
//{
//
//    private $eavSetupFactory;
//
//    /**
//     * Constructor
//     *
//     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
//     */
//    public function __construct(EavSetupFactory $eavSetupFactory)
//    {
//        $this->eavSetupFactory = $eavSetupFactory;
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function install(
//        ModuleDataSetupInterface $setup,
//        ModuleContextInterface $context
//    ) {
//        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//
//        $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Category::ENTITY,
//            'extra_description',
//            [
//                'type' => 'text',
//                'label' => 'Short Description',
//                'input' => 'textarea',
//                'required' => false,
//                'sort_order' => 4,
//                'global' => ScopedAttributeInterface::SCOPE_STORE,
//                'wysiwyg_enabled' => true,
//                'is_html_allowed_on_front' => true,
//                'group' => 'General Information',
//            ]
//        );
//    }
//}
//
//
//
















use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;

class InstallData implements InstallDataInterface
{

    private $customerSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'employment', [
            'type' => 'int',
            'label' => 'employment',
            'input' => 'select',
            'source' => 'ArseniyInk\TaskTwo\Model\Customer\Attribute\Source\Employment',
            'required' => true,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'employment')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'checkout_register',
                'customer_account_create',
                'customer_account_edit',
            ]
            ]);
        $attribute->save();

    }
}




