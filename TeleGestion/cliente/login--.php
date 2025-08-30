<?php
//$_SESSION = array();
 

 session_start();
 session_destroy();

 //ini_set('session.gc_maxlifetime', 10800);
 //session_set_cookie_params(10800);

 ini_set('session.gc_maxlifetime', 10800);
 session_set_cookie_params(10800);
 session_start();

 $_SESSION['dni']='';
 $_SESSION['usu']='';
 $_SESSION['cla']='';

 $_SESSION['tipoacce']='';
 $_SESSION['codicole']='';
 $_SESSION['nrorne']='';
 $_SESSION['cargo']='';
 $_SESSION['servicio']='';

$_SESSION['dnipaci']='';
$_SESSION['firma']='';
$_SESSION['menu']='';
$_SESSION['usuacce']='';

header('Content-Type: text/html; charset=ISO-8859-1');
include("../negocio/clsnegocio.php");
$clsnegocio = new clsnegocio;

$pagina="http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];

$dni=null;
$cla=null;
$msg='';

if (isset($_POST["txtdni"]))    
 {
   $dni = $_POST["txtdni"];  
 }

if (isset($_POST["txtcla"]))    
 {
   $cla = $_POST["txtcla"];
 }
  
 
 if (isset($_POST["btaceptar"]))
  {
   
   if (strlen(trim($dni))>0 && strlen(trim($cla))>0 )
     { 
              //session_start();
              
              $Arrayusu=$clsnegocio->fconsu($dni,$cla,'consuini');
              if($Arrayusu)
                {
                  $_SESSION['menu']=$Arrayusu;
                  
                  foreach ($Arrayusu as $datausu):  
                    
                   if ($datausu['valida']=='1') 
                       {
                         $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";  
                       }
                    else if ($datausu['valida']=='2') 
                       {
                         $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
                       }
                    else
                       {
                    
                        $_SESSION['dni']=$datausu['mtr_dni'];
                        $_SESSION['usu']=$datausu['mtr_ncompleto'];
                        $_SESSION['cla']=$datausu['mtr_claveacce'];
                        $_SESSION['tipoacce']=$datausu['mtr_tipoacce'];
                        $_SESSION['codicole']=$datausu['mtr_codcole'];
                        $_SESSION['nrorne']=$datausu['mtr_rne'];
                        $_SESSION['cargo']=$datausu['mca_desccargo'];
                        $_SESSION['servicio']=$datausu['mse_descserv'];

                        $_SESSION['firma']='../cliente/firmas/'.$_SESSION['dni'].'.png';

                        $_SESSION['acepta']='';

                        $_SESSION['usuacce']=$datausu['usuacce'];

                      
                        header("Location:menu.php");
                        exit;
                      }
                  endforeach;
                  
                }
              else 
                {
                  $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
                }  

              $Arrayusu=$clsnegocio->fconsu($dato,$cla,'consuini');
              if($Arrayusu)
                {
                  $_SESSION['menu']=$Arrayusu;
                  
                  foreach ($Arrayusu as $datausu):  
                    
                    if ($datausu['valida']=='1') 
                       {
                        $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
                       }
                    else if ($datausu['valida']=='2') 
                       {
                         $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
                       }
                    else
                       {
                    
                      
                        $_SESSION['dni']=$datausu['mtr_dni'];
                        $_SESSION['usu']=$datausu['mtr_ncompleto'];
                        $_SESSION['cla']=$datausu['mtr_claveacce'];
                        $_SESSION['tipoacce']=$datausu['mtr_tipoacce'];
                        $_SESSION['codicole']=$datausu['mtr_codcole'];
                        $_SESSION['nrorne']=$datausu['mtr_rne'];
                        $_SESSION['cargo']=$datausu['mca_desccargo'];
                        $_SESSION['servicio']=$datausu['mse_descserv'];
                        $_SESSION['usuacce']=$datausu['usuacce'];
                       
                        header("Location:menu.php");
                        exit;
                      }
                  endforeach;
                  
                }
              else 
                {
                  $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
                }  


     
     }
    else 
      {
         $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
      } 
  }
 
?> 


