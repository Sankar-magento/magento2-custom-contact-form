<?php

namespace Nits\ContactForm\Block;

use Nits\ContactForm\Model\ResourceModel\Data\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;

class Display extends \Magento\Framework\View\Element\Template
{
	protected $_customContactCollectionFactory;

	public function __construct(
		Context $context,
		CollectionFactory $customContactCollectionFactory
	) {
		$this->_customContactCollectionFactory = $customContactCollectionFactory;
		parent::__construct($context);
	}

	public function getContactCollection(){
		$custom_contact_data = [];
        $final_custom_contact_data = [];
        $custom_contact_items = $this->_customContactCollectionFactory->create();
        $custom_contact_items->setOrder('id','desc');
        foreach ($custom_contact_items as $item) {
            array_push($custom_contact_data, $item->getData());
        }
        foreach ($custom_contact_data as $key => $udata) {
            $final_custom_contact_data[$udata['id']]['id'] = $udata['id'];
            $final_custom_contact_data[$udata['id']]['firstname'] = $udata['firstname'];
            $final_custom_contact_data[$udata['id']]['lastname'] = $udata['lastname'];
            $final_custom_contact_data[$udata['id']]['email'] = $udata['email'];
            $final_custom_contact_data[$udata['id']]['phone'] = $udata['phone'];
            $final_custom_contact_data[$udata['id']]['comment'] = $udata['comment'];
            $final_custom_contact_data[$udata['id']]['created_at'] = $udata['created_at'];
        }
        return $final_custom_contact_data;
	}
}