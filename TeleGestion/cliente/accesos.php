<?php
  //header("Content-type: application/json; charset=utf-8");
  //header('Content-Type: text/html; charset=utf-8');
  header('Content-Type: text/html; charset=ISO-8859-1');
  session_start();
  
  if ($_SESSION['usu']=='') 
   {
  ?>
   <script type='text/javascript'>
        alert("Se enviara al Inicio Por Seguridad y/o tiempo de demora en crear el Registro");
    </script>
<?php
     header('Location:login.php'); 
     exit;
   }


   $pagina='http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
   include('../negocio/clsnegocio.php');
   $clsnegocio = new clsnegocio;
   $fnavegador=$clsnegocio->fnavegador();


   if (isset($_POST['cboconsutraba'])) //consulta de registro
    {
      $cadena1 = trim($_POST['cboconsutraba']);
    }
  else
    {
      $cadena1 = 'A';
    }

    $arrayacce = $clsnegocio->fconsu($cadena1,'','consuacce');
   
?>
 

<!DOCTYPE html>
<html>
<head>
    
    
    <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FORMATO UNICO DE ATENCION DE TELEORIENTACION Y TELEMONITOREO</title>
  
    <link href='../cliente/css/bootstrap.css' rel='stylesheet'>
    <link href='../cliente/css/dataTables.bootstrap.css' rel='stylesheet' >
    <link href="../cliente/css/font-awesome.css" rel="stylesheet">
    <link href="../cliente/css/animate.min.css" rel="stylesheet">
    <link href="../cliente/css/prettyPhoto.css" rel="stylesheet">
    <link href="../cliente/css/main.css" rel="stylesheet">
    <link href="../cliente/css/responsive.css" rel="stylesheet">
    <link href='../cliente/css/AdminLTE.css' rel='stylesheet'>      

    
    <link rel='stylesheet' href='../cliente/css/bootstrap-switch.css'>

    <link href='../cliente/images/insn.ico' rel='shortcut icon'>



  
</head>

