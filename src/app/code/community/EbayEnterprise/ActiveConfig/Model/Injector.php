<?php
/**
 * Copyright (c) 2013-2014 eBay Enterprise, Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright   Copyright (c) 2013-2014 eBay Enterprise, Inc. (http://www.ebayenterprise.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * inserts new nodes into the configuration using a specified
 * attachement point.
 * */
class EbayEnterprise_ActiveConfig_Model_Injector implements EbayEnterprise_ActiveConfig_Model_Injector_Interface
{
    /** @var Varien_Simplexml_Element group node the injector is attached to */
    protected $groupNode;

    /**
     * Create the injector and optionally set a group node as the attachment point.
     *
     * @param Varien_Simplexml_Element|null
     */
    public function __construct(Varien_Simplexml_Element $groupNode = null)
    {
        if ($groupNode) {
            $this->setAttachmentPoint($groupNode);
        }
    }

    /**
     * Insert the xml nodes that comprise a set of configuration fields
     * into the attached group in the Magento system config.
     *
     * @param Varien_Simplexml_Config $fieldsConfig
     */
    public function insertConfig(Varien_Simplexml_Config $fieldsConfig)
    {
        if ($this->groupNode) {
            $this->groupNode->fields->extend($fieldsConfig->getNode());
        }
    }

    /**
     * Specify the group node to attach to.
     *
     * @param Varien_Simplexml_Element
     */
    public function setAttachmentPoint(Varien_Simplexml_Element $groupNode)
    {
        $this->groupNode = $groupNode;
    }
}
