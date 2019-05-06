<?php

Class Account_model extends Model
{
    public function isPasswordOk($password, $id)
    {
        $req = $this->db->prepare("SELECT `password` FROM `users` WHERE `user_id` = '$id'");
        $req->execute();
        $user = $req->fetch();
        if (password_verify($password, $user['password']))
            return TRUE;
        else
            return FALSE;
    }

    public function changePassword($password, $id)
    {
        $req = $this->db->prepare("UPDATE `users` SET `password` = '$password' WHERE `user_id` = '$id'");
        $req->execute();
    }

    public function updateProfile($firstname, $lastname, $login, $email, $bio, $orientation, $gender, $id){
        $req = $this->db->prepare("UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `login` = '$login',
        `email` = '$email', `biography` = '$bio', `user_orientation_id` = '$orientation', `user_gender_id` = '$gender' WHERE `user_id` = '$id'");
        $req->execute();
    }

    public function updateNotif($notif, $id)
    {
        $req = $this->db->prepare("UPDATE `users` SET `notif` = '$notif' WHERE `user_id` = '$id'");
    }
    
    public function addimg($path, $id)
    {
        $req = $this->db->prepare("INSERT INTO `pictures`(`picture_path`, `picture_user_id`) VALUES ('$path', $id)");
        $req->execute();
    }

    public function profileimg($id_picture, $id)
    {
        $req = $this->db->prepare("UPDATE `users` SET `path_profile_picture`= (SELECT `picture_path` FROM `pictures` WHERE `picture_id` = $id_picture) WHERE `user_id` = $id");
        $req->execute();
    }

    public function getprofileimg($id)
    {
        $req = $this->db->prepare("SELECT `path_profile_picture` FROM `users` WHERE `user_id` = $id");
        $req->execute();
        return ($req->fetch());
    }

    public function delete($id){
        $req = $this->db->prepare("DELETE FROM `users` WHERE `user_id` = '$id'");
        $req->execute();
    }
}

?>