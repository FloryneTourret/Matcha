<?php

Class Login_model extends Model
{
    public function get_user($login)
    {
        $req = $this->db->prepare("SELECT * FROM `users` WHERE `login` = '$login'");
        $req->execute();
        return ($req->fetch());
    }

    public function get_user_tags($id)
    {
        $req = $this->db->prepare("SELECT `id_tag` FROM `user_tag` WHERE `id_user` = '$id'");
        $req->execute();
        return ($req->fetchAll());
    }

    public function resetPassword($password, $token)
    {
        $req = $this->db->prepare("UPDATE `users` SET `password`= '$password',`token`= NULL,`token_expiration` = NULL WHERE `token` = '$token'");
        $req->execute();
    }
}

?>