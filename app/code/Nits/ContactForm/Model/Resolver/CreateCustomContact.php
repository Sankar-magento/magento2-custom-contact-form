<?php

namespace Nits\ContactForm\Model\Resolver;

use Nits\ContactForm\Model\CreateCustomData as CreateCustomData;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CreateCustomContact implements ResolverInterface
{
    /**
     * @var CreateCustomData
     */
    private $createCustomData;

    /**
     * @param CreatPickUpStore $createCustomData
     */
    public function __construct(CreateCustomData $createCustomData)
    {
        $this->createCustomData = $createCustomData;
    }

    /**
     * @inheritDoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['input']) || !is_array($args['input'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }

        return ['custom_contact_data' => $this->createCustomData->execute($args['input'])];
    }
}