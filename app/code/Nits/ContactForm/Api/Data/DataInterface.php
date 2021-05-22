<?php

namespace Nits\ContactForm\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const DATA_ID               = 'id';
    const FIRSTNAME            = 'firstname';
    const LASTNAME             = 'lastname';
    const EMAIL                 = 'email';
    const COMMENT               = 'comment';
    const CREATED_AT            = 'created_at';


    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $id
     * @return DataInterface
     */
    public function setId($id);

    /**
     * Get Firstname
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set Firstname
     *
     * @param $firstname
     * @return mixed
     */
    public function setFirstname($firstname);

    /**
     * Get Lastname
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set Lastname
     *
     * @param $lastname
     * @return mixed
     */
    public function setLastname($lastname);

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Email
     *
     * @param $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * Get Comment
     *
     * @return mixed
     */
    public function getComment();

    /**
     * Set Comment
     *
     * @param $comment
     * @return mixed
     */
    public function setComment($comment);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * set created at
     *
     * @param $createdAt
     * @return DataInterface
     */
    public function setCreatedAt($createdAt);
}
