<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $allowedFields = ["user_name", "user_email", "user_password"];

    protected $beforeInsert = ["beforeInsert"];
    protected $beforeUpdate = ["beforeUpdate"];

    protected function beforeInsert(array $data)
    {
        return $this->passwordHash($data);
    }
    protected function beforeUpdate(array $data)
    {
        return $this->passwordHash($data);
    }

    public function getUserByLogin( array $data ){
        helper("my_password");
        $user = $this->db->table($this->table)->getWhere( ["user_email" => $data['user_email'] ])->getRowArray();
        if( !isset($user) ) return false;
        
        if(userPasswordVerify( $data["user_password"], $user["user_password"] )) return $user;
        
        return false;
    }

    protected function passwordHash( array $data ){
        helper("my_password");
        if (isset($data["data"]["user_password"])) {
            $data["data"]["user_password"] = userPasswordHasher($data["data"]["user_password"]);
        }
        return $data;
    }
}
