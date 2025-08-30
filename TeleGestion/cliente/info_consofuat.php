
<?php
  //header('Content-Type: text/html; charset=ISO-8859-1');
  header('Content-Type: text/html; charset=ISO-8859-1');
  session_start();
  if ($_SESSION['usu']=='')
   {
     header('Location:index.php');
     exit;
   } 

include('../negocio/clsnegocio.php');
$clsnegocio = new clsnegocio;
 

$cadena1=null;
$cadena2=null;
$cadena3=null;
$cadena4=null;

$opc1=null;
$opc2=null;
$mensaje=null;
 

$direofidesc=null; 
$depunidesc=null; 
$serviareasdesc=null; 
$anno=null; 

/*
if (isset($_POST['btaceptar'])) //intevalo
  {
  
    if (isset($_POST['cboinforme']))
    {

          $cadena1 = trim($_POST['cbodireofi']);
       
           $cadena2 = trim($_POST['cbodepuni']);
           $cadena3 = trim($_POST['cboserviareas']);
           $cadena4 = trim($_POST['txtanno']);
           $opc1='';
           $opc2=trim($_POST['cboinforme']);

           $direofidesc=trim($_POST['txtdireofidesc']);
           $depunidesc=trim($_POST['txtdepunidesc']);
           $serviareasdesc=trim($_POST['txtserviareasdesc']);
           $anno=trim($_POST['txtanno']);

    }
  }
*/
  
  $opc1='infoconsofuat';
  $Arrayinfo = $clsnegocio->finfo($cadena1,$cadena2,$cadena3,$cadena4,$opc1,$opc2);
  
  if(!$Arrayinfo) 
    {
      $mensaje='No existen Registros, Verifique ...';
    }
    else
      {
        ?>
        <script type="text/javascript">
        var data = [];  
        var presutotal=0;
      


           <?php 
             if ($Arrayinfo)
                {

                
                foreach ($Arrayinfo as $datainfo): 
                ?>    
                    data.push(["<?php echo $datainfo['desc']; ?>",parseFloat("<?php echo $datainfo['presu'];?>")]);
                    presutotal=presutotal+parseFloat("<?php echo $datainfo['presu'];?>");
                <?php
                   endforeach;
                 }
                ?>
        </script>

    <?php
       }

     ?>


<!DOCTYPE HTML>
<html>
	<head>
		    <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href='../cliente/css/bootstrap.css' rel='stylesheet'>
        <link href='../cliente/css/dataTables.bootstrap.css' rel='stylesheet' >
        <link href="../cliente/css/font-awesome.css" rel="stylesheet">
        <link href="../cliente/css/animate.min.css" rel="stylesheet">
        <link href="../cliente/css/prettyPhoto.css" rel="stylesheet">

        <link href="../cliente/css/responsive.css" rel="stylesheet">
        <link href='../cliente/css/AdminLTE.css' rel='stylesheet'>       
        <link rel='stylesheet' href='../cliente/css/bootstrap-switch.css'> 

        <link href='../cliente/capacitacion2.ico' rel='shortcut icon'>

		

		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
        
        
        <!-- el reporte trabaja con estas librerias-->
        <script src='../cliente/js/highcharts.js'></script>
        <script src='../cliente/js/highcharts-3d.js'></script>
        <script src='../cliente/js/exporting.js'></script>


		<style type="text/css">
            ${demo.css}
		</style>
		<script type="text/javascript">
        $('#frminfoconsofuat').ready(function(){
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

                 $('#divfecha').html(fecha);


                 $(document.body).on('keydown',this,function(event){
             
                          if (event.keyCode == 13 || event.keyCode == 116 || event.keyCode == 505 )
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
                          else if (event.keyCode == 27) //escape (esc)
                          {
                              if($('#btcance'))
                              {
                                
                                 $('#btcance').click();  
                              }
                              
                          }
                });



            $(function () {
            //    function grafico(){

                // Radialize the colors
                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: {
                            cx: 0.5,
                            cy: 0.3,
                            r: 0.7
                        },
                        stops: [
                            [0, color],
                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                        ]
                    };
                });

                // Build the chart
                $('#container').highcharts({
                    chart: {
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    colors: ['#ffd45f','#79fdff','#ff0084'],
                    title: {
                        text: 'FUAT Consolidadas por Tipo de Paciente',
                        style: {
                                    color: '#ff0084'
                                }
                           },

                    subtitle: {
                              text: 'Presupuesto Total: '+presutotal,
                              style: {
                                    color: '#337ab7'
                                }
                             },

                    tooltip: {
                        shared: true,
                        crosshairs: true, 
                        shadow: true ,
                        pointFormat: '{series.name}: <b>{point.percentage:.0f} % </b>',
                         style: {
                                    color: '#337ab7'
                                }
                            },
                             
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            depth: 25,
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}:  <b>{point.y:.0f}</b>',
                                style: {
                                    color: '#337ab7'
                                },
                                connectorColor: '#ff0084'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Porcentaje: ',
                        color: '#ffd45f',
                        data: data
                        /*
                        data: [
                            { name:  'edxplore', y: 56.33 },
                            {
                                name: 'Chrome',
                                y: 24.03,
                                sliced: true,
                                selected: true
                            },
                            { name: 'Firefox', y: 10.38 },
                            { name: 'Safari', y: 4.77 }, { name: 'Opera', y: 0.91 },
                            { name: 'Proprietary or Undetectable', y: 0.2 }
                        ]
                        */

                    }]
                });

              });
              
              /*
                 $('#btcance').click(function() { 
                     window.location.href = '../cliente/intervalo.php';
                 });
              */

            });
		</script>

	</head>
	<body class='homepage' background='../cliente/images/logo.jpg'>
