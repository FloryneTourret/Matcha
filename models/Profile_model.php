<?php 

Class Profile_model extends Model
{
    public function get_current($login)
    {
        $req = $this->db->prepare("SELECT *,
        (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
        FROM `users` 
        INNER JOIN `orientations` on users.user_orientation_id = orientations.orientation_id WHERE `login` = '$login'");
        $req->execute();
        return ($req->fetch());
    }

    public function get_pictures($id){
        $req = $this->db->prepare("SELECT * from `pictures` WHERE `picture_user_id` = '$id' ORDER BY `picture_date` DESC LIMIT 5");
        $req->execute();
        return ($req->fetchAll());
    }

    public function get_user_tags($login)
    {
        $req = $this->db->prepare("SELECT `tag_name` FROM `user_tag`
        INNER JOIN `tags` on tags.tag_id = user_tag.id_tag
        INNER JOIN `users` on users.user_id = user_tag.id_user
        WHERE `login` = '$login'");
        $req->execute();
        return ($req->fetchAll());
    }

    public function already_like_user($user_like, $user_liked){
        $req = $this->db->prepare("SELECT * FROM `user_likes` WHERE `id_user_like` = $user_like AND `id_user_liked` = $user_liked");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function like_user($user_like, $user_liked)
    {
        $req = $this->db->prepare( "INSERT INTO `user_likes` (`id_user_like`, `id_user_liked`) VALUES ($user_like, $user_liked)");
        $req->execute();
    }

    public function unlike_user($user_like, $user_liked)
    {
        $req = $this->db->prepare("DELETE FROM `user_likes` WHERE `id_user_like` = $user_like AND `id_user_liked` = $user_liked");
        $req->execute();
    }

    public function get_like($current, $user)
    {
        $req = $this->db->prepare("SELECT * FROM `user_likes` WHERE `id_user_like` = $current AND `id_user_liked` = $user");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function get_liked($current, $user)
    {
        $req = $this->db->prepare("SELECT * FROM `user_likes` WHERE `id_user_liked` = $current AND `id_user_like` = $user");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }
}

?>