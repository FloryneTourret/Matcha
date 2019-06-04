<?php

Class Recherche_model extends Model
{
    public function get_tags()
    {
        $req = $this->db->prepare("SELECT * FROM `tags` WHERE 1 ORDER BY `tag_name` ASC");
        $req->execute();
        return ($req->fetchAll());
    }

    private static function distance($lat1, $lng1, $lat2, $lng2, $unit = 'k')
    {
        $earth_radius = 6378137;
        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);
        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $meter = ($earth_radius * $d);
        if ($unit == 'k') {
            return $meter / 1000;
        }
        return $meter;
    }

    public function get_users_from_search($gender, $type, $age_min, $age_max, $orientation, $city, $distance, $search_tags, $pop_min, $pop_max)
    {
        $latitude = $_SESSION['user']['latitude'];
        $longitude = $_SESSION['user']['longitude'];
        $login = $_SESSION['user']['login'];
        if ($orientation > 0 && $orientation <= 3) {
            if ($gender > 0 && $gender < 3) {
                $req = $this->db->prepare("SELECT *, (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
                                        FROM `users`
                                        LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted 
                                        WHERE `user_gender_id` = $orientation 
                                        AND (`user_orientation_id` = $gender OR `user_orientation_id` = 4 OR `user_orientation_id` = 5)
                                        AND id_user_blacklist is NULL
                                        ORDER BY `popularity` DESC");
            } else if ($gender == 3) {
                $req = $this->db->prepare("SELECT * , (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
                                        FROM `users`
                                        LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted 
                                        WHERE `user_gender_id` = $orientation 
                                        AND (`user_orientation_id` = $gender OR `user_orientation_id` = 5)
                                        AND id_user_blacklist is NULL
                                        ORDER BY `popularity` DESC");
            }
        } else if ($orientation == 4) {
            if ($gender > 0 && $gender < 3) {
                $req = $this->db->prepare("SELECT * , (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
                                        FROM `users`
                                        LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted 
                                        WHERE (`user_gender_id` = 1 OR  `user_gender_id` = 2)
                                        AND (`user_orientation_id` = $gender OR `user_orientation_id` = 4 OR `user_orientation_id` = 5)
                                        AND id_user_blacklist is NULL
                                        ORDER BY `popularity` DESC");
            } else if ($gender == 3) {
                $req = $this->db->prepare("SELECT * , (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
                                        FROM `users`
                                        LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted  
                                        WHERE (`user_gender_id` = 1 OR  `user_gender_id` = 2) 
                                        AND (`user_orientation_id` = $gender OR `user_orientation_id` = 5)
                                        AND id_user_blacklist is NULL
                                        ORDER BY `popularity` DESC");
            }
        } else if ($orientation == 5) {
            if ($gender > 0 && $gender < 3) {
                $req = $this->db->prepare("SELECT * , (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
                                        FROM `users` 
                                        LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted 
                                        WHERE (`user_gender_id` = 1 OR  `user_gender_id` = 2 OR  `user_gender_id` = 3)
                                        AND (`user_orientation_id` = $gender OR `user_orientation_id` = 4 OR `user_orientation_id` = 5)
                                        AND id_user_blacklist is NULL
                                        ORDER BY `popularity` DESC");
            } else if ($gender == 3) {
                $req = $this->db->prepare("SELECT * , (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
                                        FROM `users` 
                                        LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted 
                                        WHERE (`user_gender_id` = 1 OR  `user_gender_id` = 2 OR  `user_gender_id` = 5) 
                                        AND (`user_orientation_id` = $gender OR `user_orientation_id` = 5)
                                        AND id_user_blacklist is NULL
                                        ORDER BY `popularity` DESC");
            }
        }
        else{
            $req = $this->db->prepare("SELECT * , (SELECT count(*) FROM `pictures` INNER JOIN `users` ON users.user_id = pictures.picture_user_id WHERE `login` = '$login' LIMIT 5) as count_pictures
            FROM `users` 
            LEFT OUTER JOIN `user_blacklist` on users.user_id = user_blacklist.id_user_blacklisted
            WHERE (`user_orientation_id` = $gender OR `user_orientation_id` = 5 OR `user_orientation_id` = 4)
            AND id_user_blacklist is NULL
            ORDER BY `popularity` DESC");
        }
        $req->execute();
        $results = $req->fetchAll();

        $i = 0;
        foreach ($results as $user) {
            $id = $user['user_id'];
            $user_latitude = $user['latitude'];
            $user_longitude = $user['longitude'];

            $results[$i]['distance'] = round($this->distance($latitude, $longitude, $user_latitude, $user_longitude));

            $tags = $this->db->prepare("SELECT `tag_name` FROM `user_tag`
            INNER JOIN `tags` on tags.tag_id = user_tag.id_tag
            INNER JOIN `users` on users.user_id = user_tag.id_user
            WHERE `user_id` = '$id'");
            $tags->execute();
            $all_tags = $tags->fetchAll();
            foreach ($all_tags as $tag) {
                $results[$i]['user_tags'][] = $tag;
            }
            $i++;
        }

        $i = 0;
        $id = $_SESSION['user']['user_id'];
        foreach ($results as $user) {
            $user_id = $user['user_id'];
            $like = $this->db->prepare("SELECT * FROM `user_likes` WHERE `id_user_liked` = $id AND `id_user_like` = $user_id");
            $like->execute();
            if (!empty($like->fetchAll()))
                $results[$i]['like'] = 1;
            else
                $results[$i]['like'] = 0;
            $i++;
        }

        $i = 0;
        $id = $_SESSION['user']['user_id'];
        foreach ($results as $user) {
            $user_id = $user['user_id'];
            $liked = $this->db->prepare("SELECT * FROM `user_likes` WHERE `id_user_liked` = $user_id AND `id_user_like` = $id");
            $liked->execute();
            if (!empty($liked->fetchAll()))
                $results[$i]['liked'] = 1;
            else
                $results[$i]['liked'] = 0;
            $i++;
        }

        $i = 0;
        foreach ($results as $user) {
            if ($user['user_id'] == $_SESSION['user']['user_id']) {
                array_splice($results, $i, 1);
                $i--;
            }
            $i++;
        }
        $i = 0;
        foreach ($results as $user) {
            $tags_commun = 0;
            if (isset($user['user_tags'])) {
                foreach ($user['user_tags'] as $user_tag) {
                    foreach ($_SESSION['user']['user_tags'] as $tag) {
                        if ($tag['tag_name'] == $user_tag['tag_name'])
                            $tags_commun++;
                    }
                }
            }
            $results[$i]['tags_commun'] = $tags_commun;
            $i++;
        }

        if ($age_min != 'none') {
            $i = 0;
            foreach ($results as $user) {
                $datemin = date("Y-m-d", strtotime(date("Y-m-d") . '-' . $age_min . ' year'));
                if ($user['user_birthdate'] > $datemin) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }
        if ($age_max != 'none') {
            $i = 0;
            foreach ($results as $user) {
                $datemax = date("Y-m-d", strtotime(date("Y-m-d") . '-' . ($age_max + 1) . ' year'));
                if ($user['user_birthdate'] <= $datemax) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }
        if ($city != 'none') {
            $i = 0;
            foreach ($results as $user) {
                if ($user['city'] != $city) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }
        if ($distance != 'none') {
            $i = 0;
            foreach ($results as $user) {
                if ($user['distance'] > $distance) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }
        if ($pop_min != 'none') {
            $i = 0;
            foreach ($results as $user) {
                if ($user['popularity'] < $pop_min) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }
        if ($pop_max != 'none') {
            $i = 0;
            foreach ($results as $user) {
                if ($user['popularity'] > $pop_max) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }
        if ($search_tags != 'none') {
            $i = 0;
            foreach ($results as $user) {
                $tags_commun = 0;
                foreach ($user['user_tags'] as $user_tag) {
                    foreach ($search_tags as $tag) {
                        if ($tag == $user_tag['tag_name'])
                            $tags_commun++;
                    }
                }
                if ($tags_commun != count($search_tags)) {
                    array_splice($results, $i, 1);
                    $i--;
                }
                $i++;
            }
        }

        if ($type == 'distance') {
            $dist = array();
            foreach ($results as $key => $row) {
                $dist[$key] = $row['distance'];
            }
            array_multisort($dist, SORT_ASC, $results);
        } else if ($type == 'age') {
            $age = array();
            foreach ($results as $key => $row) {
                $age[$key] = $row['user_birthdate'];
            }
            array_multisort($age, SORT_DESC, $results);
        } else if ($type == 'popularite') {
            $popu = array();
            foreach ($results as $key => $row) {
                $popu[$key] = $row['popularity'];
            }
            array_multisort($popu, SORT_DESC, $results);
        } else if ($type == 'tags') {
            $tags = array();
            foreach ($results as $key => $row) {
                $tags[$key] = $row['tags_commun'];
            }
            array_multisort($tags, SORT_DESC, $results);
        }

        return ($results);
    }
    
}

?>