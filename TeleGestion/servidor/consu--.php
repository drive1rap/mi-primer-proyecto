<?php
	require_once("conexion.php");

  $cade1 = $_REQUEST["cade1"];
  $cade2 = $_REQUEST["cade2"];
  $opc = $_REQUEST["opc"];
  $para= array( 
                array($cade1,SQLSRV_PARAM_IN),
                array($cade2,SQLSRV_PARAM_IN),
                array($opc,SQLSRV_PARAM_IN)
               );
	$resultado = sqlsrv_query($cn,"{call ptg_consu(?,?,?)}",$para);

	if($resultado)
    {

        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        {
            $data[] = array_map("utf8_encode",$row);
        }
    
        sqlsrv_free_stmt($resultado);
        if (!empty($data))
          {
             echo json_encode($data);
            //  echo str($data);
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