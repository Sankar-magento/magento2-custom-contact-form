<?php

namespace Nits\ContactForm\Controller\Adminhtml\Data;

use Nits\ContactForm\Controller\Adminhtml\Data;

class Index extends Data
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
	    $resultPage->getConfig()->getTitle()->prepend(__("Custom ContactForm"));
	    return $resultPage;
    }
}
