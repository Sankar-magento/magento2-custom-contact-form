<?php

namespace Nits\ContactForm\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     *
     * @return \Nits\ContactForm\Api\Data\DataInterface[]
     */
    public function getItems();

    /**
     * Set data list.
     *
     * @param \Nits\ContactForm\Api\Data\DataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