<!--<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
-->
        
<header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                      <div class="top-number center"><p>FORMATO UNICO DE ATENCION DE TELEORIENTACION Y TELEMONITOREO - FUAT</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <div id='fecha' class='color-blanco'></div>
                            </ul>
                          
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../cliente/index.php"><img src="images/logo.gif" alt="logo" width='120' height='60'></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="menu.php"> <img src='../cliente/images/administracion.gif'> Inicio</a></li>
                        <li class='dropdown'>
                           <?php
                                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>  <img src='../cliente/images/mantenimiento.gif'>  Mantenimiento <i class='fa fa-angle-down'></i></a>";
                            ?>
                            
                            <ul class='dropdown-menu'>
                                <?php
                                    foreach ($_SESSION['menu'] as $datamenu):  

                                      if ($datamenu['mtr_tipoacce']=='1')
                                        {
                                          echo "<li><a href='../cliente/accesos.php'><img src='../cliente/images/beneficiarios.gif'> </i> Accesos</a></li>";
                                        }
                                    
                                    endforeach;
                                ?>

                                <li><a href='../cliente/index.php'> <img src='../cliente/images/salir.gif'> salir</a></li>
                               
                            </ul>
                       </li>
                        <li class='dropdown active'>
                            <?php
                                echo "<a href='#'' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/movimiento.gif'> Movimiento <i class='fa fa-angle-down'></i></a>";
                            ?>

                            <ul class='dropdown-menu active'>
                                <?php
                                   foreach ($_SESSION['menu'] as $datamenu):  
                                        if ($datamenu['mtr_tipoacce']=='1')
                                        {
                                          echo "<li><a href='../cliente/fuat.php'><img src='../cliente/images/beneficiarios.gif'> </i> FUAT</a></li>";  
                                            echo "<li><a href='../cliente/info_consofuat.php'><img src='../cliente/images/beneficiarios.gif'> </i> Informe</a></li>";  
                                        
                                        }
                                        else if ($datamenu['mtr_tipoacce']=='2')
                                        {
                                          echo "<li><a href='../cliente/fuat.php'><img src='../cliente/images/beneficiarios.gif'> </i> FUAT</a></li>";  
                                        }
                                        else
                                        {
                                          echo "<li><a href='../cliente/fuat.php'><img src='../cliente/images/beneficiarios.gif'> </i> FUAT</a></li>";  
                                        }
                                        

                                    endforeach;
                                ?>
                            </ul>
                        </li>

                        <li class='dropdown'>
                            <?php
                                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/utilitario.gif'> Ayuda</a>";
                            ?>
                            <ul class='dropdown-menu'>
                                  <li><a href="../cliente/instructivo_ficha.pdf"><img src="../cliente/images/instru.gif">Instructivo de FUAT</a></li>
                                  <li><a href="../cliente/manual_ficha.pdf"><img src="../cliente/images/instru.gif">Manual de FUAT</a></li>

                            </ul>
                        </li>
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/usuario.gif'> <?php echo $_SESSION['usu']; ?>  </a>
                            <ul class='dropdown-menu active'>
                                <li><a href='../cliente/index.php'><img src='../cliente/images/salir.gif'> Cerrar Session</a></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->


    <section>  
     <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <form name='frminfoconsofuat' id='frminfoconsofuat'  method='post' autocomplete='off' enctype='multipart/form-data' action='<?=$pagina?>'>
            <br>
            <div class='panel-primary'>  
              <div class='panel-heading'>
                        <div class='row'> </div>
                        <br><br><br><br>
                        <div class='row' align='center'><img src='../cliente/images/beneficiarios.gif'>Formato Unico de Atencion de Teleorientacion y Telemonitoreo - FUAT</div>

              </div>
              <div class='panel-body'>
                  <div class='form-group'> 
                    <div class='row' align='center'>  
                      <div class='col-md-12'>  
                            <?php echo $mensaje; ?>
                      </div>    
                    </div> 


                    <div class='row' align='center'>  
                      <div class='col-md-12'>  
                           <div id="container" style="min-width: 310px; height: 400px; max-width: 800px; margin: 0 auto"></div>      
                      </div>    
                    </div> 
                  </div>

                 <!--
                  <div class='form-group'> 
                    <div class='row' align='center'>  
                      <div class='col-md-12'>  
                        <fieldset class='marco1'>
                          <div align='center'> <a id='btcance' href='#' class='btn btn-primary btn-xs'><i class='fa fa-undo'> </i> Cancelar</a> </div>
                        </fieldset>
                      </div>    
                    </div>    
                  </div>
                -->
              </div> <!-- final panet body -->
              <div class='panel-footer'>
                  
              </div> 
            </div><!-- final panel primary-->
          </form> 
        </div> <!-- final col-->
      </div> <!-- final row-->   
     </div> <!-- final container-->
    </section>


    
<!--
    <script type="text/javascript">
      grafico();
    </script>
    -->
    
    

    

    <footer id='footer' class='midnight-blue'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12' align='center'>
                    &copy; 2016 <a target='_blank'  ></a>. TODOS LOS DERECHOS RESERVADOS.
                </div>
            </div>
        </div>
    </footer><!--/#footer    -->


	</body>
</html>