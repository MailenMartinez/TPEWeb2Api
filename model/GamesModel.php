<?php
    class GamesModel{

        private $db;

        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_steamcito;charset=utf8', 'root', '');
        }


        function getGamesDB(){
                
                $query = $this->db->prepare("SELECT * FROM game");
                $query->execute();
                $games = $query->fetchAll(PDO::FETCH_OBJ);
                return $games;
        }

        function getGamesByOrderDB($order){
            $query = $this->db->prepare("SELECT * FROM game ORDER BY price $order");
            $query->execute();
            $games = $query->fetchAll(PDO::FETCH_OBJ);
            return $games;
        }

        function getGameDB($id){
            $query = $this->db->prepare("SELECT * FROM game WHERE id_game=?");
            $query->execute(array($id));
            $game = $query->fetch(PDO::FETCH_OBJ);
            return $game;
        }
        
        function insertGameDB($name,$price,$desc,$img,$id_category){
            $query = $this->db->prepare(
                "INSERT INTO game(name,price,description,image,id_category) VALUES(?, ?, ?, ?, ?)");
            $query->execute(array($name, $price, $desc, $img, $id_category));
        }

        function deleteGameDB($id){
            $query = $this->db->prepare("DELETE FROM game WHERE id_game=?");
            $query->execute(array($id));
             }
        

        function updateGameDB($id, $name, $price, $desc, $img, $id_category){
            $query = $this->db->prepare(
                "UPDATE game SET id_game='$id',name='$name',price='$price',description='$desc',image='$img',id_category='$id_category' WHERE id_game=?");
            $query->execute(array($id));
        }

    }
?>