<?php
    class ApiView{


        public function response ($data, $status){
            header("Content-Type: application/json");
            header("HTTP/1.1". $status . " " . $this->_requestStatus($status));
            echo json_encode($data);
        }

        private function _requestStatus($code){
            $status = array(
                200 => "OK",
                201 => "Created",
                404 => "Not founded",
                500 => "Internal server error"
            );
            return (isset($status[$code]))? $status[$code] : $status [500];
        }



    }




?>