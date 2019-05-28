<?php

Class Accueil_model extends Model
{

    public function get_suggestions(){
        $req = $this->db->prepare( "SELECT * FROM `users` 
                                    WHERE `user_gender_id` = 1");
        $req->execute();
        $results = $req->fetchAll();

        $i = 0;
        foreach($results as $user)
        {
            $id = $user['user_id'];
            $tags= $this->db->prepare("SELECT `tag_name` FROM `user_tag`
            INNER JOIN `tags` on tags.tag_id = user_tag.id_tag
            INNER JOIN `users` on users.user_id = user_tag.id_user
            WHERE `user_id` = '$id'");
            $tags->execute();
            $all_tags = $tags->fetchAll();
            foreach($all_tags as $tag)
            {
                $results[$i]['user_tags'][] = $tag;
            }
            $i++;
        }

        return ($results);
    }
    
}

?>