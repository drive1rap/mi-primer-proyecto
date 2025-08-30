<?php
  header('Content-Type: text/html; charset=ISO-8859-1');
  //header('Content-Type: text/html; charset=utf-8');
  //  header('Content-type:application/json; charset=ISO-8859-1');


include("../servidor/clsservidor.php"); 

class clsnegocio extends clsservidor {
//$_SESSION['rutaapi']="http://localhost:80/TeleGestion/servidor/";
//class clsnegocio {

  function fnavegador() 
    {
      $agente = $_SERVER['HTTP_USER_AGENT'];
      $navegador = 'Unknown';
      $platforma = 'Unknown';
      $version= "";

      #Obtenemos la Plataforma
      if (preg_match('/linux/i', $agente)) 
        {
          $platforma = 'linux';
        }
      elseif (preg_match('/macintosh|mac os x/i', $agente)) 
        {
          $platforma = 'mac';
        }
      elseif (preg_match('/windows|win32/i', $agente)) 
        {
          $platforma = 'windows';
        }

      #Obtener el UserAgente
      if(preg_match('/MSIE/i',$agente) && !preg_match('/Opera/i',$agente))
        {
          $navegador = 'Internet Explorer';
          $navegador_corto = "MSIE";
        }
      else if(preg_match('/Trident/i',$agente))
        {
          $navegador = 'Internet Explorer';
          $navegador_corto = "MSIE";
        }
      elseif(preg_match('/Firefox/i',$agente))
        {
          $navegador = 'Mozilla Firefox';
          $navegador_corto = "Firefox";
        }
      elseif(preg_match('/Chrome/i',$agente))
        {
          $navegador = 'Google Chrome';
          $navegador_corto = "Chrome";
        }
      elseif(preg_match('/Safari/i',$agente))
       {
          $navegador = 'Apple Safari';
          $navegador_corto = "Safari";
       }
      elseif(preg_match('/Opera/i',$agente))
       {
          $navegador = 'Opera';
          $navegador_corto = "Opera";
       }
      elseif(preg_match('/Netscape/i',$agente))
       {
          $navegador = 'Netscape';
          $navegador_corto = "Netscape";
       }
    return array(
     'agente' => $agente,
     'nombre'      => $navegador,
     'version'   => $version,
     'plataforma'  => $platforma
    );
  }

 
function fconsu($idusu,$cla,$opc)
  {
    
/*
   $para = [
      'cade1' => $idusu,
      'cade2' => $cla,
      'opc'   => $opc,
   ];

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, $_SESSION['rutaapi']."consu.php");
    curl_setopt($cliente,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cliente, CURLOPT_POST, 1);
    curl_setopt($cliente, CURLOPT_POSTFIELDS,$para);

    $tsArray =  json_decode(curl_exec($cliente),true);
    curl_close($cliente);
    */

  	  
    $tsArray=$this->fconsus($idusu,$cla,$opc);
  	
     //   $tsArray=array_map('utf8_encode',$tsArray);


  	return  $tsArray;
  }
function faceptafuat($codi,$opcacepta,$obs)
  {
    
    $tsArray=$this->faceptafuats($codi,$opcacepta,$obs);
    return  $tsArray;
  }


function finfo($cadena1,$cadena2,$cadena3,$cadena4,$opc1,$opc2)
  {
    /*
    $post = [
      'cadena1' => $cadena1,
      'cadena2' => $cadena2,
      'cadena3' => $cadena3,
      'cadena4' => $cadena4,
      'opc1'   => $opc1,
      'opc2'   => $opc2,
   ];

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, $_SESSION['rutaapi']."info.php");
    curl_setopt($cliente,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cliente, CURLOPT_POST, 1);
    curl_setopt($cliente, CURLOPT_POSTFIELDS,$post);

    $tsArray =  json_decode(curl_exec($cliente),true);
    curl_close($cliente);
    */
     $tsArray=$this->finfos($cadena1,$cadena2,$cadena3,$cadena4,$opc1,$opc2);
  
    return  $tsArray;
  }
 
 
function ftransafic($codific,$coditrabafic,$denofic,$nivelfic,$regific,$denopuesfic,$expeinstific,$apematpacifuat,$codiservific,$areafic,$codijefeinmefic,$codijefesupefic
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
/*
    $post = [
      'codific' => $codific,
      'coditrabafic' => $coditrabafic,
      'denofic' => $denofic,
      'nivelfic' => $nivelfic,
      'regific'   => $regific,
      'denopuesfic'   => $denopuesfic,
      'expeinstific'   => $expeinstific,
      'apematpacifuat'   => $apematpacifuat,
      'codiservific'   => $codiservific,
      'areafic'   => $areafic,
      'codijefeinmefic'   => $codijefeinmefic,
      'codijefesupefic'   => $codijefesupefic,
      'puestosupefic'   => $puestosupefic,
      'fun1fic'   => $fun1fic,
      'edadpacifuat'   => $edadpacifuat,
      'fun3fic'   => $fun3fic,
      'fun4fic'   => $fun4fic,
      'fun5fic'   => $fun5fic,
      'fun6fic'   => $fun6fic,
      'fun7fic'   => $fun7fic,
      'fun8fic'   => $fun8fic,
      'coordiinterfic'   => $coordiinterfic,
      'coordiexterfic'   => $coordiexterfic,
      'prograespe'   => $prograespe,
      'conotecfic'   => $conotecfic,
      'ofiwordfic'   => $ofiwordfic,
      'ofiexcelfic'   => $ofiexcelfic,
      'ofipowerfic'   => $ofipowerfic,
      'ofiotrosfic'   => $ofiotrosfic,
      'inglesfic'   => $inglesfic,
      'otrosfic'   => $otrosfic,
      'habific'   => $habific,
      'ofiotrosobsfic'   => $ofiotrosobsfic,
      'otrosobsfic'   => $otrosobsfic,
      'secunfic'   => $secunfic,
      'auxific'   => $auxific,
      'tecnisupefic'   => $tecnisupefic,
      'opctecnisupefic'   => $opctecnisupefic,
      'unific'   => $unific,
      'opcunific'   => $opcunific,
      'maesfic'   => $maesfic,
      'opcmaesfic'   => $opcmaesfic,
      'doctofic'   => $doctofic,
      'opcdoctofic'   => $opcdoctofic,
      'usuemific'   => $usuemific,
      'codidiag2'   => $codidiag2,
      'descdiag2'   => $descdiag2,
      'opcdiag2'   => $opcdiag2,
      'opcfic'   => $opcfic,
   ];

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL,$_SESSION['rutaapi']."transafuat.php");
    curl_setopt($cliente,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cliente, CURLOPT_POST, 1);
    curl_setopt($cliente, CURLOPT_POSTFIELDS,$post);

    $tsArray =  json_decode(curl_exec($cliente),true);
    curl_close($cliente);
*/
    
      $tsArray = $this->ftransafics($codific,$coditrabafic,$denofic,$nivelfic,$regific,$denopuesfic,$expeinstific,$apematpacifuat,$codiservific,$areafic,$codijefeinmefic,$codijefesupefic
                                    , $puestosupefic, $fun1fic, $edadpacifuat, $fun3fic, $fun4fic, $fun5fic, $fun6fic, $fun7fic, $fun8fic, $coordiinterfic, $coordiexterfic, $prograespe, $conotecfic
                                    , $ofiwordfic, $ofiexcelfic, $ofipowerfic, $ofiotrosfic, $inglesfic, $otrosfic
                                    //, $dniapepatmatnomapofuat
                                    , $ofiotrosobsfic, $otrosobsfic
                                    , $secunfic, $auxific, $tecnisupefic, $opctecnisupefic, $unific, $opcunific, $maesfic, $opcmaesfic, $doctofic, $opcdoctofic, $usuemific
                                    , $codidiag2,$descdiag2,$opcdiag2
                                    //, $tipodocuapofuat,$nrodocuapofuat
                                    ,$fechanaciapofuat,$nomcompleapofuat
                                    //, $apepatapofuat, $apematapofuat
                                    , $correoapofuat, $teleapofuat, $celuapofuat
                                    , $opcfic);
    
      

      return $tsArray;
    }


function ftransaacce($coditrabaacce,$condiacce,$clacorreacce,$opcacce)
   
   {
/*
    $post = [
      'coditrabaacce' => $coditrabaacce,
      'condiacce' => $condiacce,
      'clacorreacce' => $clacorreacce,
      'opcacce' => $opcacce,
   ];

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL,$_SESSION['rutaapi']."transaacce.php");
    curl_setopt($cliente,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cliente, CURLOPT_POST, 1);
    curl_setopt($cliente, CURLOPT_POSTFIELDS,$post);

    $tsArray =  json_decode(curl_exec($cliente),true);
    curl_close($cliente);
    */
      $tsArray = $this->ftransaacces($coditrabaacce,$condiacce,$clacorreacce,$opcacce);
      return $tsArray;
    }


function ftransasuge($dni,$apepatmatnom,$tele,$correo,$suge)
   
   {
      $tsArray = $this->ftransasuges($dni,$apepatmatnom,$tele,$correo,$suge);
      return $tsArray;
    }

}
?>
