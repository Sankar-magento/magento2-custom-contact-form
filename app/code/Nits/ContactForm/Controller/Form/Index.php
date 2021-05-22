<?php

namespace Nits\ContactForm\Controller\Form;

use Nits\ContactForm\Api\DataRepositoryInterface;
use Nits\ContactForm\Api\Data\DataInterface;
use Nits\ContactForm\Api\Data\DataInterfaceFactory;
use Magento\Framework\Message\Manager;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	/**
     * @var Manager
     */
    protected $messageManager;

    /**
     * @var DataRepositoryInterface
     */
    protected $dataRepository;

    /**
     * @var DataInterfaceFactory
     */
    protected $dataFactory;

    public function __construct(
    	Context $context,
        DataRepositoryInterface $dataRepository,
        Manager $messageManager,
        DataInterfaceFactory $dataFactory
    ) {
        $this->messageManager   = $messageManager;
        $this->dataFactory      = $dataFactory;
        $this->dataRepository   = $dataRepository;
        parent::__construct($context);
    }

	public function execute()
    {
        $post = (array) $this->getRequest()->getPost();
        if (!empty($post)) {
            try {
            	$model = $this->dataFactory->create();
                $model->setData($post);
                $this->dataRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You request has been saved. We will contact you shortly.'));
		        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
		        $resultRedirect->setUrl('/customcontactform/form/index');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            return $resultRedirect;
        }
    	$this->_view->loadLayout();
    	$this->_view->renderLayout();
    }
}