<!DOCTYPE html>
<html>
  <head>  
    <title>Index</title>
    <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../cliente/css/bootstrap.css">
    <link rel="stylesheet" href="../cliente/dataTables.bootstrap.css"> 
    <link rel="stylesheet" href="../cliente/css/AdminLTE.css"> 
    <link rel="stylesheet" href="../cliente/css/_all-skins.css">
 
    <center>
        <br><br><br><br><br><br><br><br><br><br>
        <a href="../ChromeSetup.exe" ><img src="../cliente/images/chrome.gif"> <span class='color-blanco'>descargue e instale el Navegador Chrome actualizado, luego registrar el FUAT desde el Navegador Chrome</span></a> 
    </center>

  </head>
  <body background="../cliente/images/fondo2.jpg">
      <form name="frmindex" id="frmindex"  method="post" enctype="multipart/form-data" action="<?=$pagina?>"  >
            <div class="container-fluid">
              <div class="modal modal-primary fade"  data-backdrop="static" id="modalindex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" >
                  <div class="modal-content" >
                    <div class="modal-header">
                      <br><br><br>
                        <div align="center"> Version 16.08.2022 </div>
                    </div>
                    <div class="modal-body"> 
                      <div class="box-body">

                          <div class="row">
                              <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                             
                                          </div>
                                           <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align='center'>
                                             <br>
                                             <img src="../cliente/images/usuario.gif" width="60" height="60">
                                          </div>
                                        
                                           <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                              <div class="form-group"> 
                                                  <div class="row">  
                                                    <br>
                                                  </div>  
                                                  <div class="row">  
                                                          <div> <label class='col-xs-12 col-sm-1 col-md-1 col-lg-1 control-label' >DNI: </label> </div>
                                                          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                                               <input class= 'col-xs-12 col-sm-6 col-md-4 col-lg-4 form-control' type="text" name="txtdni" id="txtdni"  tabindex="1" autofocus>
                                                          </div>     
                                                  </div>   
                                                  <div class="row">  
                                                          <div> <label class='col-xs-12 col-sm-1 col-md-1 col-lg-1 control-label' >CLAVE: </label> </div>
                                                          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                                                <input class= 'col-xs-12 col-sm-4 col-md-4 col-lg-4 form-control' type="password" name="txtcla" id="txtcla" tabindex="2" >
                                                         </div>     
                                                  </div>    
                                             
                                                  <div class="row">  
                                                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 alerta' id="msg" align="left"> <?php if (isset($msg)){ echo $msg;} ?>  </div> 
                                                  </div>    
                                              </div>
                                             
                                          </div>
                                           <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1'>
                                             
                                          </div>
                              </div>                                  
                          </div>                          
                      </div><!-- /.box-body -->  
                      <div class="box-footer">
                        <div class="form-group"> 
                            <div class="row">  
                                <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                  <div class='col-xs-12 col-sm-3 col-md-2 col-lg-2'>
                                  </div>   
                                  <div class='col-xs-12 col-sm-6 col-md-8 col-lg-8' align="center">
                                     <button type="button" name="btaceptar" id="btaceptar" class="btn btn-primary btn-xs" tabindex="3"><i class="glyphicon glyphicon-ok-sign"></i> Aceptar</button>
                                  </div>
                                  <div class='col-xs-12 col-sm-3 col-md-2 col-lg-2'>
                                  </div>   
                                </div>
                       
                         
                            </div>    
                         
                        </div>
                      </div>    
                    
                      
                  </div>  <!-- /.modal-body -->
                  <div class="modal-footer"> 
                      <div class='row'>
                       
                        <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'>
                             <img src='../cliente/images/folder3.png'> OFICINA DE ESTADISTICA E INFORMATICA (OEI) 
                        </div>
                      
                         <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2' align='center'>
                             <a href='../cliente/Manual de Solicitud de Citas.pdf' class='color-blanco'><img src="../cliente/images/instru.gif">Manual de Usuario</a>
                        </div>

                         <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2' align='center'>
                           <a href="../ChromeSetup.exe" class='color-blanco' ><img src="../cliente/images/chrome.gif"> Descarga de Chrome </a> 
                        </div>   
                         <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'>
                           <img src='../cliente/images/folder3.png'> AREA DE DESARROLLO DE SISTEMAS (ADS) 
                        </div>
                     
                                      
                    
                      </div>
                        
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div> <!-- /.contenedor -->
        </form>
    
            <script src="../cliente/js/jQuery-2.1.4.min.js"></script> 
            <script src="../cliente/js/bootstrap.js"></script> 
            <script src="../cliente/js/jquery.dataTables.js"></script> 
            <script src="../cliente/js/dataTables.bootstrap.js"></script>
            <script src="../cliente/js/jquery.slimscroll.js"></script>
            <script src="../cliente/js/fastclick.js"></script>
            <script src="../cliente/js/app.js"></script>
            <script src="../cliente/js/demo.js"></script>
   

            
            <script src="../cliente/js/jquery.validate.js"></script>
            <script src="../cliente/js/additional-methods.js"></script>


            <script type="text/javascript">
                   $(window).load(function(){
                                             $("#modalindex").modal('show');
                                            });


                    $("#frmindex").ready(function(){
                      // $("#txtcla").hide();
  


                        jQuery.validator.setDefaults({
                            debug: true,
                            success: "valid"
                        });


                        $( "#frmindex" ).validate({
                            rules:  {
                                      txtdni: { required: true, maxlength: 8},
                                      txtcla: { required: true, maxlength: 10}
    
                                    },
                            messages: { 
                                        txtdni: ' ',
                                        txtcla: ' ' 
                                      },

                            submitHandler: function(form) 
                               {
                                  form.submit();



                              }

                        });

                      function consutecla(evento,control1,control2)
                        {
                         if (evento.which == 13 && control1.value.length>0)
                          {
                              control2.focus();
                          }
           
                        }    
             
                        $("#txtdni").keypress(function(e){
                            consutecla(e,$("#txtdni")[0],$("#txtcla")[0]);
                        });      

                        $("#txtcla").keypress(function(e){
                           consutecla(e,$("#txtcla")[0],$("#btaceptar")[0]);
                        });      


                        $("#btaceptar").click(function() {  
                         //   $("#txtcla").prop("value",$("#txtcla2").prop("value"));         
                
                            $("#btaceptar").prop("type","submit");
                            $("#btaceptar").submit();                 
                        });

                    });

            </script>

      </body>
</html>
