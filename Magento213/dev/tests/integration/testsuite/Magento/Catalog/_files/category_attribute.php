<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/** @var \Magento\Catalog\Model\ResourceModel\Eav\Attribute $attribute */
$attribute = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->create('Magento\Catalog\Model\ResourceModel\Eav\Attribute');
$attribute->setAttributeCode('test_attribute_code_666')
    ->setEntityTypeId(3)
    ->setIsGlobal(1);
$attribute->save();
