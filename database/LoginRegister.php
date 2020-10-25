<?php


class LoginRegister
{
    private static $self;

    public static function emailIsExist($data)
    {
        return self::makeConnection()->query("SELECT * FROM users where Email='" . $data . "'")->num_rows;
    }

    public static function makeConnection()
    {
        if (empty(self::$self)) {
            self::$self = new mysqli(
                'localhost', 'root', '', 'mvc'
            );
        }

        return self::$self;
    }

    public static function insertData($data)
    {
        return self::makeConnection()->query("INSERT INTO users value (null,'" . $data['TenKH'] . "','" . $data['Email'] . "','" . $data['Password'] . "','" . $data['DiaChi'] . "','" . $data['SDT'] . "',null)");
    }
    public static function loginUser($data){
        return self::makeConnection()->query("SELECT MaKH,TenKH FROM users where Email='" . $data['Email'] . "' and Password='" . $data['Password'] . "'")->num_rows;
    }
}