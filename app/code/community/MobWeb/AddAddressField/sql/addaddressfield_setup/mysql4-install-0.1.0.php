<?php

$setup = $this;
$setup->startSetup();

// Prepare the field
$setup->addAttribute('customer_address', 'custom_address_field', array(
	'type' => 'varchar',
	'input' => 'text',
	'label' => 'Custom Address Field',
	'global' => 1,
	'visible' => 1,
	'required' => 0,
	'user_defined' => 1,
	'is_user_defined' => 1,
	'is_system' => 0,
	'default' => '',
	'visible_on_front' => 1,
));

// Update the order & quote tables so the field can be included there
$setup->run("
    ALTER TABLE {$this->getTable('sales_flat_quote_address')} ADD COLUMN `custom_address_field` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL;
    ALTER TABLE {$this->getTable('sales_flat_order_address')} ADD COLUMN `custom_address_field` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL;
");

// Add the field to the forms
$attribute = Mage::getSingleton('eav/config')->getAttribute('customer_address', 'custom_address_field');
$attribute->setWebsite(Mage::app()->getStore(Mage_Core_Model_App::ADMIN_STORE_ID)->getWebsiteId());
        
$attribute->setData('used_in_forms', array(
    'customer_address_edit',
    'customer_register_address',
    'adminhtml_customer_address',
));
$attribute->save();  

$setup->endSetup();