<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity{
public function authenticate(){
    $login = $this->username;
    $user = Users::model()->find(array('condition'=>"user_login = '$login'"));
    if (isset($user->user_login)) {
        if (md5($this->password) != $user->user_password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else{
            $this->errorCode=self::ERROR_NONE;
        }
    }else
        $this->errorCode=self::ERROR_USERNAME_INVALID;
    return !$this->errorCode;
    }
}