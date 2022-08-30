<?php
declare(strict_types=1);

namespace ArseniyInk\TaskTwo\Setup\Patch\Data;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Boolean as SourceBoolean;
use Magento\Catalog\Model\Product\Attribute\Backend\Boolean as BackendBoolean;

class AddTestInsuranceAttribute implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;


    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CategorySetupFactory $categorySetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->categorySetupFactory = $categorySetupFactory;
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }


    public function apply(): void
    {
        $categorySetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

        $attributeCode = 'new_test_insurance_attribute';
        $attributeLabel = 'NInsurance';

        $categorySetup->addAttribute(
            Product::ENTITY,
            $attributeCode,
            [
                'type'     => 'int',
                'input'    => 'select',
                'source'   => 'ArseniyInk\TaskTwo\Model\Product\Attribute\Source\Insurance',
                'frontend' => '',
                'label' => $attributeLabel,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => true,
                'filterable' => true,
                'comparable' => true,
                'visible_on_front' => true,
                'unique' => false,
                'is_used_in_grid' => true
            ]
        );

        $attributeSetId = $categorySetup->getDefaultAttributeSetId(Product::ENTITY);
        $categorySetup->addAttributeToGroup(
            Product::ENTITY,
            $attributeSetId,
            'Default',
            $attributeCode,
            100
        );
    }
}
