<?php

namespace Nits\ContactForm\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Nits\ContactForm\Api\Data\DataInterface;

interface DataRepositoryInterface
{

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function save(DataInterface $data);


    /**
     * @param $Id
     * @return mixed
     */
    public function getById($Id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Nits\ContactForm\Api\Data\DataSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function delete(DataInterface $data);

    /**
     * @param $Id
     * @return mixed
     */
    public function deleteById($Id);
}
