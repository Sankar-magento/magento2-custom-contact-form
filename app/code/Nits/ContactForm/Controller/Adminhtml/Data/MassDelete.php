<?php

namespace Nits\ContactForm\Controller\Adminhtml\Data;

use Nits\ContactForm\Model\Data;

class MassDelete extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
