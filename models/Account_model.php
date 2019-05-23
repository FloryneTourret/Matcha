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

    public function updateProfile($firstname, $lastname, $login, $email, $bio, $orientation, $gender, $birthdate, $id){
        $req = $this->db->prepare("UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `login` = '$login',
        `email` = '$email', `biography` = '$bio', `user_orientation_id` = '$orientation', `user_gender_id` = '$gender', `user_birthdate` = '$birthdate'
        WHERE `user_id` = '$id'");
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

    public function getimg($id)
    {
        $req = $this->db->prepare("SELECT `picture_path` FROM `pictures` WHERE `picture_id` = $id");
        $req->execute();
        return ($req->fetch());
    }

    public function delete($id){
        $req = $this->db->prepare("DELETE FROM `users` WHERE `user_id` = '$id'");
        $req->execute();
    }

    public function delete_picture($id, $user_id){
        $req = $this->db->prepare("DELETE FROM `pictures` WHERE `picture_id` = $id AND `picture_user_id`= $user_id");
        $req->execute();
    }

    public function delete_profile_picture($user_id){
        $req = $this->db->prepare("UPDATE `users` SET `path_profile_picture`= NULL WHERE `user_id` = $user_id");
        $req->execute();
    }

    public function get_tags(){
        $req = $this->db->prepare("SELECT * FROM `tags` WHERE 1");
        $req->execute();
        return ($req->fetchAll());
    }

    public function del_tags_user($id){
        $req = $this->db->prepare("DELETE FROM `user_tag` WHERE `id_user` = $id");
        $req->execute();
    }

    public function add_tag_user($tag, $id){
        $req = $this->db->prepare("INSERT INTO `user_tag` (`id_user`, `id_tag`) VALUES ($id, $tag)");
        $req->execute();
    }

    public function add_tag($tag)
    {
        $req = $this->db->prepare("INSERT INTO `tags` (`tag_name`) VALUES ('$tag')");
        $req->execute();
        return($this->db->lastInsertId());
    }

    public function updateAddress($longitude, $latitude, $address, $city, $country, $id){
        $req = $this->db->prepare( "UPDATE `users` SET `longitude`='$longitude',`latitude`='$latitude',`address`='$address',`city`='$city',`country`='$country' WHERE `user_id` = $id");
        $req->execute();
    }
}

?>