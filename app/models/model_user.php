<?php

/**
 * @property $db
 */
class Model_user extends Model
{

    public function register($login, $password){
        // создаем пользователя в БД

        $this->db->query("INSERT INTO users SET `login` = " . $this->db->escape($login) .
            ", `password` = " . $this->db->escape($password)
        );
    }

    public function get_user_by_login($login){
        $user = $this->db->query("SELECT * FROM users WHERE `login` = " . $this->db->escape($login));
        return $user[0];
    }

    public function get_users(){
        return $this->db->query("SELECT * FROM users");
    }
}