<body class='homepage' background='../cliente/images/logo.jpg'>
  <header id="header">
        

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href='../cliente/menu.php'><img src="images/logo.png" alt="logo"></a>
                </div>
                 
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        
                        
                        <li class='dropdown'>
                           <?php
                                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>  <img src='../cliente/images/mantenimiento.gif'>  MANTENIMIENTO <i class='fa fa-angle-down'></i></a>";
                            ?>
                            
                            <ul class='dropdown-menu'>
                                <?php
                                

                                    foreach ($_SESSION['menu'] as $datamenu):  

                                      if ($datamenu['mtr_tipoacce']=='1')
                                        {
                                          echo "<li><a href='../cliente/accesos.php'><img src='../cliente/images/beneficiarios.gif'> ACCESOS </a></li>";
                                        }
                                    
                                    endforeach;
                                  
                                ?>

                                <li><a href='../cliente/login.php'> <img src='../cliente/images/salir.gif'> CERRAR SESSION </a></li>
                               
                            </ul>
                       </li>
                        <li class='dropdown'>
                            <?php
                                echo "<a href='#'' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/movimiento.gif'> MOVIMIENTO <i class='fa fa-angle-down'></i></a>";
                            ?>

                            <ul class='dropdown-menu'>
                                <?php

                                       foreach ($_SESSION['menu'] as $datamenu):  
                                        if ($datamenu['mtr_tipoacce']=='1' || $datamenu['mtr_tipoacce']=='2')
                                        {
                                          echo "<li><a href='../cliente/index.php'><img src='../cliente/images/beneficiarios.gif'> </i> SOLICITUD DE CITA</a></li>";  
                                          //  echo "<li><a href='../cliente/info_consofuat.php'><img src='../cliente/images/beneficiarios.gif'> </i> Informe</a></li>";  
                                            echo "<li><a href='#' id='listasoli'> <img src='../cliente/images/beneficiarios.gif'> LISTA CITA</a> </li>";  
  
                                            echo "<li><a href='#' id='listasuge'> <img src='../cliente/images/beneficiarios.gif'> LISTA DE SUGERENCIAS</a> </li>";  
  
                                            echo "<li><a href='#' id='listausu'> <img src='../cliente/images/beneficiarios.gif'> LISTA CITA POR USUARIO</a> </li>";  

                                            echo "<li><a href='#' id='listaprov'> <img src='../cliente/images/beneficiarios.gif'> LISTA CITA POR PROVINCIA</a> </li>";  
  
                                            echo "<li><a href='#' id='consousu'> <img src='../cliente/images/beneficiarios.gif'> CONSOL. POR USUARIO</a> </li>";  
  
                                            echo "<li><a href='#' id='consousudia'> <img src='../cliente/images/beneficiarios.gif'> CONSOL. POR DIA/USUARIO</a> </li>";  
                                        
                                        }
                                        else
                                        {
                                          echo "<li><a href='../cliente/index.php'><img src='../cliente/images/beneficiarios.gif'> SOLICITUD DE CITA</a></li>";  
                                        }
                                        

                                    endforeach;
                                ?>
                            </ul>
                        </li>

                        <li class='dropdown'>
                            <?php
                                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/utilitario.gif'> AYUDA</a>";
                            ?>
                            <ul class='dropdown-menu'>
                                  <li><a href='../cliente/Manual de Solicitud de Citas.pdf'><img src="../cliente/images/instru.gif">MANUAL DE USUARIO</a></li>
                            </ul>
                        </li>
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/usuario.gif'> <?php echo $_SESSION['usu']; ?>  </a>
                        </li>
                        <li class='active' ><a href='../cliente/login.php'> <img src='../cliente/images/salir.gif'> CERRAR SESSION </a></li>
                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->



  
    <section>
        <div class='container'>
            <div class='row'>
             <div class='col-md-12'>
              <form name='frmaccesos' id='frmaccesos'  method='post' autocomplete='off' enctype='multipart/form-data' action='<?=$pagina?>'>
                  <div class='panel-primary'>
                    <div class='panel-heading'>
                        <div class='row'> </div>
                        <br><br><br><br>
                        <div class='row' align='center'><img src='../cliente/images/beneficiarios.gif'>Accesos</div>
                    </div>
                    <div class='panel-body'>
                      
                        <div class='form-group'>
                            <div class='row'  align='right'>   
                                <div class='col-md-12'> 
                                    <fieldset class='marco2'>
                                        <div > <label class='col-md-3 control-label'>Busca:</label> </div>
                                        <div class='col-md-7'>

                                                <select class='col-md-7 form-control' name='cboconsutraba' id='cboconsutraba' tabindex='-1' >
                                                        <option value='A' selected='true'> A
                                                        <option value='B'> B
                                                        <option value='C'> C
                                                        <option value='D'> D
                                                        <option value='E'> E
                                                        <option value='F'> F
                                                        <option value='G'> G
                                                        <option value='H'> H
                                                        <option value='I'> I
                                                        <option value='J'> J
                                                        <option value='K'> K
                                                        <option value='L'> L
                                                        <option value='M'> M
                                                        <option value='N'> N
                                                        <option value=&Ntilde;> &Ntilde;
                                                        <option value='O'> O
                                                        <option value='P'> P
                                                        <option value='Q'> Q
                                                        <option value='R'> R
                                                        <option value='S'> S
                                                        <option value='T'> T
                                                        <option value='U'> U
                                                        <option value='V'> V
                                                        <option value='W'> W
                                                        <option value='X'> X
                                                        <option value='Y'> Y
                                                        <option value='Z'> Z
                                                </select>
                                        </div>
                                        <button class='col-md-2 btn btn-primary btn-xs' type='button' name='btconsutraba' id='btconsutraba'  tabindex='-1'><i class='glyphicon glyphicon-search'></i></button>  
                                        
                                    </fieldset>
                                </div>  
                            </div>
                        </div>
                    

                        <div class='form-group'>
                             <div class='table-responsive'>
                                <table id='tablaacce' class='table table-bordered table-striped table-hover'>
                                    <thead>
                                        <tr class='primary'>
                                            <th>Dni</th>
                                            <th>Apellidos_y_Nombres(s)</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Cargo</th>
                                            <th>Condicion</th>
                                            <th>Clave</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        if ($arrayacce)
                                        {

                                          foreach ($arrayacce as $dataacce): ?>
                                         <tr>
                                           <td> <?php echo $dataacce['mtr_dni']; ?> </td>
                                           <td> <?php echo $dataacce['mtr_ncompleto']; ?> </td>
                                           <td> <?php echo $dataacce['mtr_fechanaci']; ?> </td>
                                           <td> <?php echo $dataacce['mca_desccargo']; ?> </td>
                                           <td> <?php echo $dataacce['mtr_tipoacce']; ?> </td>
                                           <td> <?php echo $dataacce['mtr_claveacce']; ?> </td>
                                        </tr>
                                          <?php endforeach;
                                             }
                                          ?>
                                            
                                   </tbody>
                                   <tfoot>
                                     
                                   </tfoot>
                               </table>
                             </div>
                        
                        </div> <!-- final form-group -->


                        <div class='form-group'>
                            <div class='modal modal-primary fade' data-backdrop='static' id='modalacce' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>


                                 <div class='modal-dialog'>
                                      <div class='modal-content'>
                                           <div class='modal-header'>
                                                <!--<button class='close' data-dismiss='modal' aria-label='Close' tabindex='-1'><span aria-hidden='false'>&times;</span> </button>-->
                                                <div class='row'> </div>
                                                <br><br>
                                                <div class='row'> 
                                                    <div id='divtituacce'> </div>
                                                </div> 
                                           </div>
                                            <div class='modal-body'> 
                                                <div class='box-body'>
                                                    <div class='form-group'>
                                                      <div class='row'>    
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                          
                                                                
                                                        <div class='row'>  
                                                                    <div> <label class='col-md-3 control-label'>Trabajador:</label> </div>
                                                                    <div class='col-md-9'>
                                                                       <fieldset class='marco5 table-responsive'>
                                                                          <legend align='center'>Trabajador</legend> 
                                                                          <div class='col-md-12'> 
                                                                            <div class='row'> 
                                                                              <select class='col-md-12 form-control' name='cbotrabaacce' id='cbotrabaacce' tabindex='-1' >
                                                                                 <option value='' selected='true'>
                                                                              </select>
                                                                            </div> 
                                                                            <div id='detatrabaacce'></div> 
                                                                            <input type='hidden' class='form-control' name='txtopcacce' id='txtopcacce'  tabindex='-1' readonly>
                                                                            <input type='hidden' class='form-control' name='txtfechaimpre' id='txtfechaimpre'  tabindex='-1' readonly>
                                                                          </div> 
                                                                      </fieldset> 
                                                                    </div>


                                                        </div>

                                                        <br>
                                                        
                                                        <div class='row'>    
                                                              <div> <label class='col-md-3 control-label'>Condicion:</label> </div>
                                                              <div class='col-md-2'>
                                                                  <select class='col-md-2 form-control' name='cbocondiacce' id='cbocondiacce' tabindex='1' >
                                                                        <option value='' selected='true'>Ninguno
                                                                        <option value='1'>Administrador
                                                                        <option value='2'>Usuario
                                                                        
                                                                        
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        <div class='row'>    
                                                              <div> <label class='col-md-3 control-label'>Clave:</label> </div>
                                                              <div class='col-md-2'>
                                                                  <input type='text' class='col-md-2 form-control' name='txtclacorreacce' id='txtclacorreacce'  tabindex='2'>
                                                              </div>
                                                        </div> 
                                                      
                                                      </div> 
                                                   </div> 
                                                                                                                        
                                                  </div>    
                                                </div><!-- /.box-body -->

                                                

                                                
                                                 <div class='box-footer'>
                                                    <div class='form-group'> 
                                                      <div class='row'>  
                                                         <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                           
                                                           
                                                            <div class='col-xs-12 col-sm-4 col-md-5 col-lg-5'>  
                                                            </div>  
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>  
                                                                            <button type='button' name='btaceptaracce' id='btaceptaracce' class='btn btn-primary btn-xs' tabindex='44'><i class='glyphicon glyphicon-floppy-disk'></i> Grabar</button>
                                                            </div>  
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>  
                                                                            <button type='button' name='btcanceacce' id='btcanceacce' class='btn btn-primary btn-xs'
                                                                             data-dismiss='modal' tabindex='45'><i class='glyphicon glyphicon glyphicon-repeat'></i> Cancelar</button>
                                                            </div>
                                                            <div class='col-xs-12 col-sm-4 col-md-5 col-lg-5'>  
                                                            </div>  
                                                           
                                                        </div>

                                                      </div>    
                                                    </div>
                                                </div>
                                               
                                           </div>  <!-- /.modal-body -->
                                          
                                          <div class='modal-footer'>
                                            <div class='row'>
                                                <div class='col-xs-12 col-sm-4 col-md-5 col-lg-5 color-blanco'  align='center'>
                                                  <img src='../cliente/images/folder3.png'> OFICINA DE ESTADISTICA E INFORMATICA (OEI) 
                                                </div>
                                                <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div id='divteclaacce'>  </div>  </div> 
                                                <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div>[ ESC ]</div> <div> CANCELAR </div> </div> 
                                                <div class='col-xs-12 col-sm-4 col-md-5 col-lg-5 color-blanco' align='center'>
                                                  <img src='../cliente/images/folder3.png'> AREA DE DESARROLLO DE SISTEMAS (ADS) 
                                                </div>
                                            </div>
                                          </div>
                                          
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        
                        </div><!-- /. fin form-group -->

                        
                        
                        <div class='form-group'> 
                            <div class='row'>  
                                
                                <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                      <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5'>
                                      </div>
                                      <!--
                                      <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>
                                       <button type='button' name='btingreacce' id='btingreacce' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-file'></i> Nuevo</button> 
                                      </div>
                                    -->
                                      <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2' align='center'>
                                        <button type='button' name='btactuacce' id='btactuacce' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-edit'></i> Editar</button>
                                        <!--    <button type='button' name='btelific' id='btelific' class='btn btn-primary btn-xs' tabindex='13'><i class='glyphicon glyphicon-remove-sign'></i> Eliminar</button>
                                        <button type='button' name='btimprefuat' id='btimprefuat' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-print'></i> Impresion</button>
                                        -->
                                      </div>
                                      <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5'>
                                      </div>
                                </div>    
                                
                            </div>    
                        </div>
                      
                      
                    </div> <!-- final panel body -->
                    <div class='panel-footer'>
                        <div class='row'>
                           <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5 color-blanco' align='center'> <img src='../cliente/images/folder3.png'> OFICINA DE ESTADISTICA E INFORMATICA (OEI) </div>
                           
                           <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div>[ CTRL + F2 ]</div> <div> EDITAR </div> </div> 
                           
                           <div class='col-xs-12 col-sm-5 col-md-5 col-lg-5 color-blanco' align='center'> <img src='../cliente/images/folder3.png'> AREA DE DESARROLLO DE SISTEMAS (ADS) </div>
                        </div>
                        <br>
                            

                    </div>
                 </div> <!--/. fin panel primary-->       
              </form> <!--/. fin form-->       
            </div> <!--/.col-->    
          </div> <!--/. row -->    
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->

