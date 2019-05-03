<?php 

Class Profile_model extends Model
{
    public function get_current($login)
    {
        $req = $this->db->prepare("SELECT * from `users` INNER JOIN `orientations` on users.user_orientation_id = orientations.orientation_id WHERE `login` = '$login'");
        $req->execute();
        return ($req->fetch());
    }

    public function get_pictures($id){
        $req = $this->db->prepare("SELECT * from `pictures` WHERE `picture_user_id` = '$id' ORDER BY `picture_date` DESC LIMIT 5");
        $req->execute();
        return ($req->fetchAll());
    }
}

?>