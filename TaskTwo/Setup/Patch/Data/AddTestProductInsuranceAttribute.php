<?php declare(strict_types=1);

/**
 * Patch to create Product Attribute
 *
 * 
 */

namespace ArseniyInk\TaskTwo\Setup\Patch\Data;

use Zend_Validate_Exception;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class AddTestProductInsuranceAttribute implements DataPatchInterface
{
    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    /**
     * AddressAttribute constructor.
     *
     * @param Config              $eavConfig
     * @param EavSetupFactory     $eavSetupFactory
     * @param AttributeSetFactory $attributeSetFactory
     */
    public function __construct(
        Config $eavConfig,
        EavSetupFactory $eavSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->eavConfig = $eavConfig;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * Create product attribute
     * @return void
     * @throws LocalizedException
     * @throws Zend_Validate_Exception
     */
    public function apply(): void
    {
        $eavSetup = $this->eavSetupFactory->create();

        $customerEntity = $this->eavConfig->getEntityType(\Magento\Catalog\Model\Product::ENTITY);
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'test_insurance_attribute', [
            'type'             => 'int',
            'input'            => 'select',
            'source'           => 'ArseniyInk\TaskTwo\Model\Product\Attribute\Source\Insurance',
            'label'            => 'Insurance',
            'visible'          => false,
            'required'         => false,
            'user_defined'     => true,
            'system'           => false,
            'global'           => true,
            'default'          => 0,
            'visible_on_front' => false,
            'sort_order'       => 100,
            'position'         => 100
        ]);

        $customAttribute = $this->eavConfig->getAttribute(\Magento\Catalog\Model\Product::ENTITY, 'test_insurance_attribute');

        $customAttribute->addData([
            'attribute_set_id' => $attributeSetId,
            'attribute_group_id' => $attributeGroupId
        ]);
        $customAttribute->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}
