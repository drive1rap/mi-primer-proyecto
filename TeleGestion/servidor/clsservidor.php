<?php
  header('Content-Type: text/html; charset=ISO-8859-1');
  //header('Content-Type: text/html; charset=utf-8');
  //header('Content-Type: text/html; charset=ISO-8859-1');
  //header('Content-type:application/json; charset=ISO-8859-1');

class clsservidor {
   
 private $conexion="";  
public function conexion()
 {

  try  
  {
  

   // $this->conexion = (mssql_connect("SRVCLUSTERDB","OEI","OEIXJ07")); 
   //mssql_select_db("personal",$this->conexion);

   //  $this->conexion = sqlsrv_connect("PC-SEVEN\SRVCLUSTERDB", array( "Database"=>"fichatecnica", "UID"=>"OEI", "PWD"=>"OEIXJ07"));
   //$this->conexion = sqlsrv_connect("OEIDES-PC11", array( "Database"=>"fichatecnica", "UID"=>"OEI", "PWD"=>"OEIXJ07"));
   //$this->conexion = sqlsrv_connect("SRVCLUSTERDB", array( "Database"=>"fichatecnica", "UID"=>"OEI", "PWD"=>"OEIXJ07"));
   //$this->conexion = sqlsrv_connect("DESKTOP-1LM135H", array( "Database"=>"TeleGestion", "UID"=>"sa", "PWD"=>"combate"));
   //$this->conexion = sqlsrv_connect("DESKTOP-KAHKPEI", array( "Database"=>"TeleGestion", "UID"=>"sa", "PWD"=>"combate"));
   //$this->conexion = sqlsrv_connect("SRVDBPERSONAL", array( "Database"=>"TeleGestion", "UID"=>"OEI", "PWD"=>"IHJskD8"));
   $this->conexion = sqlsrv_connect("SRVDBMAIN", array( "Database"=>"TeleGestion", "UID"=>"OEI", "PWD"=>"OEIXJ07"));




     
  } 


  catch (Exception $e)
  
   {
      session_start();
      $_SESSION["error"]="Verificacion de Conexion del Servidor ...";
      header("Location:error.php");

     // echo 'ERROR';

      exit;
      //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
   }

    //or die(mysql_error());
  
 } 
 
public function desconexion()
 {
   
   sqlsrv_close($this->conexion);
 }




public function fconsus($usu, $cla,$opc)
 {
  
 
   $this->conexion();
   //$sql = "{call ptg_consu8 (?, ?, ?)}";
   $sql = "{call ptg_consu10 (?, ?, ?)}";
    $params = array( 
                  array($usu, SQLSRV_PARAM_IN),
                  array($cla, SQLSRV_PARAM_IN),
                  array($opc, SQLSRV_PARAM_IN)
                  //array($output_parameter, SQLSRV_PARAM_OUT)
               );

  $resultado = sqlsrv_query( $this->conexion,$sql, $params);

  

  if($resultado)
    {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
        sqlsrv_free_stmt($resultado);
        $this->desconexion();


        if (!empty($data))
          {
           return $data;    
          }
          else
          {
           return '';   
          }
    }
   else
    {
       session_start();
       //$_SESSION["error"]="Verificacion de Acceso a la Consulta ..";
        $_SESSION["error"]=sqlsrv_errors();
              
       header("Location:error.php");
       exit;
       return '';
    }

   

 }



public function faceptafuats($codi, $opcacepta,$obs)
 {
  
 
   $this->conexion();
   //$sql = "{call ptg_aceptafuat (?, ?, ?)}";
   $sql = "{call ptg_aceptafuat10 (?, ?, ?)}";
    $params = array( 
                  array($codi, SQLSRV_PARAM_IN),
                  array($opcacepta, SQLSRV_PARAM_IN),
                  array($obs, SQLSRV_PARAM_IN)
                  //array($output_parameter, SQLSRV_PARAM_OUT)
               );

  $resultado = sqlsrv_query( $this->conexion,$sql, $params);

  

  if($resultado)
    {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
        sqlsrv_free_stmt($resultado);
        $this->desconexion();


        if (!empty($data))
          {
           return $data;    
          }
          else
          {
           return '';   
          }
    }
   else
    {
       session_start();
       //$_SESSION["error"]="Verificacion de Acceso a la Consulta ..";
        $_SESSION["error"]=sqlsrv_errors();
              
       header("Location:error.php");
       exit;
       return '';
    }

   

 }



public function finfos($cadena1,$cadena2,$cadena3,$cadena4,$opc1,$opc2)
 {
   
  
   $this->conexion();
   $sql = "{call ptg_info10 (?, ?, ?, ?, ?, ?)}";
    $params = array( 
                  array($cadena1, SQLSRV_PARAM_IN),
                  array($cadena2, SQLSRV_PARAM_IN),
                  array($cadena3, SQLSRV_PARAM_IN),
                  array($cadena4, SQLSRV_PARAM_IN),
                  array($opc1, SQLSRV_PARAM_IN),
                  array($opc2, SQLSRV_PARAM_IN)

               ); 

  $resultado = sqlsrv_query( $this->conexion,$sql, $params);
  if($resultado)
    {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
        sqlsrv_free_stmt($resultado);
        if (!empty($data))
          {
           return $data;    
          }
          else
          {
           return '';   
          }
    }
   else
    {
       session_start();
       $_SESSION["error"]=sqlsrv_errors();
       header("Location:error.php");
       exit;
       return '';
    }

 }



public function ftransafics($codific,$coditrabafic,$denofic,$nivelfic,$regific,$denopuesfic,$expeinstific,$apematpacifuat,$codiservific,$areafic,$codijefeinmefic,$codijefesupefic
                                    , $puestosupefic, $fun1fic, $edadpacifuat, $fun3fic
                                    , $fun4fic, $fun5fic
                                    , $fun6fic, $fun7fic, $fun8fic, $coordiinterfic, $coordiexterfic, $prograespe, $conotecfic
                                    , $ofiwordfic, $ofiexcelfic
                                    , $ofipowerfic, $ofiotrosfic
                                    , $inglesfic, $otrosfic
                                    //, $dniapepatmatnomapofuat
                                    , $ofiotrosobsfic, $otrosobsfic
                                    , $secunfic, $auxific, $tecnisupefic, $opctecnisupefic, $unific, $opcunific, $maesfic, $opcmaesfic, $doctofic, $opcdoctofic, $usuemific
                                    , $codidiag2,$descdiag2,$opcdiag2
                                    //, $tipodocuapofuat,$nrodocuapofuat
                                    ,$fechanaciapofuat,$nomcompleapofuat
                                    //, $apepatapofuat, $apematapofuat
                                    , $correoapofuat, $teleapofuat, $celuapofuat
                                    
                                    , $opcfic)
  {
     
    $this->conexion();
    $para= array( 
                  array(utf8_decode($codific), SQLSRV_PARAM_IN),
                  array(utf8_decode($coditrabafic), SQLSRV_PARAM_IN),
                  array(utf8_decode($denofic), SQLSRV_PARAM_IN),
                  array(utf8_decode($nivelfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($regific), SQLSRV_PARAM_IN),
                  array(utf8_decode($denopuesfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($expeinstific), SQLSRV_PARAM_IN),
                  array(utf8_decode($apematpacifuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($codiservific), SQLSRV_PARAM_IN),
                  array(utf8_decode($areafic), SQLSRV_PARAM_IN),
                  array(utf8_decode($codijefeinmefic), SQLSRV_PARAM_IN),
                  array(utf8_decode($codijefesupefic), SQLSRV_PARAM_IN),
                  array(utf8_decode($puestosupefic), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun1fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($edadpacifuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun3fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun4fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun5fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun6fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun7fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun8fic), SQLSRV_PARAM_IN),
                  array(utf8_decode($coordiinterfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($coordiexterfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($prograespe), SQLSRV_PARAM_IN),
                  array(utf8_decode($conotecfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofiwordfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofiexcelfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofipowerfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofiotrosfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($inglesfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($otrosfic), SQLSRV_PARAM_IN),
                  //array(utf8_decode($dniapepatmatnomapofuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofiotrosobsfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($otrosobsfic), SQLSRV_PARAM_IN),

                  array(utf8_decode($secunfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($auxific), SQLSRV_PARAM_IN),
                  array(utf8_decode($tecnisupefic), SQLSRV_PARAM_IN),
                  array(utf8_decode($opctecnisupefic), SQLSRV_PARAM_IN),
                  array(utf8_decode($unific), SQLSRV_PARAM_IN),
                  array(utf8_decode($opcunific), SQLSRV_PARAM_IN),
                  array(utf8_decode($maesfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($opcmaesfic), SQLSRV_PARAM_IN),
                  array(utf8_decode($doctofic), SQLSRV_PARAM_IN),
                  array(utf8_decode($opcdoctofic), SQLSRV_PARAM_IN),
                  array(utf8_decode($usuemific), SQLSRV_PARAM_IN),

                  array(utf8_decode($codidiag2), SQLSRV_PARAM_IN),
                  array(utf8_decode($descdiag2), SQLSRV_PARAM_IN),
                  array(utf8_decode($opcdiag2), SQLSRV_PARAM_IN),

                  //array(utf8_decode($tipodocuapofuat), SQLSRV_PARAM_IN),
                  //array(utf8_decode($nrodocuapofuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($fechanaciapofuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($nomcompleapofuat), SQLSRV_PARAM_IN),

                  //array(utf8_decode($apepatapofuat), SQLSRV_PARAM_IN),
                  //array(utf8_decode($apematapofuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($correoapofuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($teleapofuat), SQLSRV_PARAM_IN),
                  array(utf8_decode($celuapofuat), SQLSRV_PARAM_IN),

                 

                  

                  array(utf8_decode($opcfic), SQLSRV_PARAM_IN)
               );

  $resultado = sqlsrv_query( $this->conexion,"{call ptg_transafuat10 (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    , ?, ?, ?, ?)}", $para);
   if($resultado)
   {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
      sqlsrv_free_stmt($resultado);
     if (!empty($data))
        {
           return $data;    
        }
      else
          {
           return '';   
          }

    }
    else
    {
     
       session_start();
       $_SESSION["error"]="Verificacion de Acceso a la Transaccion ..";
       header("Location:error.php");
       exit;
       return '';
    }

  }




public function ftransaficvalis($codific,$coditrabafic,$codijefeficvali,$denojefeficvali,$denojefeinmeficvali,$codiservificvali
        ,$areaficvali,$fun1ficvali,$obsfun1ficvali,$edadpacifuatvali,$obsedadpacifuatvali,$fun3ficvali,$obsfun3ficvali
        ,$fun4ficvali,$obsfun4ficvali,$fun5ficvali,$obsfun5ficvali,$fun6ficvali,$obsfun6ficvali
        ,$fun7ficvali,$obsfun7ficvali,$fun8ficvali,$obsfun8ficvali,$coordiinterficvali,$coordiexterficvali
        ,$conotecficvali,$ofiwordficvali,$ofiexcelficvali,$ofipowerficvali,$inglesficvali,$obsinglesficvali
        ,$habificvali,$recoficvali
        ,$obsofiwordficvali,$obsofiexcelficvali
        ,$obsofipowerficvali,$obsotrosofificvali,$obsotrosinglesficvali,$otrosinglesficvali
        ,$ordenfun1ficvali,$ordenedadpacifuatvali,$ordenfun3ficvali,$ordenfun4ficvali
        ,$ordenfun5ficvali,$ordenfun6ficvali,$ordenfun7ficvali,$ordenfun8ficvali
        , $usuemificvali, $opcfic)
  {
     
    $this->conexion();
    $para= array( 
                  array(utf8_decode($codific), SQLSRV_PARAM_IN),
                  array(utf8_decode($coditrabafic), SQLSRV_PARAM_IN),
                  array(utf8_decode($codijefeficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($denojefeficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($denojefeinmeficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($codiservificvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($areaficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun1ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun1ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($edadpacifuatvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsedadpacifuatvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun3ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun3ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun4ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun4ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun5ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun5ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun6ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun6ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun7ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun7ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($fun8ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsfun8ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($coordiinterficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($coordiexterficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($conotecficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofiwordficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofiexcelficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ofipowerficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($inglesficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsinglesficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($habificvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($recoficvali), SQLSRV_PARAM_IN),

                  array(utf8_decode($obsofiwordficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsofiexcelficvali), SQLSRV_PARAM_IN),

                  array(utf8_decode($obsofipowerficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsotrosofificvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($obsotrosinglesficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($otrosinglesficvali), SQLSRV_PARAM_IN),

                  array(utf8_decode($ordenfun1ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenedadpacifuatvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenfun3ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenfun4ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenfun5ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenfun6ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenfun7ficvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($ordenfun8ficvali), SQLSRV_PARAM_IN),


                  array(utf8_decode($usuemificvali), SQLSRV_PARAM_IN),
                  array(utf8_decode($opcfic), SQLSRV_PARAM_IN)
               );

  $resultado = sqlsrv_query( $this->conexion,"{call pfic_transaficvali (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}", $para);
   if($resultado)
   {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
      sqlsrv_free_stmt($resultado);
     if (!empty($data))
        {
           return $data;    
        }
      else
          {
           return '';   
          }

    }
    else
    {
     
       session_start();
       $_SESSION["error"]="Verificacion de Acceso a la Transaccion ..";
       header("Location:error.php");
       exit;
       return '';
    }

  }



public function ftransaacces($coditrabaacce,$condiacce,$clacorreacce,$opcacce)
  {
     
    $this->conexion();
    $para= array( 
                  array(utf8_decode($coditrabaacce), SQLSRV_PARAM_IN),
                  array(utf8_decode($condiacce), SQLSRV_PARAM_IN),
                  array(utf8_decode($clacorreacce), SQLSRV_PARAM_IN),
                  array(utf8_decode($opcacce), SQLSRV_PARAM_IN)
                  
               );

  $resultado = sqlsrv_query( $this->conexion,"{call ptg_transaacce10 (?, ?, ?, ?)}", $para);
   if($resultado)
   {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
      sqlsrv_free_stmt($resultado);
     if (!empty($data))
        {
           return $data;    
        }
      else
          {
           return '';   
          }

    }
    else
    {
     
       session_start();
       $_SESSION["error"]="Verificacion de Acceso a la Transaccion ..";
       header("Location:error.php");
       exit;
       return '';
    }

  }

public function ftransasuges($dni,$apepatmatnom,$tele,$correo,$suge)
  {
     
    $this->conexion();
    $para= array( 
                  array(utf8_decode($dni), SQLSRV_PARAM_IN),
                  array(utf8_decode($apepatmatnom), SQLSRV_PARAM_IN),
                  array(utf8_decode($tele), SQLSRV_PARAM_IN),
                  array(utf8_decode($correo), SQLSRV_PARAM_IN),
                  array(utf8_decode($suge), SQLSRV_PARAM_IN)
                  
                  
               );

  $resultado = sqlsrv_query( $this->conexion,"{call ptg_transasuge10 (?, ?, ?, ?, ?)}", $para);
   if($resultado)
   {
        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) )
        $data[] = $row;   
     
      sqlsrv_free_stmt($resultado);
     if (!empty($data))
        {
           return $data;    
        }
      else
          {
           return '';   
          }

    }
    else
    {
     
       session_start();
       $_SESSION["error"]="Verificacion de Acceso a la Transaccion ..";
       header("Location:error.php");
       exit;
       return '';
    }

  }



}
?>
