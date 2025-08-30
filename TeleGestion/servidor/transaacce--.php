<?php
	require_once("conexion.php");

	$coditrabaacce = $_REQUEST["coditrabaacce"];
	$condiacce = $_REQUEST["condiacce"];
	$clacorreacce = $_REQUEST["clacorreacce"];
	$opcacce = $_REQUEST["opcacce"];

	  $para= array( 
	  	          array($coditrabaacce,SQLSRV_PARAM_IN),
                  array($condiacce,SQLSRV_PARAM_IN),
                  array($clacorreacce,SQLSRV_PARAM_IN),
                  array($opcacce,SQLSRV_PARAM_IN)
               );

	$resultado = sqlsrv_query($cn,"{call ptg_transaacce (?, ?, ?, ?)}", $para);
    
    if($resultado)
      {
         $err='0';   
      }
    else
      {
         $err='1';   
      }


	echo $err;
	//mysqli_close($cn);
	sqlsrv_free_stmt($resultado);
	sqlsrv_close($cn);
	
?>