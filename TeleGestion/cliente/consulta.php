<?php


  //header('Content-Type: text/html; charset=ISO-8859-1');
  //header("Content-type: application/json; charset=utf-8");
  header('Content-type:application/json; charset=ISO-8859-1');

  /*
  session_start();
  if ($_SESSION["usu"]=="")
   {
     header("Location:index.php");
     exit;
   } 
   */

include("../negocio/clsnegocio.php");
$clsnegocio = new clsnegocio;

$fnavegador=$clsnegocio->fnavegador();

$options='';
$data=''; 


if ($_POST['opc1']=='fuat') 
{
  if ($_POST['opc2']=='captcha') 
   {
     $secret = '6LeVtagZAAAAACzaQT-EkP8oeNaxEbbYeIbeKNKV';
     $captcha = $_POST['captcha'];
     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
    
     $array = json_decode($response, TRUE);
     echo json_encode($array);  

   }
  else if ($_POST['opc2']=='consupacifuat') 
   {
    /*
     $arraypacifuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consupacifuat');
     if($arraypacifuat)
           {
                foreach ($arraypacifuat as $datapacifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datapacifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
        */

/*
        $filestring = file_get_contents('http://172.30.31.13/datasis/consultareniec.asmx/consulta_reniec_dni?ls_numerodni=40175641',true);
        $filearray = explode("\n", $filestring);
        foreach ($filearray as $valor) 
        { 
          $array[]=$valor;
        } 
        echo $array[14];   
        */
 
        $filestring = file_get_contents('http://172.30.31.13/datasis/consultareniec.asmx/consulta_reniec_dni?ls_numerodni='.$_POST['cade1'],true);
        $filearray = explode("\n", $filestring);
        $stack = array();
        //$myObj = new stdClass();
        foreach ($filearray as $valor) 
         { 
               array_push($stack,trim($valor));
               //  $myObj->name = trim($valor);
            
         } 

        echo json_encode($stack);

   }
 else if ($_POST['opc2']=='consuestaorisisfuat') 
   {
 
        
        //$filestring = file_get_contents('http://172.30.31.13/econtratosis/swCTSIS.asmx/getsisVB?s_numero=74332034&s_tipobus=DNI&s_usuario=A&s_modulo=A',true);
      $filestring = file_get_contents('http://172.30.31.13/econtratosis/swCTSIS.asmx/getsisVB?s_numero='.$_POST['cade1'].'&s_tipobus=DNI&s_usuario=""&s_modulo=""',true);
      $filearray = explode("\n", $filestring);
      $stack = array();
      foreach ($filearray as $valor) 
        { 
              array_push($stack,trim($valor));
        } 

         
      echo json_encode($stack);

   }
else if ($_POST['opc2']=='consuapofuat') 
   {
   
        $filestring = file_get_contents('http://172.30.31.13/datasis/consultareniec.asmx/consulta_reniec_dni?ls_numerodni='.$_POST['cade1'],true);
        $filearray = explode("\n", $filestring);
        $stack = array();
        //$myObj = new stdClass();
        foreach ($filearray as $valor) 
         { 
               array_push($stack,trim($valor));
               //  $myObj->name = trim($valor);
            
         } 

        echo json_encode($stack);

   }


 else if ($_POST['opc2']=='consuverisolicita') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuverisolicita');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
  
  else if ($_POST['opc2']=='consudepa') 
   {
       $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consudepa');
       if($arraydiagfuat)
             {
                  foreach ($arraydiagfuat as $datadiagfuat):
                     //$data[]= array_map('utf8_encode', $datatrabafic);
                     $data[]= array_map('utf8_encode', $datadiagfuat);

                  endforeach; 
                  
             }
          echo json_encode($data);   
      
   }
  else if ($_POST['opc2']=='consuprov') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuprov');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
  else if ($_POST['opc2']=='consudistri') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consudistri');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }

   
  else if ($_POST['opc2']=='consupais') 
  {
      $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consupais');
      if($arraydiagfuat)
            {
                 foreach ($arraydiagfuat as $datadiagfuat):
                    //$data[]= array_map('utf8_encode', $datatrabafic);
                    $data[]= array_map('utf8_encode', $datadiagfuat);

                 endforeach; 
                 
            }
         echo json_encode($data);   
     
  }
   else if ($_POST['opc2']=='consuestaori') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuestaori');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
  else if ($_POST['opc2']=='consuini') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuini');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
  else if ($_POST['opc2']=='consufechanacifuat') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consufechanacifuat');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
   else if ($_POST['opc2']=='consuedadpacifuat') 
   {
     $arraydiagfuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuedadpacifuat');
     if($arraydiagfuat)
           {
                foreach ($arraydiagfuat as $datadiagfuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $datadiagfuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
   else if ($_POST['opc2']=='consuservifuat') 
   {
     $arrayservifuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuservifuat');
     if($arrayservifuat)
           {
                foreach ($arrayservifuat as $dataservifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataservifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
  else if ($_POST['opc2']=='consucupofuat') 
   {
     $arrayservifuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consucupofuat');
     if($arrayservifuat)
           {
                foreach ($arrayservifuat as $dataservifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataservifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }  
   else if ($_POST['opc2']=='consumodafuat') 
   {
     $arrayservifuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consumodafuat');
     if($arrayservifuat)
           {
                foreach ($arrayservifuat as $dataservifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataservifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }  
  else if ($_POST['opc2']=='consudnifuat') 
   {
     $arrayconsudnifuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consudnifuat');
     if($arrayconsudnifuat)
           {
                foreach ($arrayconsudnifuat as $dataconsudnifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataconsudnifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }  

 else if ($_POST['opc2']=='aceptafuat') 
   {
     $arrayservifuat = $clsnegocio->faceptafuat($_POST['codi'],$_POST['opcacepta'],$_POST['obs']);
     if($arrayservifuat)
           {
                foreach ($arrayservifuat as $dataservifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataservifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   }

   else if ($_POST['opc2']=='consumediservifuat') 
   {
     $arrayconsumediservifuat = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consumediservifuat');
     if($arrayconsumediservifuat)
           {
                foreach ($arrayconsumediservifuat as $dataconsumediservifuat):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataconsumediservifuat);

                endforeach; 
                
           }
        echo json_encode($data);   
   } 
   


  else if ($_POST['opc2']=='transafuat') 
    {
/*
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "archivo/".$_FILES['file']['name'])) {
        //more code here...
        //echo "images/".$_FILES['file']['name'];
    } else {
        //echo 0;
    }
*/
 
 
      $arraytransafic = $clsnegocio->ftransafic($_POST['codifuat'], $_POST['usuemifuat'], $_POST['nomipressfuat'], $_POST['fechasolifuat'], $_POST['soliservifuat'], $_POST['horasolifuat']
      , $_POST['datospacifuat'], $_POST['apematpacifuat'], $_POST['codiservifuat'], $_POST['dnipacifuat'], $_POST['codijefeinmefic'], $_POST['codijefesupefic'], $_POST['puestosupefic'] 
      , $_POST['otrosdocufuat'], $_POST['edadpacifuat']
      , $_POST['desccasofuat']
      , $_POST['fun4fic'], $_POST['fun5fic']
      , $_POST['moticonsufuat'], $_POST['nomipressconsufuat'], $_POST['codiipressconsufuat'] 
      , $_POST['codidiag1fuat'], $_POST['coordiexterfic'], $_POST['horatelefuat'], $_POST['fechatelefuat'], $_POST['sexofuat'], $_POST['resusolifuat']
      
      , $_POST['ofipowerfic'], $_POST['ofiotrosfic']    
      
      , $_POST['inglesfic'], $_POST['otrosfic']
      //, $_POST['dniapepatmatnomapofuat']
      , $_POST['ofiotrosobsfic'], $_POST['otrosobsfic']
      , $_POST['secunfic'], $_POST['auxific'], $_POST['tecnisupefic'], $_POST['opctecnisupefic'], $_POST['unific'], $_POST['opcunific'], $_POST['maesfic'], $_POST['opcmaesfic'], $_POST['doctofic'], $_POST['opcdoctofic'], $_POST['usuemifuat']
      , $_POST['codidiag2fuat'], $_POST['descdiag2'], $_POST['tipodiag2fuat']
      //, $_POST['tipodocuapofuat'], $_POST['nrodocuapofuat']
      , $_POST['fechanaciapofuat'], $_POST['nomcompleapofuat']
      //, $_POST['apepatapofuat'], $_POST['apematapofuat']
      , $_POST['correoapofuat'], $_POST['teleapofuat'], $_POST['celuapofuat']
      , $_POST['opcfuat']);
      
       if($arraytransafic)
           {
              foreach ($arraytransafic as $datatransafic):
                   $data[]= array_map('utf8_encode', $datatransafic);
          
              endforeach; 
           }
        echo json_encode($data);    
    }

  else if ($_POST['opc2']=='transasuge') 
    {

      $arraytransasuge = $clsnegocio->ftransasuge($_POST['dni'],$_POST['apepatmatnom'], $_POST['tele'], $_POST['correo'], $_POST['suge']);
      
       if($arraytransasuge)
           {
              foreach ($arraytransasuge as $datatransasuge):
                   $data[]= array_map('utf8_encode', $datatransasuge);
              endforeach; 
           }
        echo json_encode($data);    
    }
}



if ($_POST['opc1']=='accesos') 
{
  if ($_POST['opc2']=='consuacce') 
   {
     $arrayacce = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consuacce');
     if($arrayacce)
           {
                foreach ($arrayacce as $dataacce):
                   //$data[]= array_map('utf8_encode', $datatrabafic);
                   $data[]= array_map('utf8_encode', $dataacce);

                endforeach; 
                
           }
        echo json_encode($data);   
   }
  
  else if ($_POST['opc2']=='consutrabaacce') 
    {
      $arraytrabaacce = $clsnegocio->fconsu($_POST['cade1'],$_POST['cade2'],'consutrabaacce');
      if($arraytrabaacce)
           {
              foreach ($arraytrabaacce as $datatrabaacce):
                   $data[]= array_map('utf8_encode', $datatrabaacce);
                endforeach; 
           }
        echo json_encode($data); 

    }
  
  else if ($_POST['opc2']=='transaacce') 
    {

      $arraytransaacce = $clsnegocio->ftransaacce($_POST['coditrabaacce'], $_POST['condiacce'], $_POST['clacorreacce'], $_POST['opcacce']);
      
       if($arraytransaacce)
           {
              foreach ($arraytransaacce as $datatransaacce):
                   $data[]= array_map('utf8_encode', $datatransaacce);
              endforeach; 
           }
        echo json_encode($data);    
    }
  
}



?>