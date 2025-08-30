<?php
//header("Access-Control-Allow-Headers: X-Requested-With");
header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");
	//$cn = mysqli_connect("localhost","davidchu_empresa","empresa","davidchu_empresa");
    //$cn = mysqli_connect("localhost","root","","empresa");

    //$cn = sqlsrv_connect("DESKTOP-1LM135H", array( "Database"=>"TeleGestion", "UID"=>"sa", "PWD"=>"combate"));
    $cn = sqlsrv_connect("SRVDBPERSONAL", array( "Database"=>"TeleGestion", "UID"=>"OEI", "PWD"=>"IHJskD8"));
?>