<?php 
class WebUser extends CWebUser
{

    public function getNickname()
    {
        return $this->getState('__nickname');
    }

    public function getCareer()
    {
        return $this->getState('__career');
    }

    public function getAuthority()
    {
        return $this->getAuthority('__authority');
    }


}