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

    public function get_views($id)
    {
        $req = $this->db->prepare( "SELECT * FROM `user_view` 
                                    INNER JOIN `users` on users.user_id = user_view.id_user_view
                                    LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted
                                    WHERE `id_user_viewed` = $id AND id_user_blacklist is NULL");
        $req->execute();
        return ($req->fetchAll());
    }

    public function get_likes($id)
    {
        $req = $this->db->prepare("SELECT `login`, `path_profile_picture` FROM `user_likes` 
                                    INNER JOIN `users` on users.user_id = user_likes.id_user_like
                                    LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted
                                    WHERE `id_user_liked` = $id AND id_user_blacklist is NULL");
        $req->execute();
        return ($req->fetchAll());
    }

    public function get_mylikes($id)
    {
        $req = $this->db->prepare("SELECT `login`, `path_profile_picture` FROM `user_likes` 
                                    INNER JOIN `users` on users.user_id = user_likes.id_user_liked 
                                    LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted
                                    WHERE `id_user_like` = $id AND id_user_blacklist is NULL");
        $req->execute();
        return ($req->fetchAll());
    }

    public function get_blacklist($id)
    {
        $req = $this->db->prepare("SELECT `login`, `path_profile_picture` FROM `user_blacklist` INNER JOIN `users` on users.user_id = user_blacklist.id_user_blacklisted WHERE `id_user_blacklist` = $id");
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
        $req = $this->db->prepare("INSERT INTO `user_likes` (`id_user_like`, `id_user_liked`) VALUES ($user_like, $user_liked)");
        $req->execute();
        $pts = $this->db->prepare("UPDATE `users` SET `popularity`= `popularity` + 15 WHERE `user_id` = $user_liked");
        $pts->execute();
    }

    public function unlike_user($user_like, $user_liked)
    {
        $req = $this->db->prepare("DELETE FROM `user_likes` WHERE `id_user_like` = $user_like AND `id_user_liked` = $user_liked");
        $req->execute();
        $pts = $this->db->prepare("UPDATE `users` SET `popularity`= `popularity` - 15 WHERE `user_id` = $user_liked");
        $pts->execute();
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

    public function get_report($current, $user)
    {
        $req = $this->db->prepare("SELECT * FROM `user_report` WHERE `id_user_report` = $current AND `id_user_reported` = $user");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function get_block($current, $user)
    {
        $req = $this->db->prepare("SELECT * FROM `user_blacklist` WHERE `id_user_blacklist` = $current AND `id_user_blacklisted` = $user");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function get_blocked($current, $user)
    {
        $req = $this->db->prepare("SELECT * FROM `user_blacklist` WHERE `id_user_blacklist` = $user AND `id_user_blacklisted` = $current");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function already_report_user($user_report, $user_reported)
    {
        $req = $this->db->prepare("SELECT * FROM `user_report` WHERE `id_user_report` = $user_report AND `id_user_reported` = $user_reported");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function report_user($user_report, $user_reported)
    {
        $req = $this->db->prepare("INSERT INTO `user_report` (`id_user_report`, `id_user_reported`) VALUES ($user_report, $user_reported)");
        $req->execute();
    }

    public function unreport_user($user_report, $user_reported)
    {
        $req = $this->db->prepare("DELETE FROM `user_report` WHERE `id_user_report` = $user_report AND `id_user_reported` = $user_reported");
        $req->execute();
    }

    public function already_block_user($user_block, $user_blocked)
    {
        $req = $this->db->prepare("SELECT * FROM `user_blacklist` WHERE `id_user_blacklist` = $user_block AND `id_user_blacklisted` = $user_blocked");
        $req->execute();
        if (!empty($req->fetchAll()))
            return (TRUE);
        else
            return (FALSE);
    }

    public function block_user($user_block, $user_blocked)
    {
        $req = $this->db->prepare("INSERT INTO `user_blacklist` (`id_user_blacklist`, `id_user_blacklisted`) VALUES ($user_block, $user_blocked)");
        $req->execute();
    }

    public function unblock_user($user_block, $user_blocked)
    {
        $req = $this->db->prepare("DELETE FROM `user_blacklist` WHERE `id_user_blacklist` = $user_block AND `id_user_blacklisted` = $user_blocked");
        $req->execute();
    }

    public function view_profile($user_view, $user_viewed){
        $req = $this->db->prepare("SELECT * FROM `user_view` WHERE `id_user_view` = $user_view AND `id_user_viewed` = $user_viewed");
        $req->execute();
        if (!empty($req->fetch()))
        {
            $req = $this->db->prepare( "UPDATE `user_view` SET `view_date`= NOW() WHERE `id_user_view` = $user_view AND `id_user_viewed` = $user_viewed");
            $req->execute();
        }
        else
        {
            $req = $this->db->prepare( "INSERT INTO `user_view`(`id_user_view`, `id_user_viewed`) VALUES ($user_view, $user_viewed)");
            $req->execute();
            $pts = $this->db->prepare("UPDATE `users` SET `popularity`= `popularity` + 1 WHERE `user_id` = $user_viewed");
            $pts->execute();
        }
    }

    public function address_user($id, $address, $city, $country){
        $req = $this->db->prepare("UPDATE `users` SET `address`= '$address', `city` = '$city', `country` = '$country' WHERE `user_id` = $id");
        $req->execute();
    }

    public function location_user($id, $lat, $long)
    {
        $req = $this->db->prepare("UPDATE `users` SET `latitude`= '$lat', `longitude` = '$long' WHERE `user_id` = $id");
        $req->execute();
    }
}

?>