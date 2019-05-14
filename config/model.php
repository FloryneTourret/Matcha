<?php

require_once ('Database.php');

Class Model{

    public $db;
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->openConnection();

        if(isset($_SESSION['user']))
        {
            $req = $this->db->prepare("UPDATE `users` SET `last_connexion` = now() WHERE `user_id` = :id");
            $req->bindParam(':id', $_SESSION['user']['user_id']);
            $req->execute();
        }
    }
}


?>