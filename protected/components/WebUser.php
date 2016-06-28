<?php

/**
 * Created by PhpStorm.
 * User: FBarinov
 * Date: 08.04.2016
 * Time: 15:36
 */
class WebUser extends CWebUser
{
    const SUPER = 'super';
    const ADMIN = 'admin';

    // Store model to not repeat query.
    private $_model;

    public function isAdmin(){
        return $this->isSuper() || $this->getGroup() == self::ADMIN;
    }

    private function isSuper()
    {
        return $this->getGroup() == self::SUPER;
    }

    /**
     * @return User
     */
    public function getModel()
    {
        return $this->loadUser(Yii::app()->user->id);
    }

    public function getGroup(){
        $user = $this->loadUser(Yii::app()->user->id);
        if(is_null($user)){
            return 'guest';
        }
        return $user->group;
    }

    // Load user model.
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}