<?php

Class Admin_model extends Model
{
    public function get_users(){
        $req = $this->db->prepare("SELECT * FROM `users` WHERE 1 ORDER BY `admin` DESC");
        $req->execute();
        return ($req->fetchAll());
    }

    public function ban_users($id){
        $req = $this->db->prepare("UPDATE `users` SET `enabled`= -1 WHERE `user_id` = $id");
        $req->execute();
    }

    public function unban_users($id){
        $req = $this->db->prepare("UPDATE `users` SET `enabled`= 1 WHERE `user_id` = $id");
        $req->execute();
    }

    public function register($firstname, $lastname, $login, $email, $token)
    {
        $req = $this->db->prepare("INSERT INTO `users`(`firstname`, `lastname`, `login`, `email`, `token`, `token_expiration`, `admin`) 
                                    VALUES ('$firstname','$lastname','$login','$email', '$token', NOW() + INTERVAL 1 DAY, 1)");
        $req->execute();
    }

    public function activate($token, $password)
    {
        $req = $this->db->prepare("UPDATE `users` SET `password`= '$password', `enabled`= 1,`token`= NULL,`token_expiration` = NULL WHERE `token` = '$token'");
        $req->execute();
    }

    public function create_user($user_firstname, $user_lastname, $user_birthdate, $user_gender, $user_orientation,
                        $user_login, $user_email, $user_biography, $user_path_profile_picture, $user_password, $user_enabled, $user_longitude,
                        $user_latitude, $user_address, $user_city, $user_country)
    {
        $req = $this->db->prepare("INSERT INTO `users`(`firstname`, `lastname`, `user_birthdate`, `user_gender_id`, `user_orientation_id`,
                                 `login`, `email`, `biography`, `path_profile_picture`, `password`, `admin`, `notif`, `enabled`,
                                 `longitude`, `latitude`, `address`, `city`, `country`) 
                                 VALUES ('$user_firstname','$user_lastname','$user_birthdate',$user_gender,$user_orientation,
                                 '$user_login','$user_email','$user_biography','$user_path_profile_picture','$user_password', 0,0,$user_enabled,
                                 '$user_longitude','$user_latitude','$user_address','$user_city','$user_country')");
        $req->execute();
        return ($this->db->lastInsertId());
    }

    public function picture_user($id, $path){
        $req = $this->db->prepare("INSERT INTO `pictures`(`picture_path`, `picture_user_id`) VALUES ('$path', $id)");
        $req->execute();
    }

    public function tags_user($id, $user_tags){
        foreach ($user_tags as $user_tag)
        {
            $tag = $user_tag['tag_id'];
            $req = $this->db->prepare("INSERT INTO `user_tag` (`id_user`, `id_tag`) VALUES ($id, $tag)");
            $req->execute();
        }
        
    }
}

?>