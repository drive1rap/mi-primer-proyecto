<?php
 //header('Content-Type: text/html; charset=ISO-8859-1');
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

?>
 

<!DOCTYPE html>
<html>
<head>
    <!--<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>-->
    <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
     <title>Teleorientacion y Telemonitoreo</title>
	
	<!-- core CSS -->
    <link href="../cliente/css/bootstrap.css" rel="stylesheet">
    <link href="../cliente/css/font-awesome.min.css" rel="stylesheet">
    <link href="../cliente/css/animate.min.css" rel="stylesheet">
    <link href="../cliente/css/prettyPhoto.css" rel="stylesheet">
    <link href="../cliente/css/main.css" rel="stylesheet">
    <link href="../cliente/css/responsive.css" rel="stylesheet">
    <link href='../cliente/css/AdminLTE.css' rel='stylesheet'>    
  
    <link href='../cliente/images/insn.ico' rel='shortcut icon'>

</head><!--/head-->

<body class="homepage">

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
                                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>  <img src='../cliente/images/mantenimiento.gif'> MANTENIMIENTO <i class='fa fa-angle-down'></i></a>";
                            ?>
                            
                            <ul class='dropdown-menu'>
                                <?php
                                

                                    foreach ($_SESSION['menu'] as $datamenu):  

                                      if ($datamenu['mtr_tipoacce']=='1')
                                        {
                                          echo "<li><a href='../cliente/accesos.php'><img src='../cliente/images/beneficiarios.gif'> </i> ACCESOS </a></li>";
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
                                          echo "<li><a href='../cliente/index.php'><img src='../cliente/images/beneficiarios.gif'> </i> SOLICITUD DE CITA</a></li>";  
                                        }
                                        

                                    endforeach;
                                ?>
                            </ul>
                        </li>

                        <li class='dropdown'>
                            <?php
                                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='../cliente/images/utilitario.gif'> AYUDA </a>";
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

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/logo-insn.png)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                  <!--  <h1 class='animation animated-item-1'>FICHA TECNICA</h1>
                                    <h2 class='animation animated-item-2'>Registro y Validaciones de Ficha Tecnica de trabajadores Adiministrativos del INSN ...</h2>
                                    <a class='btn-slide animation animated-item-3' href='#'>Leer Mas ...</a> 
                                    -->
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                  <!-- <img src="images/slider/img1.png" class="img-responsive"> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/logo-insn.png)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <!--<h1 class='animation animated-item-1'>FICHA TECNICA</h1>
                                    <h2 class='animation animated-item-2'>Registro y Validaciones de Ficha Tecnica de trabajadores Adiministrativos del INSN ...</h2>
                                    <a class='btn-slide animation animated-item-3' href='#'>Leer Mas ...</a> -->
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                   <!-- <img src="images/slider/img2.png" class="img-responsive"> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/logo-insn.png)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <!--<h1 class='animation animated-item-1'>FICHA TECNICA</h1>
                                    <h2 class='animation animated-item-2'>Registro y Validaciones de Ficha Tecnica de trabajadores Adiministrativos del INSN ...</h2>
                                    <a class='btn-slide animation animated-item-3' href='#'>Leer Mas ...</a> -->
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <!-- <img src="images/slider/img3.png" class="img-responsive"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section>
     <form name='frmmenu' id='frmmenu'  method='post' autocomplete='off' enctype='multipart/form-data'>
         <input type='hidden' class='form-control' name='txtfechaimpre' id='txtfechaimpre'  tabindex='-1' readonly>

     </form>
    </section>






<!--

    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Cursos de Especializacion</h2>
                            <p>Cursos especializados para los trabajadores del INSN </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->

    <footer id='footer' class='midnight-blue'>
        <div class='container'>
            <div class='row'>
                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'> <img src='../cliente/images/folder3.png'> OFICINA DE ESTADISTICA E INFORMATICA (OEI) 
                </div>

                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4' align='center'>
                    &copy; 2020 <a target='_blank'  ></a>
                </div>
                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'>
                           <img src='../cliente/images/folder3.png'> AREA DE DESARROLLO DE SISTEMAS (ADS) 
                </div>
            </div>
        </div>
    </footer><!--/#footer-->



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>

    <script type='text/javascript'>
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
                });


                
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
                                    $('#frmmenu').prop('action','../cliente/info_listasolicita.php');
                                    document.frmmenu.submit();     
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
                                    $('#frmmenu').prop('action','../cliente/info_listaususolicita.php');
                                    document.frmmenu.submit();     
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
                                    $('#frmmenu').prop('action','../cliente/info_listaprovsolicita.php');
                                    document.frmmenu.submit();     
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
                                        $('#frmmenu').prop('action','../cliente/info_consoususolicita.php');
                                        document.frmmenu.submit();     
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
                                        $('#frmmenu').prop('action','../cliente/info_consousudiasolicita.php');
                                        document.frmmenu.submit();     
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
                                $('#frmmenu').prop('action','../cliente/info_listasuge.php');
                                document.frmmenu.submit();     
                              }

                      <?php
                        }                      
                      ?>

            }); 
                


    </script>
</body>
</html>