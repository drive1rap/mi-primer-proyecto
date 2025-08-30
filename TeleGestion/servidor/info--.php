<?php
	require_once("conexion.php");

  $cadena1 = $_REQUEST["cadena1"];
  $cadena2 = $_REQUEST["cadena2"];
  $cadena3 = $_REQUEST["cadena3"];
  $cadena4 = $_REQUEST["cadena4"];
  $opc1 = $_REQUEST["opc1"];
  $opc2 = $_REQUEST["opc2"];

  $para= array( 
                  array($cadena1, SQLSRV_PARAM_IN),
                  array($cadena2, SQLSRV_PARAM_IN),
                  array($cadena3, SQLSRV_PARAM_IN),
                  array($cadena4, SQLSRV_PARAM_IN),
                  array($opc1, SQLSRV_PARAM_IN),
                  array($opc2, SQLSRV_PARAM_IN)
               );
	$resultado = sqlsrv_query($cn,"{call ptg_info(?, ?, ?, ?, ?, ?)}",$para);

	if($resultado)
    {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = array_map("utf8_encode",$row);
     
        sqlsrv_free_stmt($resultado);
        if (!empty($data))
          {
             echo json_encode($data);
          }
          else
          {
             echo '';
          }
    }
   else
    {
       echo '';
    }

	sqlsrv_close($cn);
	
?>