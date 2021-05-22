<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nits\ContactForm\Model;

class Customcontact extends \Magento\Framework\Model\AbstractModel
{
	public function _construct()
    {
        $this->_init('Nits\ContactForm\Model\ResourceModel\Customcontact');
    }
}