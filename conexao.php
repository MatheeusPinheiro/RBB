<?php 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $bd = "upload";


if($conn = mysqli_connect($host,$user,$pass,$bd)){
   // echo "Conectado";
}else{
    echo "Erro";
}




?>