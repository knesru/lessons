<?php

/**
 * Created by PhpStorm.
 * User: FBarinov
 * Date: 28.06.2016
 * Time: 15:15
 */
class UUserIdentity extends CUserIdentity
{
    public $name;
    public $email;

    public function getName()
    {
        return $this->name;
    }

    public function __construct($username, $password)
    {
        parent::__construct($username, $password);
    }
}