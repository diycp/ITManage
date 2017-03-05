<?php 
class WebUser extends CWebUser
{

    public function getNickname()
    {
        return $this->getState('__nickname');
    }

    public function setNickname($nickname)
    {
        return $this->setState('__nickname', $nickname);
    }

    public function getPhone()
    {
        return $this->getState('__phone');
    }

    public function getAvatar()
    {
        return $this->getState('__avatar');
    }

    public function setAvatar($avatar)
    {
        return $this->setState('__avatar', $avatar);
    }

}