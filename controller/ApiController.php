<?php
require_once './model/GamesModel.php';
require_once './view/ApiView.php';

class ApiController {

private $model;
private $view;

function __construct(){

    $this->model=new GamesModel();
    $this->view= new ApiView();
}

private function getBody(){
    $bodyString = file_get_contents("php://input");
    return json_decode($bodyString);
}

function getGames($params = []){
    if(isset($params[':ATTR'])&&($params[':ATTR']=='ASC' || $params[':ATTR']=='DESC')){
        $games =$this->model->getGamesByOrderDB($params[':ATTR']);
        return $this->view->response($games, 200);     

    }else if (isset($params[':ATTR'])){
        $this->getGame($params[':ATTR']);
    }
    else{
        $games =$this->model->getGamesDB();
        return $this->view->response($games, 200);
    }
}

function getGame($params){
    $game =$this->model->getGameDB($params);
    if($game){
        return $this->view->response($game, 200);
    }else{
        return $this->view->response("El juego no se encuentra en la DB",404);
    }
}

function addGame($params = null){
    $body = $this->getBody();
    $game= $this->model->insertGameDB($body->name,$body->price,$body->description,$body->image,$body->id_category);
    if ($game){
        return $this->view->response("El juego se inserto con exito",201);
    }else{
        return $this->view->response("El juego no se pudo insertar",404);
    }
}

function deleteGame($params = []){
    $game_id=$params[':ID'];
    $game = $this->model->getGameDB($game_id);
    if ($game){
        $this->model->deleteGameDB($game_id);
        return $this->view->response("Juego id=$game_id eliminado con exito", 200);
    }else{
        return $this->view->response("Juego id=$game_id not found", 404);
    }

}

function editGame($params = []){
    $id = $params[':ID'];
    $game = $this->model->getGameDB($id);
    if ($game){
        $body = $this->getBody();
        $game = $this->model->updateGameDB($id,$body->name,$body->price,$body->description,$body->image,$body->id_category);
        return $this->view->response("El juego se edito con exito",200);
    }else{
        return $this->view->response("Juego id=$id not found",404);
    }
}
}
?>