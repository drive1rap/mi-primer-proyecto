<?php
	require_once("conexion.php");

	$codific = $_REQUEST["codific"];
	$coditrabafic = $_REQUEST["coditrabafic"];
	$denofic = $_REQUEST["denofic"];
	$nivelfic = $_REQUEST["nivelfic"];
	$regific = $_REQUEST["regific"];
	$denopuesfic = $_REQUEST["denopuesfic"];
	$expeinstific = $_REQUEST["expeinstific"];
	$expepuesfic = $_REQUEST["expepuesfic"];
	$codiservific = $_REQUEST["codiservific"];
	$areafic = $_REQUEST["areafic"];
	$codijefeinmefic = $_REQUEST["codijefeinmefic"];
	$codijefesupefic = $_REQUEST["codijefesupefic"];
	$puestosupefic = $_REQUEST["puestosupefic"];
	$fun1fic = $_REQUEST["fun1fic"];
	$fun2fic = $_REQUEST["fun2fic"];
	$fun3fic = $_REQUEST["fun3fic"];
	$fun4fic = $_REQUEST["fun4fic"];
	$fun5fic = $_REQUEST["fun5fic"];
	$fun6fic = $_REQUEST["fun6fic"];
	$fun7fic = $_REQUEST["fun7fic"];
	$fun8fic = $_REQUEST["fun8fic"];
	$coordiinterfic = $_REQUEST["coordiinterfic"];
	$coordiexterfic = $_REQUEST["coordiexterfic"];
	$prograespe = $_REQUEST["prograespe"];
	$conotecfic = $_REQUEST["conotecfic"];
	$ofiwordfic = $_REQUEST["ofiwordfic"];
	$ofiexcelfic = $_REQUEST["ofiexcelfic"];
	$ofipowerfic = $_REQUEST["ofipowerfic"];
	$ofiotrosfic = $_REQUEST["ofiotrosfic"];
	$inglesfic = $_REQUEST["inglesfic"];
	$otrosfic = $_REQUEST["otrosfic"];
	$habific = $_REQUEST["habific"];
	$ofiotrosobsfic = $_REQUEST["ofiotrosobsfic"];
	$otrosobsfic = $_REQUEST["otrosobsfic"];
	$secunfic = $_REQUEST["secunfic"];
	$auxific = $_REQUEST["auxific"];
	$tecnisupefic = $_REQUEST["tecnisupefic"];
	$opctecnisupefic = $_REQUEST["opctecnisupefic"];
	$unific = $_REQUEST["unific"];
	$opcunific = $_REQUEST["opcunific"];
	$maesfic = $_REQUEST["maesfic"];
	$opcmaesfic = $_REQUEST["opcmaesfic"];
	$doctofic = $_REQUEST["doctofic"];
	$opcdoctofic = $_REQUEST["opcdoctofic"];
	$usuemific = $_REQUEST["usuemific"];
	$codidiag2 = $_REQUEST["codidiag2"];
	$descdiag2 = $_REQUEST["descdiag2"];
	$opcdiag2 = $_REQUEST["opcdiag2"];
	$opcfic = $_REQUEST["opcfic"];
	






	//$rs = mysqli_query($cn,
	//	"insert into categorias (nombre,descripcion) values('".$nombre."','".$descripcion."')");
//      $rs = sqlsrv_query($cn,
//		"insert into categorias (nombre,descripcion) values('".$nombre."','".$descripcion."')");

	  $para= array( 
	  	          array($codific,SQLSRV_PARAM_IN),
                  array($coditrabafic,SQLSRV_PARAM_IN),
                  array($denofic,SQLSRV_PARAM_IN),
                  array($nivelfic,SQLSRV_PARAM_IN),
                  array($regific,SQLSRV_PARAM_IN),
                  array($denopuesfic,SQLSRV_PARAM_IN),
                  array($expeinstific,SQLSRV_PARAM_IN),
                  array($expepuesfic,SQLSRV_PARAM_IN),
                  array($codiservific,SQLSRV_PARAM_IN),
                  array($areafic,SQLSRV_PARAM_IN),
                  array($codijefeinmefic,SQLSRV_PARAM_IN),
                  array($codijefesupefic,SQLSRV_PARAM_IN),
                  array($puestosupefic,SQLSRV_PARAM_IN),
                  array($fun1fic,SQLSRV_PARAM_IN),
                  array($fun2fic,SQLSRV_PARAM_IN),
                  array($fun3fic,SQLSRV_PARAM_IN),
                  array($fun4fic,SQLSRV_PARAM_IN),
                  array($fun5fic,SQLSRV_PARAM_IN),
                  array($fun6fic,SQLSRV_PARAM_IN),
                  array($fun7fic,SQLSRV_PARAM_IN),
                  array($fun8fic,SQLSRV_PARAM_IN),
                  array($coordiinterfic,SQLSRV_PARAM_IN),
                  array($coordiexterfic,SQLSRV_PARAM_IN),
                  array($prograespe,SQLSRV_PARAM_IN),
                  array($conotecfic,SQLSRV_PARAM_IN),
                  array($ofiwordfic,SQLSRV_PARAM_IN),
                  array($ofiexcelfic,SQLSRV_PARAM_IN),
                  array($ofipowerfic,SQLSRV_PARAM_IN),
                  array($ofiotrosfic,SQLSRV_PARAM_IN),
                  array($inglesfic,SQLSRV_PARAM_IN),
                  array($otrosfic,SQLSRV_PARAM_IN),
                  array($habific,SQLSRV_PARAM_IN),
                  array($ofiotrosobsfic,SQLSRV_PARAM_IN),
                  array($otrosobsfic,SQLSRV_PARAM_IN),
                  array($secunfic,SQLSRV_PARAM_IN),
                  array($auxific,SQLSRV_PARAM_IN),
                  array($tecnisupefic,SQLSRV_PARAM_IN),
                  array($opctecnisupefic,SQLSRV_PARAM_IN),
                  array($unific,SQLSRV_PARAM_IN),
                  array($opcunific,SQLSRV_PARAM_IN),
                  array($maesfic,SQLSRV_PARAM_IN),
                  array($opcmaesfic,SQLSRV_PARAM_IN),
                  array($doctofic,SQLSRV_PARAM_IN),
                  array($opcdoctofic,SQLSRV_PARAM_IN),
                  array($usuemific,SQLSRV_PARAM_IN),
                  array($codidiag2,SQLSRV_PARAM_IN),
                  array($descdiag2,SQLSRV_PARAM_IN),
                  array($opcdiag2,SQLSRV_PARAM_IN),
                  array($opcfic,SQLSRV_PARAM_IN)

               );

	//echo mysqli_insert_id($cn); 
	//$resultado = sqlsrv_query($cn,"{call pa_transacate(?, ?, ?, ?)}", $para);
	$resultado = sqlsrv_query($cn,"{call ptg_transafuat (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}", $para);
    
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