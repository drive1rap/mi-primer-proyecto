<?php
//$_SESSION = array();
 
/*
 session_start();
 session_destroy();
*/
 //ini_set('session.gc_maxlifetime', 10800);
 //session_set_cookie_params(10800);
/*
 ini_set('session.gc_maxlifetime', 10800);
 session_set_cookie_params(10800);
 */
 session_start();

 
header('Content-Type: text/html; charset=ISO-8859-1');
include("../negocio/clsnegocio.php");
$clsnegocio = new clsnegocio;

$pagina="http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];

$dni=null;
$apepatmatnom=null;
$suge=null;
$msg='';

if (isset($_POST["txtdni"]))    
 {
   $dni = $_POST["txtdni"];  
 }

 if (isset($_POST["txtapepatmatnom"]))    
 {
   $apepatmatnom = $_POST["txtapepatmatnom"];  
 }


if (isset($_POST["textsuge"]))    
 {
   $suge = $_POST["textsuge"];
 }
  
 
 if (isset($_POST["btaceptar"]))
  {
   
   if (strlen(trim($dni))>0 && strlen(trim($suge))>0  && strlen(trim($txtapepatmatnom))>0 )
     { 
              //session_start();
              
              $Arrayusu=$clsnegocio->fconsu($dni,$suge,'consuini');
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

                      
                        header("Location:menu.php");
                        exit;
                      }
                  endforeach;
                  
                }
              else 
                {
                  $msg="Ingrese Correctamente el Dni y/o Clave, Verifique ...";
                }  

              $Arrayusu=$clsnegocio->fconsu($dato,$suge,'consuini');
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
 
  </head>
  <body background="../cliente/images/fondo2.jpg">
      <form name="frmsuge" id="frmsuge"  method="post" enctype="multipart/form-data" action="<?=$pagina?>"  >
            <div class="container-fluid">
              <div class="modal modal-primary fade"  data-backdrop="static" id="modalindex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" >
                  <div class="modal-content" >
                    <div class="modal-header">
                        <br><br>
                        <div class='col-md-6' align='left'> <img src='../cliente/images/sugerencias.gif'>&nbsp;&nbsp;&nbsp;Sugerencias </div>
                        <br><br>
                    </div>
                    <div class="modal-body"> 
                      <div class="box-body">

                          <div class="row">
                              <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>

                                         
                                          
                                        
                                            <div class='col-xs-12 col-sm-11 col-md-11 col-lg-11'>
                                              <div class="form-group"> 
                                                  
                                                  <div class="row">  
                                                          <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' >DNI: </label> </div>
                                                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                               <input class= 'col-xs-12 col-sm-1 col-md-1 col-lg-1 form-control' type="text" name="txtdni" id="txtdni"  tabindex="1" autofocus>
                                                          </div>   
                                                          <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1'>  
                                                            <button type='button' name='btconsu' id='btconsu' class='col-xs-12 col-sm-1 col-md-1 col-lg-1 btn btn-primary btn-xs' tabindex='22'><i class='fa fa-search'></i> Consultar</button>
                                                          </div>   
                                                           <div class='col-xs-12 col-sm-9 col-md-9 col-lg-9'>
                                                               <input class= 'col-xs-12 col-sm-9 col-md-9 col-lg-9 form-control' type="text" name="txtapepatmatnom" id="txtapepatmatnom" readonly="true" tabindex="-1">
                                                          </div>
                                                  </div> 
                                                  <div class="row">  
                                                          <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' >Telefono y/o Celular: </label> </div>
                                                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                                <input class= 'col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' type="text" name="txttele" id="txttele"  tabindex="1">
                                                         </div>     
                                                  </div> 
                                                  <div class="row">  
                                                          <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' >Correo: </label> </div>
                                                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                <input class= 'col-xs-12 col-sm-1 col-md-1 col-lg-1 form-control' type="text" name="txtcorreo" id="txtcorreo"  tabindex="2">
                                                         </div>     
                                                  </div>    
                                                  <div class="row">  
                                                          <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' >Escriba su sugerencia: </label> </div>
                                                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                <textarea class= 'col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' name="textsuge" id="textsuge"  rows="3" tabindex="3" maxlength="2000" >
                                                                </textarea>
                                                         </div>     
                                                  </div>    
                                                  <br>
                                                  <div class="row">  
                                                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 alerta' id="msg" align="center">
                                                      
                                                       <!-- <?php if (isset($msg)){ echo $msg;} ?>--> 
                                                     </div> 
                                                  </div>    
                                              </div>
                                             
                                            </div>
                                           
                              </div>                                  
                          </div>                          
                      </div><!-- /.box-body -->  
                      <div class="box-footer">
                        <div class="form-group"> 
                            <div class="row">  
                                <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                  <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5'>
                                  </div>   
                                  <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align="center">
                                     <button type="button" name="btaceptar" id="btaceptar" class="btn btn-primary btn-xs" tabindex="3"><i class="glyphicon glyphicon-ok-sign"></i> Aceptar</button>
                                  </div>
                                  <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align="center">
                                     <button type="button" name="btcance" id="btcance" class="btn btn-primary btn-xs" tabindex="3"><i class="glyphicon glyphicon-repeat"></i> Cancelar</button>
                                  </div>
                                  <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5'>
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
                         <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'>
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
                   $(window).load(function()
                      {
                        $("#modalindex").modal('show');
                      });


                    $("#frmsuge").ready(function(){
                      // $("#textsuge").hide();
                       var tope=0;
                       var intervalo;

                       
                        jQuery.validator.setDefaults({
                            debug: true,
                            success: "valid"
                        });


                        $( "#frmsuge" ).validate({
                            rules:  {
                                      txtdni: { required: true, maxlength: 8},
                                      txtapepatmatnom: { required: true, maxlength: 100},
                                      txttele: { required: true, maxlength: 10},
                                      textsuge: { required: true, maxlength: 2000}

    
                                    },
                            messages: { 
                                        txtdni: ' ',
                                        txtapepatmatnom: ' ',
                                        txttele: ' ',
                                        textsuge: ' ' 
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
                            consutecla(e,$("#txtdni")[0],$("#textsuge")[0]);
                        });      

                        $("#txttele").keypress(function(e){
                            consutecla(e,$("#txttele")[0],$("#txtcorreo")[0]);
                        });   
                        $("#txtcorreo").keypress(function(e){
                            consutecla(e,$("#txtcorreo")[0],$("#textsuge")[0]);
                        });    

                        $("#textsuge").keypress(function(e){
                           consutecla(e,$("#textsuge")[0],$("#btaceptar")[0]);
                        }); 


                      function mensaje() 
                       {
                         if (tope==1) 
                           {
                               clearInterval(intervalo); //para la el tiempo ejecutado
                               window.location.href='../cliente/index.php';    
                           }
                         else if (tope>=6 && tope<=8) 
                         {
                              $("#msg").html("Registro Grabado Correctamente.");  
                         }
                         else if (tope>=2 && tope<=5) 
                           {
                             $("#msg").html("la ventana se cerrara en : "+"[" + tope +"]");   
                         }

                         tope=tope - 1;

                       }     


                        $("#btaceptar").click(function() {  
                          var dni="";
                          var apepatmatnom="";
                          var tele="";
                          var correo="";
                          var suge="";
                          dni=$("#txtdni").prop("value").trim().toUpperCase()
                          $("#txtdni").prop("value",dni);

                          apepatmatnom = $("#txtapepatmatnom").prop("value").trim().toUpperCase();
                          $("#txtapepatmatnom").prop("value",apepatmatnom);

                          tele = $("#txttele").prop("value").trim().toUpperCase();
                          $("#txttele").prop("value",tele);

                          correo = $("#txtcorreo").prop("value").trim().toUpperCase();
                          $("#txtcorreo").prop("value",correo);

                          suge=$("#textsuge").prop("value").trim().toUpperCase()
                          $("#textsuge").prop("value",suge);


                          if ($("#frmsuge").valid())
                            { 
                                /*$("#btaceptar").prop("type","submit");
                                $("#btaceptar").submit();   */               
                                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ dni:dni,
                                 apepatmatnom:apepatmatnom, tele:tele, correo:correo, suge:suge
                                 , opc1:'fuat', opc2:'transasuge'}, type : 'POST',dataType : 'json',success : function(data)  
                                
                                { },
                                error : function(xhr, status) {  },
                                complete : function(xhr, status) { }
                              }); 
                           

                              $("#txtdni").prop("disabled",true);
                              $("#txtapepatmatnom").prop("disabled",true);
                              $("#txttele").prop("disabled",true)
                              $("#txtcorreo").prop("disabled",true)
                              $("#textsuge").prop("disabled",true);

                              $("#btaceptar").prop("disabled",true);
                              $("#btcance").prop("disabled",true);

                             //  $("#btaceptar").prop("value","Salir");
                             //  document.frmsuge.submit();     
                             //intervalo();
                             tope=8;
                             intervalo=setInterval(mensaje,1000); //cada segundo se ejecuta

                              

                            }
                            else
                            {
                              $("#msg").html("Ingrese Correctamente los Datos ...!");                               
                            }
                        });





                         $("#btcance").click(function() {  
                         //   $("#textsuge").prop("value",$("#textsuge2").prop("value"));         
                
                            window.location.href='../cliente/index.php';               
                        });

                        $('#btconsu').click(function() {  
                         // alert($('#txtdni').prop('value').trim());

                           $('#btconsu').find('i').toggleClass('fa-refresh fa-spin').toggleClass('fa-search');

                           if ($('#txtdni').prop('value').length>0)
                           {
                              // consulta de datos del paciente con filtro del dni y fecha de nacimiento
                                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtdni').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consupacifuat'}, type : 'POST',dataType : 'json',success : function(data)
                                  {  
                                      $.each(data, function(i){
                                        apepatpaci=data[3].replace('<\/string>',"").replace('<string>',"");
                                        apematpaci=data[4].replace('<\/string>',"").replace('<string>',"");
                                        nompaci=data[5].replace('<\/string>',"").replace('<string>',"");
                                        $('#txtapepatmatnom').prop('value',apepatpaci+' '+apematpaci+', '+nompaci)
                                      
 
                                      });
                                  },
                                  error : function(xhr, status) {},
                                  complete : function(xhr, status) {}
                                });



                           }

                        });




                    });

            </script>

      </body>
</html>