<!--
   <footer id='footer' class='midnight-blue'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12' align='center'>
                    &copy; 2020 <a target='_blank'  ></a>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
-->
        <script src='../cliente/js/jQuery-2.1.4.min.js'></script> 
        <script src='../cliente/js/bootstrap.js'></script> 

        <script src='../cliente/js/jquery.dataTables.js'></script> 
        <script src='../cliente/js/dataTables.bootstrap.js'></script>
        <script src='../cliente/js/jquery.slimscroll.js'></script>
        <script src='../cliente/js/fastclick.js'></script>
        <script src='../cliente/js/app.js'></script>
        <script src='../cliente/js/demo.js'></script>
   
             <script src='../cliente/js/jquery.validate.js'></script>
        <script src='../cliente/js/additional-methods.js'></script>

        <script src='../cliente/js/highlight.js'></script>
        <script src='../cliente/js/bootstrap-switch.js'></script>
        <script src='../cliente/js/main.js'></script>
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>


        <script type='text/javascript'>
           $('#frmaccesos').ready(function(){

                 var fec = new Date();
                 var dia = fec.getDate();
                 dia = dia < 10 ? '0'+ dia : dia;
                 var mes = parseInt(fec.getMonth())+1
                 mes = mes < 10 ? '0'+ mes : mes;
                 var anno = fec.getFullYear();
                 var hor = fec.getHours();
                 hor = hor < 10 ? '0'+ hor : hor;
                 var min = fec.getMinutes();
                 min = min < 10 ? '0'+ min : min;
                 var seg = hor < 12 ? fec.getSeconds()+' am' : fec.getSeconds()+' pm' ; 
                 var fecha = dia +'/'+ mes +'/'+ anno;
                 var hora = hor+':'+min+':'+seg

                 $(document.body).on('keydown',this,function(event){

             
                          if ((event.keyCode == 13 && document.activeElement.value==undefined) || event.keyCode == 116 || event.keyCode == 505 )
                           {
                              return false;
                           }
                          else if (event.altKey || event.ctrlkey)
                            {
                              return false;
                            }
                          else if (event.keyCode == 8 && document.activeElement.value==undefined)
                          {
                              return false;  
                                
                          }
                          else if (event.ctrlKey == true && event.keyCode == 119) //grabar,actualizar,eliminar (CTRL + F8)
                          {
                              if($('#btaceptaracce'))
                              {
                                 $('#btaceptaracce').click();  
                              }
                              
                          }
                       
                          else if (event.ctrlKey == true && event.keyCode == 113) //editar (CTRL + F2)
                          {
                              if($('#btactuacce'))
                              {
                                 $('#btactuacce').click();  
                              }
                              
                          }
                       
                          else if (event.keyCode == 27) //escape (esc)
                          {
                              if($('#btcanceacce'))
                              {
                                 $('#btcanceacce').click();  
                              }
                              
                          }
                });

                function deshabilitar()
                  { 
                    return false; 
                  } 
                document.oncontextmenu=deshabilitar; 


                $('#fecha').html('Fecha: '+fecha);



                $(function () {
                   $('#tablaacce').DataTable();
                   $('#example2').DataTable({
                     'paging': true,
                     'lengthChange': false,
                     'searching': false,
                     'ordering': true,
                     'info': true,
                     'autoWidth': false
                   });
                }); 

                jQuery.validator.setDefaults({
                   debug: true,
                   success: 'valid'
                });
                $('#frmaccesos').validate({
                    rules:  {
                              cbotrabaacce: {required:true}
                              
                            },
                  messages: { 
                              cbotrabaacce: 'Seleccione_Correctamente_al_Trabajador.'
                              
                            }

                });

                function consutecla(evento,control1,control2)
                  {
                    if (evento.which == 13 && control1.value.length>0)
                      {
                              control2.focus();
                      }
           
                  }    
             
                  $("#cbocondiacce").keypress(function(e){
                      consutecla(e,$("#cbocondiacce")[0],$("#txtcorreacce")[0]);
                  });      

                  $("#txtcorreacce").keypress(function(e){
                      consutecla(e,$("#txtcorreacce")[0],$("#txtclacorreacce")[0]);
                  });      
                  $("#txtclacorreacce").keypress(function(e){
                      consutecla(e,$("#txtclacorreacce")[0],$("#btaceptaracce")[0]);
                  });      


           //combos
      
            $('#cbotrabaacce').focus(function () {
                $('#detatrabaacce').html('');
                cadena1='';
                cadena2='';
                
                $('#cbotrabaacce').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'accesos', opc2 : 'consutrabaacce'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cbotrabaacce').append("<option value="+data[i].mtr_dni+">" + data[i].mtr_ncompleto +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });       

             $('#cbotrabaacce').change(function () {
                $('#detatrabaacce').html('');
                cadena1='';
                cadena2='';
                cadena1=$('#cbotrabaacce').prop('value').trim();
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'accesos', opc2 : 'consutrabaacce'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                            valor = "<div class='row color-azul'>  <label class='control-label'>Dni:</label>"+"  <span class='color-rojo'>"+ data[i].mtr_dni+"</span></div>";
                            valor = valor +"<div class='row color-azul'>  <label class='control-label'>Apellidos_Nombres(s):</label>"+"  <span class='color-rojo'>"+data[i].mtr_ncompleto+"</span></div>";
                            valor = valor +"<div class='row color-azul'>  <label class='control-label'>Fecha_Nacimiento:</label>"+"  <span class='color-rojo'>"+data[i].mtr_fechanaci+"</span></div>";
                            valor = valor +"<div class='row color-azul'>  <label class='control-label'>Cargo:</label>"+" <span class='color-rojo'>"+data[i].mca_desccargo+"</span></div>";
                            
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
                $('#detatrabaacce').html(valor);
            });                 


               //botones
             $('#listasoli').click(function() {  
                     <?php
                       if ($_SESSION['usu']=='')
                         {
                     ?>
                          alert("No tiene Acceso para la Impresion, Verifique ...");
                     <?php
                         }
                         else
                         {
                     ?>
                             var fechainfo;
                             fechainfo=prompt('Ingrese la fecha [ dia/mes/a\361o dia/mes/a\361o ]:');
                             if(fechainfo.trim().length>0)
                              {
                                $('#txtfechaimpre').prop('value',fechainfo);
                                $('#frmaccesos').prop('action','../cliente/info_listasolicita.php');
                                document.frmaccesos.submit();     
                              }

                      <?php
                        }                      
                      ?>

            }); 
            $('#listausu').click(function() {  
                     <?php
                       if ($_SESSION['usu']=='')
                         {
                     ?>
                          alert("No tiene Acceso para la Impresion, Verifique ...");
                     <?php
                         }
                         else
                         {
                     ?>
                             var fechainfo;
                             fechainfo=prompt('Ingrese la fecha [ dia/mes/a\361o dia/mes/a\361o ]:');
                             if(fechainfo.trim().length>0)
                              {
                                $('#txtfechaimpre').prop('value',fechainfo);
                                $('#frmaccesos').prop('action','../cliente/info_listaususolicita.php');
                                document.frmaccesos.submit();     
                              }

                      <?php
                        }                      
                      ?>

            });   

            $('#listaprov').click(function() {  
                         <?php
                           if ($_SESSION['usu']=='')
                             {
                         ?>
                              alert("No tiene Acceso para la Impresion, Verifique ...");
                         <?php
                             }
                             else
                             {
                         ?>
                                 var fechainfo;

                                 fechainfo=prompt('Ingrese la fecha [ dia/mes/a\361o dia/mes/a\361o ]:');
                                 if(fechainfo.trim().length>0)
                                  {
                                    $('#txtfechaimpre').prop('value',fechainfo);
                                    $('#frmaccesos').prop('action','../cliente/info_listaprovsolicita.php');
                                    document.frmaccesos.submit();     
                                  }

                          <?php
                            }                      
                          ?>
                    }); 



            $('#consousu').click(function() {  
                     <?php
                       if ($_SESSION['usu']=='')
                         {
                     ?>
                          alert("No tiene Acceso para la Impresion, Verifique ...");
                     <?php
                         }
                         else
                         {
                     ?>
                             var fechainfo;
                             fechainfo=prompt('Ingrese la fecha [ dia/mes/a\361o dia/mes/a\361o ]:');
                             if(fechainfo.trim().length>0)
                              {
                                $('#txtfechaimpre').prop('value',fechainfo);
                                $('#frmaccesos').prop('action','../cliente/info_consoususolicita.php');
                                document.frmaccesos.submit();     
                              }

                      <?php
                        }                      
                      ?>

            });   

            $('#consousudia').click(function() {  
                     <?php
                       if ($_SESSION['usu']=='')
                         {
                     ?>
                          alert("No tiene Acceso para la Impresion, Verifique ...");
                     <?php
                         }
                         else
                         {
                     ?>
                             var fechainfo;
                             fechainfo=prompt('Ingrese la fecha [ dia/mes/a\361o dia/mes/a\361o ]:');
                             if(fechainfo.trim().length>0)
                              {
                                $('#txtfechaimpre').prop('value',fechainfo);
                                $('#frmaccesos').prop('action','../cliente/info_consousudiasolicita.php');
                                document.frmaccesos.submit();     
                              }

                      <?php
                        }                      
                      ?>

            });    

            $('#listasuge').click(function() {  
                     <?php
                       if ($_SESSION['usu']=='')
                         {
                     ?>
                          alert("No tiene Acceso para la Impresion, Verifique ...");
                     <?php
                         }
                         else
                         {
                     ?>
                             var fechainfo;
                             fechainfo=prompt('Ingrese la fecha [ dia/mes/a\361o dia/mes/a\361o ]:');
                             if(fechainfo.trim().length>0)
                              {
                                $('#txtfechaimpre').prop('value',fechainfo);
                                $('#frmaccesos').prop('action','../cliente/info_listasuge.php');
                                document.frmaccesos.submit();     
                              }

                      <?php
                        }                      
                      ?>

            }); 

               
            $('#btconsutraba').click(function(){
                document.frmaccesos.submit();                  
            });

            $('#btingreacce').click(function() {  
            
        
                   $('#modalacce').modal('show');

                    valor="<div class='col-md-6' align='left'> <img src='../cliente/images/beneficiarios.gif'> Accesos </div>  <div class='col-md-6' align='right'> <img src='../cliente/images/nuevo.gif'> Nuevo Registro </div>";
                    $('#divtituacce').html(valor);
                    $('#frmaccesos')
                       .find('input,textarea,select')
                       .prop('value','')
                       .prop('readonly',false)
                       .end()
                       .find('input[type=checkbox], input[type=radio]')
                       .prop('checked','')
                       .prop('readonly',false)
                       .end();

                    $('#detatrabaacce').html('');
                    $('#cbotrabaacce').prop('disabled',false); 
                    
         

                    
                    cadena1='';
                    cadena2='';
                
                    $('#cbotrabaacce').empty().append("<option value='' selected='true'></option>");
                    $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'accesos', opc2 : 'consutrabaacce'}, type : 'POST',dataType : 'json',success : function(data)
                      {  
                        $.each(data, function(i){
                           $('#cbotrabaacce').append("<option value="+data[i].mtr_dni+">" + data[i].mtr_ncompleto +"</option>");
                        });
                      },
                      error : function(xhr, status) {},
                      complete : function(xhr, status) {}
                    }); 
                    
                    $('#cbotrabaacce').prop('value',"<?php echo $_SESSION['dni'];?>"); 
                    $('#detatrabaacce').html('');
                    $('#cbotrabaacce').change();


                    
                    //------------------------

                    $('#txtfechaemific').prop('value',fecha);
                    $('#txtusuemific').prop('value',"<?php echo $_SESSION['dni'];?>");
                    $('#btaceptaracce').html("<i class='glyphicon glyphicon-share'></i> Grabar");
                    $('#txtopcacce').prop('value','I'); 
                    
                    
                  
                });


                $('#btactuacce').click(function() { 

                    if ($('#cbotrabaacce').prop('value').trim().length>0)
                       {
                          $('#modalacce').modal('show');
                          valor="<div class='col-md-6' align='left'> <img src='../cliente/images/beneficiarios.gif'> Accesos </div>  <div class='col-md-6' align='right'> <img src='../cliente/images/editar.gif'> Actualizacion de Registro </div>";
                          $('#divtituacce').html(valor);
                          $('#divteclaacce').html('<div> [ CTRL + F8 ] </div><div> GRABAR </div>');
                          $('#frmaccesos')
                            .find('input,textarea,select')
                            .prop('readonly',false)
                            .end()
                            .find('input[type=checkbox], input[type=radio]')
                            .prop('readonly',false)
                            .end();

                          $('#detatrabaacce').html('');
                          

                          ////////////
                             $('#cbotrabaacce').change();
                          ////////////

                          $('#cbotrabaacce').prop('disabled',true); 
                        
                        
                          $('#btaceptaracce').html("<i class='glyphicon glyphicon-share'></i> Grabar");
                          $('#txtopcacce').prop('value','A');
                        }
                    else
                        {
                            alert('Debe seleccionar el registro para Actualizar, Verifique ...'); 
                        }  
                });
                
              /*
                $('#btelific').click(function() {  
                  if ($('#txtcodific').prop('value').trim().length>0)
                      {
                        $('#modalacce').modal('show');
                        valor="<div class='col-md-6' align='left'> <img src='../cliente/images/beneficiarios.gif'> Ficha Tecnica </div>  <div class='col-md-6' align='right'> <img src='../cliente/images/eliminar.gif'> Eliminacion de Registro </div>";
                        $('#divtituacce').html(valor);
                        $('#frmaccesos')
                          .find('input,textarea,select')
                          .prop('readonly',true)
                          .end()
                          .find('input[type=checkbox], input[type=radio]')
                          .prop('readonly',true)
                          .end();

                        $('#detatrabaacce').html('');
                        $('#detajefeinmefic').html('');
                        $('#detajefesupefic').html('');  
                        
                        $('#cbotrabaacce').prop('disabled',true); 
                        $('#btaceptaracce').html("<i class='glyphicon glyphicon-remove-sign'></i> Eliminar");
                        $('#txtopcacce').prop('value','E');
                      }
                    else
                      {
                        alert('Debe seleccionar el registro para Eliminar, Verifique ...'); 
                      }  
                });
  

               $('#btimpreacce').click(function() {  
                  $('#cbotrabaacce').prop('disabled',false);
                  
                        if ($('#cbotrabaacce').prop('value').trim().length>0) 
                           {
                              // window.location.href='../cliente/info_fichatecnica.php';
                              $('#frmaccesos').prop('action','../cliente/info_fichatecnica.php');
                              document.frmaccesos.submit();                    
                           }
                        else
                        {
                          alert('Debe Registrar al Trabajador, Verifique ...'); 
                        }

                  
               });
*/

               $('#btaceptaracce').click(function() { 
      
                  if ($('#frmaccesos').valid()){ 

                    $('#cbotrabaacce').prop('disabled',false); 

                    if ($('#txtopcacce').prop('value')=='I')
                        {
             
                            rpta = confirm('¿ Desea Grabar el Registro ?');
                         //  codific = '0';

                        }  
                    
                    else if ($('#txtopcacce').prop('value')=='A')
                        {
                            rpta = confirm('¿ Desea Grabar el Registro ?');
                           
                        }    
               
                    else if ($('#txtopcacce').prop('value')=='E')
                       {
                          var rpta = confirm('¿ Desea Eliminar el Registro ?');
                        
                        }


                    if (rpta == true)  
                         { 

                              //$('#cbotrabaacce').prop('disabled',true); 
                              coditrabaacce = $('#cbotrabaacce').prop('value').trim().toUpperCase();
                              $('#cbotrabaacce').prop('disabled',true); 
                              //alert(coditrabafic);

                              condiacce = $('#cbocondiacce').prop('value').trim().toUpperCase();
                              clacorreacce = $('#txtclacorreacce').prop('value').trim().toUpperCase();
                              opcacce = $('#txtopcacce').prop('value').trim().toUpperCase();

                              
           
                              $.ajax({async:false, cache:false, url : 'consulta.php', data :{ coditrabaacce:coditrabaacce
                                , condiacce:condiacce, clacorreacce:clacorreacce, opcacce:opcacce
                                 , opc1:'accesos', opc2:'transaacce'}, type : 'POST',dataType : 'json',success : function(data)  
                                
                                { },
                                error : function(xhr, status) {  },
                                complete : function(xhr, status) { }
                              }); 
                           

                            
                              $('#frmaccesos')
                                .find('input,textarea,select')
                                .prop('value','')
                                .end()
                                .find('input[type=checkbox], input[type=radio]')
                                .prop('checked','')
                                .end();


                          document.frmaccesos.submit();                  

                       }
                       $('#cbotrabaacce').prop('disabled',true); 

                   }
                      
                });     




                $('#btcanceacce').click(function() { 
        
                    $('#frmaccesos')
                        .find('input,textarea,select')
                        .prop('value','')
                        .end()
                        .find('input[type=checkbox], input[type=radio]')
                        .prop('checked','')
                        .prop('readonly',true)
                        .end();

                   // $('#tablaacce tr').find('input:radio').bootstrapSwitch('state',false);  
                    
                });


                $('#tablaacce tr').click(function(){
        
                    $("#tablaacce tr").each(function(item,i) {
                            if (item!='0')
                              {
                                $(this).css('text-shadow','3px 5px 5px #d9edf7');
                              }
                    })
                    $(this).css('text-shadow','1px 1px 1px #337ab7');

                    
                    $('#cbotrabaacce').empty();
                    $('#cbotrabaacce').append($('<option>', {
                       value: $("td:eq(0)", this).text().trim(),
                       text: $("td:eq(1)", this).text().trim()
                    }));
                    $('#cbotrabaacce').prop('value',$("td:eq(0)",this).text().trim());
                    $('#cbocondiacce').prop('value',$("td:eq(4)",this).text().trim());
                    $('#txtclacorreacce').prop('value',$("td:eq(5)",this).text().trim());



                });
               

                 $('#tablaacce tr').click();
                 $('#btactuacce').click();  
               
                 

                  
           });

       </script>
    </body>
</html>