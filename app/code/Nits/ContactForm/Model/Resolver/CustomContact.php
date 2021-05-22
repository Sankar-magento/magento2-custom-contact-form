<?php

namespace Nits\ContactForm\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Nits\ContactForm\Model\ResourceModel\Customcontact\CollectionFactory;

class CustomContact implements ResolverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var GetCustomer
     */
    private $getCustomer;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    protected $_customContactCollectionFactory;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        GetCustomer $getCustomer,
        CustomerRepositoryInterface $customerRepository,
        CollectionFactory $customContactCollectionFactory
    ) {
        $this->logger = $logger;
        $this->getCustomer = $getCustomer;
        $this->customerRepository = $customerRepository;
        $this->_customContactCollectionFactory = $customContactCollectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (empty($args)) {
            throw new GraphQlAuthorizationException(
                __(
                    'email for customer should be specified',
                    [\Magento\Customer\Model\Customer::ENTITY]
                )
            );
        }
        /*$currentUserId = $context->getUserId();
        $customer = $this->customerRepository->getById($currentUserId);*/
        try {
            $data = $this->getCustomContactData($args);
            return $data;
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        } catch (LocalizedException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        }
    }

    /**
     *
     * @param int $context
     * @return array
     * @throws NoSuchEntityException|LocalizedException
     */
    private function getCustomContactData($getCustomContactData_array) : array
    {
        try {
            $custom_contact_data = [];
            $final_custom_contact_data = [];
            $custom_contact_items = $this->_customContactCollectionFactory->create();
            $custom_contact_items->addFieldToSelect('*');
            if ( isset($custom_contact_array['firstname']) && !empty($custom_contact_array['firstname']) ) {
                $custom_contact_items->addFieldToFilter('firstname', ['in' => $custom_contact_array['firstname']]);
            }
            if ( isset($custom_contact_array['lastname']) && !empty($custom_contact_array['lastname']) ) {
                $custom_contact_items->addFieldToFilter('lastname', ['in' => $custom_contact_array['lastname']]);
            }
            if ( isset($custom_contact_array['email']) && !empty($custom_contact_array['email']) ) {
                $custom_contact_items->addFieldToFilter('email', ['in' => $custom_contact_array['email']]);
            }
            if ( isset($custom_contact_array['comment']) && !empty($custom_contact_array['comment']) ) {
                $custom_contact_items->addFieldToFilter('comment', ['in' => $custom_contact_array['comment']]);
            }
            $custom_contact_items->setOrder('id','desc');
            foreach ($custom_contact_items as $item) {
                array_push($custom_contact_data, $item->getData());
            }
            foreach ($custom_contact_data as $key => $udata) {
                $final_custom_contact_data[$udata['id']]['id'] = $udata['id'];
                $final_custom_contact_data[$udata['id']]['firstname'] = $udata['firstname'];
                $final_custom_contact_data[$udata['id']]['lastname'] = $udata['lastname'];
                $final_custom_contact_data[$udata['id']]['email'] = $udata['email'];
                $final_custom_contact_data[$udata['id']]['comment'] = $udata['comment'];
                $final_custom_contact_data[$udata['id']]['created_at'] = $udata['created_at'];
            }
            //print_r($final_custom_contact_data);exit;
            return $final_custom_contact_data;
        } catch (NoSuchEntityException $e) {
            return [];
        } catch (LocalizedException $e) {
            throw new NoSuchEntityException(__($e->getMessage()));
        }
    }
}