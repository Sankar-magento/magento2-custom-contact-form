<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nits\ContactForm\Model\ResourceModel;

class Customcontact extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('nits_custom_contact_form', 'id');
    }
}