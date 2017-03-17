<?php 
class WebUser extends CWebUser
{

    public function getNickname()
    {
        return $this->getState('__nickname');
    }

    public function getWorker()
    {
        return $this->getState('__worker');
    }

    public function getAvatar()
    {
        return $this->getState('__avatar');
    }

    public function getAuthority()
    {
        return $this->getAuthority('__authority');
    }


}