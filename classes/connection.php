<?php 

class dbconnection{
    
    function startconnection(){
        $conn = mysqli_connect('localhost','root','','assign');

        return $conn;

    }
    
}



 ?>