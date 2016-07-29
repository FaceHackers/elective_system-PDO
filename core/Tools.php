<?php

class Tools {
    static function getPasswordHash($password){
        //$salt = substr($password, 0, 2); //salt 不可逆加密
		return hash("sha1", $password); //使用md5加密
	}
}