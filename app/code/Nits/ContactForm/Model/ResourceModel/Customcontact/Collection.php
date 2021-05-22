<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nits\ContactForm\Model\ResourceModel\Customcontact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Nits\ContactForm\Model\Customcontact', 'Nits\ContactForm\Model\ResourceModel\Customcontact');
    }
}