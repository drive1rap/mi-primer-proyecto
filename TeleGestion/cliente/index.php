<?php
  //header("Content-type: application/json; charset=utf-8");
   header('Content-Type: text/html; charset=ISO-8859-1');
  
   session_start(); 
  

   $pagina='https://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
   include('../negocio/clsnegocio.php');
   $clsnegocio = new clsnegocio;
   $fnavegador=$clsnegocio->fnavegador();
 

    //$arraybene = $clsnegocio->fconsu('','','consufuat');    
 
   
 $fechaini=""; 
 $fechafin=""; 
 if (isset($_SESSION['usu']))    
 {
  if ($_SESSION['usu']=='')
   {
     $arraybene ='';
   }
   else
   {

    
    if (isset($_POST["txtfechaini"]))    
        {

           if ($_POST["txtfechaini"]=='')
             {
               date_default_timezone_set("America/Lima");
               $fechaini = date("d/m/Y"); 
             }
            else
             {
               $fechaini = $_POST["txtfechaini"];
             }
          
        }
     else
        {
       
         date_default_timezone_set("America/Lima");
          $fechaini = date("d/m/Y"); 
       
        }
      

      if (isset($_POST["txtfechafin"]))    
        {

           if ($_POST["txtfechafin"]=='')
             {
               date_default_timezone_set("America/Lima");
               $fechafin = date("d/m/Y"); 
             }
            else
             {
               $fechafin = $_POST["txtfechafin"];
             }
          
        }
     else
        {
       
         date_default_timezone_set("America/Lima");
          $fechafin = date("d/m/Y"); 
       
        }
  


    
         //$arraybene = $clsnegocio->fconsu('',$fecha,'consufuat');    
         $arraybene = $clsnegocio->fconsu($fechaini,$fechafin,'consufuat');    
   }

 }
 else
 {
   $arraybene ='';
   
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
 }
 
  /*
  if ($_SESSION['usu']=='')
   {
     $arraybene ='';
   }
   else
   {
    $arraybene = $clsnegocio->fconsu('','','consufuat');    
   }
*/
   
?>
  
 
<!DOCTYPE html> 
<html>
<head>
    
    
    <!--<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>-->
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

<!--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->


    
    
   
    
</head><!--/head-->



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
           <!-- <div class='row'>
             <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
           --> 
              <form name='frmfuat' id='frmfuat'  method='post' autocomplete='off' enctype='multipart/form-data' action='<?=$pagina?>'>
                  <div class='panel-primary'>
                    <div class='panel-heading'>
                        
                       <br><br><br><br>
                       <div class='row' align='center'><img src='../cliente/images/beneficiarios.gif'> Solicitud de Cita </div>

                    </div>
                    <div class='panel-body'>
                      


                        
                      <div class="row">
                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                              <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' align="left">Fecha Inicial:</label>
                              <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtfechaini' id='txtfechaini'  tabindex='40' maxlength='10' >
                        
                          </div> 
                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                              <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' align="left">Fecha Final:</label>
                              <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtfechafin' id='txtfechafin'  tabindex='41' maxlength='10' >
                        
                          </div> 
                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                              <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' align="left">.</label>
                              <button type='button' name='btconsufuat' id='btconsufuat' class='form-control btn btn-primary btn-ln' tabindex='-1'><i class='glyphicon glyphicon-search color-blanco'></i> <span class=" color-blanco">Consulta</span></button>
                          </div>
                      </div>  
                      



                        <div class='form-group'>
                            <div class='table-responsive'>
                                   <table id='tablafuat' class='table table-bordered table-striped table-hover'>
                                    <thead>
                                        <tr class='primary' style='font-size:13px;'>
                                            <th >Codigo</th>
                                            <th class='invisible'>Dni</th>
                                            <th>Paterno</th>
                                           <th>Materno</th>

                                            <th class='invisible'>Dni_Teleorientador</th>
                                            <th class='invisible'>Solicitud_de_Servicio</th>
                                            <th class='invisible'>Nombre_de_IPRESS</th>
                                            
                                            <th class='invisible'>Pasaporte</th>
                                            <th class='invisible'>Edad</th>
                                            <th class='invisible'>Docu1</th>
                                            
                                            <th class='invisible'>mfi_fun4</th>
                                            <th class='invisible'>mfi_fun5</th>

                                            <th class='invisible'>Motivo_de_Consulta</th>
                                            <th class='invisible'>Nombre_IPRESS_Consultora</th>
                                            <th class='invisible'>Codi_IPRESS_Consultora</th>
                                            <th class='invisible'>Codi_Depa</th>
                                            <th class='invisible'>Desc_Depa</th>
                                            <th class='invisible'>Hora_Tele</th>
                                            <th class='invisible'>Sexo</th>
                                            <th class='invisible'>Resumen_Solicitud</th>
                                            <th class='invisible'>Especialidad</th>
                                            <th class='invisible'>Codi_Distri</th>
                                            <th class='invisible'>Recomendaciones</th>
                                            <th class='invisible'>Fecha_Reg</th>
                                            
                                            <th>Nombre(s)</th>
                                            <th class='invisible'>Fecha_Naci</th>
                                            <th>Fecha_Emision</th>
                                            <th>Especialidad</th>
                                            <!--<th class='invisible'>Teleorientador</th>-->
                                            <th>Tipo</th>
                                            <!--<th>Opc</th>-->
                                            <th>_____Observacion_detallada_____</th>
                                            <th class='invisible'>NroRNETele</th>
                                            <th class='invisible'>EspeTele</th>
                                            <th class='invisible'>CodiEspe</th>

                                            <th class='invisible'>CodiProv</th>
                                            <th class='invisible'>DescProv</th>
                                            <th class='invisible'>DescDistri</th>
                                            <th class='invisible'>CodiEstaOri</th>
                                            <th class='invisible'>DescEstaOri</th>
                                            <th class='invisible'>DptoEstaOri</th>
                                            <th class='invisible'>ProvEstaOri</th>
                                            <th class='invisible'>DistriEstaOri</th>

                                            <th class='invisible'>TipoDocuApo</th>
                                            <th class='invisible'>NroDocuApo</th>
                                            <th class='invisible'>FechaNaciApo</th>

                                            <th class='invisible'>ApePatApo</th>
                                            <th class='invisible'>ApeMatApo</th>
                                            <th class='invisible'>NobApo</th>
                                            <th class='invisible'>CorreoApo</th>
                                            <th class='invisible'>TeleApo</th>
                                            <th class='invisible'>CeluApo</th>
                                            <th class='invisible'>DetaSoliCita</th>
                                            <th>Opc</th>
                                            <th class='invisible'>CodiDepaNaci</th>
                                            <th class='invisible'>DescDepaNaci</th>
                                            <th class='invisible'>CodiProvNaci</th>
                                            <th class='invisible'>DescProvNaci</th>
                                            <th class='invisible'>CodiDistriNaci</th>
                                            <th class='invisible'>DescDistriNaci</th>
                                            <th class='invisible'>ApepatMatNomApo</th>
                                            <th>Usuario</th>
                                            <th class='invisible'>ModaSoliPaci</th>
                                            <th>NroHc</th>
                                            <th class='invisible'>CodiPais</th>
                                            <th class='invisible'>DescPais</th>
                                            <th class='invisible'>DniApepatMatNomApo</th>
                                            <th>Fecha_Atencion</th>
                                            <th>Interconsulta</th>
                                            <th>Cita ConsuExter</th>
                                            <th class='invisible'>CodiPaisApo</th>
                                            <th class='invisible'>DescPaisApo</th>
                                            <th class='invisible'>TipoDocuApePatMatNomApo</th>
                                            <th class='invisible'>CodiPaisApePatMatNomApo</th>
                                            <th class='invisible'>DescPaisApePatMatNomApo</th>
                                            <th class='invisible'>NroHojaRefe</th>
                                            <th class='invisible'>FechaRefe</th>
                                            <th class='invisible'>NomCompleApo</th>
                                            <th class='invisible'>CodiMedi</th>
                                            <th class='invisible'>NomCompleMedi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        if ($arraybene)
                                        {

                                          foreach ($arraybene as $databene): ?>
                                         <tr style='font-size:13px;'>
                                           <td> <?php echo $databene['mfi_codi']; ?> </td>
                                           
                                           <td class='invisible'> <?php echo $databene['mfi_area']; ?> </td>
                                           <td> <?php echo $databene['mfi_expeinsti']; ?> </td>
                                          <td> <?php echo $databene['mfi_expepues']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mtr_dnitele']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_regimen']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_deno']; ?> </td>

                                           <td class='invisible'> <?php echo $databene['mfi_fun1']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun2']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun3']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun4']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun5']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun6']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun7']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fun8']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codidepa']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descdepa']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_prograespe']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_ofiword']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_ofiexcel']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_ofipower']; ?> </td>
                                         
                                           <td class='invisible'> <?php echo $databene['codidistri']; ?> </td>
                                           
                                           <td class='invisible'> <?php echo $databene['mfi_habi']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_conotec']; ?> </td>
                                           
                                           <td> <?php echo $databene['mfi_denopues']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_nivel']; ?> </td>
                                           
                                           <td> <?php echo $databene['mfi_fechaemi']; ?> </td>
                                           <td> <?php echo $databene['mse_descserv']; ?> </td>
                                           <td> 

                                             <?php 
                                                      if  ($databene['tipopaci']=='1')
                                                      {
                                                        ?>
                                                          PAGANTE
                                                      <?php 
                                                      } 
                                                      else if  ($databene['tipopaci']=='2')
                                                      {
                                                        ?>
                                                          SIS
                                                        <?php 
                                                      }
                                                      else if  ($databene['tipopaci']=='3')
                                                      {
                                                        ?>
                                                          GRATUITO
                                                        <?php 
                                                      }
                                                      
                                                      
                                                     ?>  

                                           </td>

                                          <!-- <td> <?php echo $databene['mtr_ncompleto']; ?> </td>-->

                                           

                                           <td> <?php echo $databene['mtr_codcole']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mtr_rne']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mca_desccargo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mse_codi']; ?> </td>

                                           <td class='invisible'> <?php echo $databene['codiprov']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descprov']; ?> </td>
                                           
                                           <td class='invisible'> <?php echo $databene['descdistri']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codiestaori']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descestaori']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['dptoestaori']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['provestaori']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['distriestaori']; ?> </td>

                                           <td class='invisible'> <?php echo $databene['mfi_tipodocuapo']; ?> </td>
                                            <td class='invisible'> <?php echo $databene['mfi_nrodocuapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_fechanaciapo']; ?> </td>
                                           

                                           <td class='invisible'> <?php echo $databene['mfi_apepatapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_apematapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_nomapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_correoapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_teleapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_celuapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['mfi_otrosobs']; ?> </td>
                                           <td>  
                                               <!--<select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cboaceptafuat' id='cboaceptafuat' tabindex='-1' >
                                                                                    <option value='' selected='true'>
                                                                                    <option value='1'>SI
                                                                                    <option value='2'>NO
                                                                             </select>
                                                                           -->
                                                    <?php 
                                                      if  ($databene['mtr_ncompleto']=='SI')
                                                      {
                                                        ?>
                                                          <img src="images/si.gif">
                                                      <?php 
                                                      } 
                                                      else if  ($databene['mtr_ncompleto']=='NO')
                                                      {
                                                        ?>
                                                          <img src="images/no.gif">
                                                        <?php 
                                                      }
                                                      else
                                                      {
                                                       ?>
                                                          <img src="images/nuevo.gif">
                                                        <?php  
                                                      }

                                                    
                                                     ?>                       
                                               

                                           </td>
                                           <td class='invisible'> <?php echo $databene['codidepanaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descdepanaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codiprovnaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descprovnaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codidistrinaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descdistrinaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['apepatmatnomapo']; ?> </td>
                                           <!--<td> 

                                             <?php 
                                                      if  ($databene['tipopaci']=='1')
                                                      {
                                                        ?>
                                                          PAGANTE
                                                      <?php 
                                                      } 
                                                      else if  ($databene['tipopaci']=='2')
                                                      {
                                                        ?>
                                                          SIS
                                                        <?php 
                                                      }
                                                      else if  ($databene['tipopaci']=='3')
                                                      {
                                                        ?>
                                                          GRATUITO
                                                        <?php 
                                                      }
                                                      
                                                     ?>  

                                           </td>
-->
                                          
                                           <td> <?php echo $databene['usuactu']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['modasolipaci']; ?> </td>
                                           <td> <?php echo $databene['nrohcpaci']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codipais']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descpais']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['dniapepatmatnomapo']; ?> </td>
                                           <td> <?php echo $databene['fechaactu']; ?> </td>
                                           <td>
                                                      <?php 
                                                      if  ($databene['espesolihospi']=='1')
                                                      {
                                                        ?>
                                                          SI
                                                      <?php 
                                                      } 
                                                      else if  ($databene['espesolihospi']=='2')
                                                      {
                                                        ?>
                                                          NO
                                                        <?php 
                                                      }
                                                      ?>
                                            </td>
                                            <td>
                                                      <?php 
                                                      if  ($databene['citaespesolihospi']=='1')
                                                      {
                                                        ?>
                                                          SI
                                                      <?php 
                                                      } 
                                                      else if  ($databene['citaespesolihospi']=='2')
                                                      {
                                                        ?>
                                                          NO
                                                        <?php 
                                                      }
                                                      ?>
                                           </td>


                                           <td class='invisible'> <?php echo $databene['codipaisapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descpaisapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['tipodocuapepatmatnomapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codipaisapepatmatnomapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['descpaisapepatmatnomapo']; ?> </td>

                                           <td class='invisible'> <?php echo $databene['nrohojarefe']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['fecharefe']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['nomcompleapo']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['codimedi']; ?> </td>
                                           <td class='invisible'> <?php echo $databene['nomcomplemedi']; ?> </td>


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
                                <div class='modal modal-primary fade' data-backdrop='static' id='modalfuat' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>

                                 <div class='modal-dialog'>
                                      <div class='modal-content'>
                                           <div class='modal-header'>
                                              <div class='row'> </div>
                                                <br><br>
                                                <div class='row'> 
                                                    <div id='divtitufuat'> </div>
                                                </div> 
                                           </div>
                                             <div class='modal-body'> 
                                              <div class='box-body'>
                                                  <div class='form-group'>
                                                      <div class='row'>   
                                                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                              <div> <H4><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'><img src='../cliente/images/mano.png' width='5%'> No olvide despues de enviar su solicitud, revisar sus correos en la bandeja de entrada, correo no deseado, spam... etc.</label></H4> </div>
                                                          </div>     
                                                      </div>

                                                      <div class='row'>    
                                                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                              <input type='hidden' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtcodifuat' id='txtcodifuat'  tabindex='1' readonly>
                                                              <input type='hidden' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtopcfuat' id='txtopcfuat'  tabindex='-1'>
                                                              <input type='hidden' class='form-control' name='txtfechaimpre' id='txtfechaimpre'  tabindex='-1' readonly>
                                                          </div>
                                                          <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                              <input type='hidden' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtfechatelefuat' id='txtfechatelefuat'  tabindex='-1' readonly>
                                                          </div>
                                                      </div>

                                                      <div class='row'>   
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>DATOS PERSONALES DEL PACIENTE:</label></H2> </div>

                                                              <div> <H5><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>APELLIDOS Y NOMBRES:</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                  <div class='row'>    
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>TIPO_DOCUMENTO <span class="color-rojo"> (*)</span></label> </div>
                                                                            <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbotipodocupacifuat' id='cbotipodocupacifuat' tabindex='1' >
                                                                                    <option value='' selected='true'>
                                                                                    <option value='1'>DNI
                                                                                    <option value='2'>CARNET DE EXTRANJERIA
                                                                                    <option value='3'>SIN DOCUMENTO
                                                                                    <option value='4'>HC
                                                                             </select>
                                                                        </div>
                                                                
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>NUMERO_DOCUMENTO<span class="color-rojo"> (*)</span></label> </div>
                                                                            <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtdnipacifuat' id='txtdnipacifuat'  tabindex='2' maxlength='20' autocomplete="off">
                                                                        </div>
                                                                 
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>FECHA_NACIMIENTO<span class="color-rojo"> (*)</span></label> </div>
                                                                             <input class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtfechanacipacifuat' id='txtfechanacipacifuat'  type='text' tabindex='3'  maxlength='10' autocomplete="off">
                                                                        </div>

                                                                        <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>A&NtildeO:MES:DIA<span class="color-rojo"> (*)</span></label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtedadpacifuat' id='txtedadpacifuat' tabindex='4'  maxlength='20' autocomplete="off">
                                                                        </div>
                                              <!--                   
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'></label> </div>
                                                                            <button type='button' name='btconsupacifuat' id='btconsupacifuat' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 btn btn-primary btn-2x' tabindex='4'><i class='fa fa-search'></i> Consultar</button>
                                                                        </div>
                                            -->
                                                                 </div>
                                                                 <div class='row'>    
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>NOMBRE(S)<span class="color-rojo"> (*)</span></label> </div>
                                                                              <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtnompacifuat' id='txtnompacifuat'  tabindex='5' maxlength='100' autocomplete="off">
                                                                        </div>
                                                                
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>APELLIDO_PATERNO<span class="color-rojo"> (*)</span></label> </div>
                                                                             <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtapepatpacifuat' id='txtapepatpacifuat'  tabindex='6' maxlength='50' autocomplete="off">
                                                                        </div>
                                                                
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>APELLIDO_MATERNO<span class="color-rojo"> (*)</span></label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtapematpacifuat' id='txtapematpacifuat'  tabindex='7'  maxlength='50' autocomplete="off">
                                                                        </div>
                                                                
                                                                       <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>SEXO<span class="color-rojo"> (*)</span></label> </div>
                                                                            <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbosexopacifuat' id='cbosexopacifuat' tabindex='8' >
                                                                              <option value='M'>MASCULINO
                                                                              <option value='F'>FEMENINO
                                                                              
                                                                          </select>
                                                                        </div>

                                                                        
                                                                 </div>

                                                                 <div class='row'>    
                                                                  <!--
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>TIPO_SEGURO</label> </div>
                                                                            <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbotiposegupacifuat' id='cbotiposegupacifuat' tabindex='9' >
                                                                                  <option value='1' selected='true'>SIN SEGURO DE SALUD
                                                                                  <option value='2'>SIS
                                                                                  <option value='3'>ESSALUD
                                                                                  <option value='4'>SANIDAD FAP
                                                                                  <option value='5'>SANIDAD NAVAL
                                                                                  <option value='6'>SANIDAD EP
                                                                                  <option value='7'>SANIDAD PNP
                                                                                  <option value='8'>PRIVADOS
                                                                                  <option value='9'>OTROS
                                                                                  <option value='10'>EXONERADO
                                                                            </select>
                                                                        </div>
                                                                      
                                                                 
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                       <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>CORREO_ELECTRONICO</label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtcorreopacifuat' id='txtcorreopacifuat'  tabindex='10'  maxlength='200'>
                                                                        </div>
                                                                 
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>TELEFONO</label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txttelepacifuat' id='txttelepacifuat'  tabindex='11'  maxlength='20'>
                                                                        </div>
                                                                 
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>CELULAR</label> </div>
                                                                            <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtcelupacifuat' id='txtcelupacifuat'  tabindex='12'   maxlength='20'>
                                                                        </div>
                                                                      -->
                                                                 </div>
                                                             </div>
                                                            
                                                             <div> <H5><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'><br><br> LUGAR DE NACIMIENTO:</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                   <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>DEPARTAMENTO<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbodepanacipacifuat' id='cbodepanacipacifuat' tabindex='9' >
                                                                                      <option value='' selected='true'>
                                                                                    </select>
                                                                                  
                                                                                </div>
                                                                             
                                                                                
                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                   <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>PROVINCIA<span class="color-rojo"> (*)</span></label></div>    
                                                                                  <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cboprovnacipacifuat' id='cboprovnacipacifuat' tabindex='10' >
                                                                                    <option value='' selected='true'>
                                                                                  </select>
                                                                                </div>
                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                     <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>DISTRITO<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbodistrinacipacifuat' id='cbodistrinacipacifuat' tabindex='11' >
                                                                                      <option value='' selected='true'>
                                                                                    </select>
                                                                                </div>
                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                     <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>PAIS<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbopaisnacipacifuat' id='cbopaisnacipacifuat' tabindex='12' >
                                                                                      <option value='' selected='true'>
                                                                                    </select>
                                                                                </div>
                                                                 </div>
                                                             </div> 

                                                             <div> <H5><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'><br><br> PROCEDENCIA:</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                                                                   <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>DEPARTAMENTO<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbodepapacifuat' id='cbodepapacifuat' tabindex='13' >
                                                                                      <option value='' selected='true'>
                                                                                    </select>
                                                                                  
                                                                                </div>
                                                                             
                                                                                
                                                                                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                                                                   <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>PROVINCIA<span class="color-rojo"> (*)</span></label></div>    
                                                                                  <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cboprovpacifuat' id='cboprovpacifuat' tabindex='14' >
                                                                                    <option value='' selected='true'>
                                                                                  </select>
                                                                                </div>
                                                                                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                                                                     <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>DISTRITO<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbodistripacifuat' id='cbodistripacifuat' tabindex='15' >
                                                                                      <option value='' selected='true'>
                                                                                    </select>
                                                                                </div>
                                                                 </div>
                                                                           
                                                                 <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                      <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>DIRECCION COMPLETA<span class="color-rojo"> (*)</span></label></div>
                                                                             
                                                                                      <input type='text' class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' name='txtdirepacifuat' id='txtdirepacifuat'  tabindex='16' maxlength='1000' autocomplete="off">
                                                                                </div>

                                                                                <!--
                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>ESTABLECIMIENTO</label></div>
                                                                                     <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtrefepacifuat' id='txtrefepacifuat'  tabindex='14' maxlength='1000'>
                                                                                </div>
                                                                              -->
                                                                 </div>
                                                             </div>  


                                                            




                                                        </div> 
                                                      </div>

                                                       <br>
                                                      <div class='row'>   
                                                          <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>AGENDAR SOLICITUD:</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                 <div class='row'>
                                                                      <div id='mensacupo'>
                                                                          <h4><span class='color-rojo'>Ya se terminaron las citas para esta Especialidad...! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp No podra realizar la solicitud de cita.</span></h4>
                                                                      </div>
                                                                      <div id='mensaservi'>
                                                                          <h4><span class='color-rojo'>Solo pacientes nuevos para esta Especialidad...! .</span></h4>
                                                                      </div>
                                                                     
                                                                 </div>
                                                                 <div class='row'>
                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>ESPECIALIDAD<span class="color-rojo"> (*)</span></label></div>
                                                                                    <!--
                                                                                      <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtservipacifuat' id='txtservipacifuat'  tabindex='18' maxlength='100'>
                                                                                    -->
                                                                                    <select class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control'  style='font-size:8pt' name='txtservipacifuat' id='txtservipacifuat'
                                                                                    tabindex='17' >
                                                                                    <option value='' selected='true'>
                                                                                    </select>
                                                                                </div>

                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                      <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>MODALIDAD DE SOLICITUD<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-3 col-md-3 col-lg-3 form-control'  style='font-size:8pt' name='cbomodasolipacifuat' id='cbomodasolipacifuat'
                                                                                    tabindex='18' >
                                                                                    <option value='' selected='true'>
                                                                                    <option value='1'>VIRTUAL
                                                                                    <option value='2'>PRESENCIAL
                                                                                    </select>
                                                                                </div>

                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                      <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>TIPO DE PACIENTE<span class="color-rojo"> (*)</span></label></div>
                                                                                    <select class='col-xs-12 col-sm-3 col-md-3 col-lg-3 form-control'  style='font-size:8pt' name='cbotipopacifuat' id='cbotipopacifuat'
                                                                                    tabindex='19' >
                                                                                    <option value='' selected='true'>
                                                                                    <option value='1'>PAGANTE
                                                                                    <option value='2'>SIS
                                                                                    <option value='3'>GRATUITO
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                               
                                                                 </div> 
                                                                 <div id='mensamediservi'>
                                                                           <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                                                                      <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>ESPECIALISTAS:</label></div>
                                                                                    <select class='col-xs-12 col-sm-3 col-md-3 col-lg-3 form-control'  style='font-size:8pt' name='cbomediservifuat' id='cbomediservifuat'
                                                                                    tabindex='21' >
                                                                                    <option value='' selected='true'>
                                                                                   
                                                                                    </select>
                                                                                </div> 

                                                                      </div>
                                                                 <div class='row' id='divrefe'>
                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                </div>
                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                  <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>NRO. DE HOJA DE REFERENCIA</label> </div>
                                                                                  <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtnrohojarefefuat' id='txtnrohojarefefuat'  tabindex='20'  maxlength='10' autocomplete="off">
                                                                                </div>
                                                                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                  <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>FECHA DE REFERENCIA</label> </div>
                                                                                  <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtfecharefefuat' id='txtfecharefefuat'  tabindex='21'  maxlength='10' autocomplete="off">
                                                                                </div>
                                                                 </div>
                                                             </div>     
                                                          </div> 
                                                       </div>
                                                        <br>
                                                       <div class='row' id='divhospi'>   
                                                          <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>SELECCIONAR SOLO SI EL PACIENTE SE ENCUENTRA HOSPITALIZADO ACTUALMENTE:</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                 <div class='row'>
                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>EL PACIENTE PASO A INTERCONSULTA CON LA ESPECIALIDAD SOLICITADA ?:</label></div>
                                                                                    <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                      <select class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control'  style='font-size:8pt' name='cboespesolihospi' id='cboespesolihospi'
                                                                                      tabindex='22' >
                                                                                      <option value='' selected='true'>
                                                                                      <option value='1'>SI
                                                                                      <option value='2'>NO
                                                                                      </select>
                                                                                    </div>    
                                                                                </div>

                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                      <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>EL ESPECIALISTA QUE ATENDIO AL PACIENTE EN LA INTERCONSULTA LE INDICO QUE REALICE UN CITA PARA CONSULTA EXTERNA ?: </label></div>
                                                                                      <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                                        <select class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control'  style='font-size:8pt' name='cbocitaespesolihospi' id='cbocitaespesolihospi'
                                                                                        tabindex='23' >
                                                                                        <option value='' selected='true'>
                                                                                        <option value='1'>SI
                                                                                        <option value='2'>NO
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                               
                                                                 </div>

                                                             </div>     
                                                          </div> 
                                                       </div>
<!--
<!--
                                                      <br><br>
                                                      <div class='row'>    
                                                          <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                              <div> <H4><label class='col-md-12 control-label color-rojo'>ESTABLECIMIENTO DE SALUD:</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                  <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>ESTABLECIMIENTO - DEPARTAMENTO - PROVINCIA - DISTRITO</label></div>
                                                                                    <select class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control'  style='font-size:8pt' name='cboestaoripacifuat' id='cboestaoripacifuat'
                                                                                    tabindex='18' >
                                                                                    <option value='' selected='true'>
                                                                                    </select>
                                                                                </div>
                                                                  </div>
                                                             </div>
                                                          </div>
                                                      </div>
                                                    -->





                                                       
                                                      <div class='row'>   
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>DATOS DEL APODERADO:</label> </H4></div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                  <div class='row'>    
                                                                        <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>PARENTESCO<span class="color-rojo"> (*)</span></label> </div>
                                                                             <!--<input class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtfechanaciapofuat' id='txtfechanaciapofuat'  type='text' tabindex='21'>
                                                                             -->

                                                                             <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cboapofuat' id='cboapofuat' tabindex='24'>
                                                                                    <option value='' selected='true'>
                                                                                    <option value='1'>MADRE
                                                                                    <option value='2'>PADRE
                                                                                    <option value='3'>APODERADO
                                                                             </select>

                                                                        </div>
                                                                        <div class='col-xs-12 col-sm-9 col-md-9 col-lg-9'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>APELLIDOS, NOMBRE(S) Y DNI <span class="color-rojo"> (*)</span></label> </div>
                                                                              <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtnomapofuat' id='txtnomapofuat'  tabindex='25'  maxlength='200' autocomplete="off">
                                                                        </div>
                                                              <!--    
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>TIPO_DOCUMENTO<span class="color-rojo"> (*)</span></label> </div>
                                                                            <select class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='cbotipodocuapofuat' id='cbotipodocuapofuat' tabindex='26'>
                                                                                    <option value='' selected='true'>
                                                                                    <option value='1'>DNI/LE
                                                                                    <option value='2'>CARNET DE EXTRANJERIA
                                                                                  
                                                                             </select>
                                                                        </div>
                                                                   
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>NUMERO_DOCUMENTO<span class="color-rojo"> (*)</span></label> </div>
                                                                            <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtnrodocuapofuat' id='txtnrodocuapofuat'  tabindex='27' maxlength='20'>
                                                                       </div>
                                                                 
                                                                       
                                                          
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'></label> </div>
                                                                            <button type='button' name='btconsuapofuat' id='btconsuapofuat' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 btn btn-primary btn-2x' tabindex='24'><i class='fa fa-search'></i> Consultar</button>
                                                                        </div>
                                                                 -->
                                                                 </div>
                                                                <!--               
                                                                 <div class='row'>    
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>APELLIDO_PATERNO<span class="color-rojo"> (*)</span></label> </div>
                                                                             <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtapepatapofuat' id='txtapepatapofuat'  tabindex='29'  maxlength='50'>
                                                                        </div>
                                                                
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>APELLIDO_MATERNO<span class="color-rojo"> (*)</span></label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtapematapofuat' id='txtapematapofuat'  tabindex='30' maxlength='50'>
                                                                        </div>
                                                                 </div>
                                                                 -->

                                                                 <div class='row'>    
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>CORREO_ELECTRONICO<span class="color-rojo"> (*)</span></label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtcorreoapofuat' id='txtcorreoapofuat'  tabindex='26' maxlength='200' autocomplete="off">
                                                                       </div>
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>CELULAR<span class="color-rojo"> (*)</span></label> </div>
                                                                            <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtceluapofuat' id='txtceluapofuat'  tabindex='27'  maxlength='20' autocomplete="off">
                                                                       </div>
                                                                       <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'>TELEFONO</label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtteleapofuat' id='txtteleapofuat'  tabindex='28' maxlength='20' autocomplete="off">
                                                                        </div>
                                                                 
                                                                        
                                                                 </div>
                                                                 <div class='row'>    
                                                                  <!--
                                                                        <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' id='lbldniapepatmatnom'>DNI DEL PADRE Y/O MADRE<span class="color-rojo"> (*)</span></label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtdniapepatmatnomapofuat' id='txtdniapepatmatnomapofuat'  tabindex='34' maxlength='20'>
                                                                        </div>
                                                                       -->
                                                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                            <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label' id='lblapepatmatnom'>APELLIDOS, NOMBRE(S) Y DNI DEL PADRE Y/O MADRE<span class="color-rojo"> (*)</span></label> </div>
                                                                                <input type='text' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtapepatmatnomapofuat' id='txtapepatmatnomapofuat'  tabindex='29' maxlength='200' autocomplete="off">
                                                                        </div>
                                                                 </div>
                                                             </div>
                                                        </div>
                                                      </div>

                                                       
                                                     
<!--
                                                       <br><br>
                                                      <div class='row'>   
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>

                                                              <div> <H4><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'> COMO  DESEA RESPONDER LA ATENCION ?</label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chkllamada1pacifuat" name="chkllamada1pacifuat" data-off-color='danger' data-size='small' tabindex='29'> CHAT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chkllamada2pacifuat" name="chkllamada2pacifuat" data-off-color='danger' data-size='small' checkbox="checked" > LLAMADA
                                                                                </div>
                                                                  </div>
                                                             </div>
                                                        </div>

                                                      </div>
                                                    -->

                                                      <br>
                                                      <div class='row'>    
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>ADJUNTAR DOCUMENTOS DIGITALES COMO DNI, INTERCONSULTAS, HOJAS DE REFERENCIAS, ETC. </label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>
<!--
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> 1] UTILIZA APLICACIONES DE MENSAJERIA INSTANTANEA ? (Ejemplo: WhatsApp, Messenger, Telegram, etc)<span class="color-rojo"> *</span></label></div>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chkaplipacifuat" name="chkaplipacifuat" data-off-color='danger' data-size='small' tabindex='30'>
                                                                                </div>
                                                                  </div>
                                                                

                                                                  <br><br>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> 2] DISPONE DE UN CELULAR O TABLET CON ACCESO A INTERNET ?<span class="color-rojo"> *</span></label></div>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chkcelupacifuat" name="chkcelupacifuat" data-off-color='danger' data-size='small' tabindex='31'>
                                                                                    
                                                                                </div>
                                                                  </div>
                                                                

                                                                  <br><br>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> 3] CON QUE SISTEMA OPERATIVO FUNCIONA SU CELULAR ?<span class="color-rojo"> *</span></label></div>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chksiste1pacifuat" name="chksiste1pacifuat" data-off-color='danger' data-size='small' tabindex='32'> ANDROID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chksiste2pacifuat" name="chksiste2pacifuat" data-off-color='danger' data-size='small' checkbox="checked"> IOS(IPHONE)
                                                                                </div>
                                                                  </div>

                                                                  <br><br>
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> 4] TIENE ALGUNA CONDICION FISICA QUE LO LIMITE EN EL MANEJO DEL CELULAR O TABLET ?<span class="color-rojo"> *</span></label></div>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' id="chkcondifisipacifuat" name="chkcondifisipacifuat" data-off-color='danger' data-size='small' tabindex='33'>
                                                                                 
                                                                                </div>
                                                                  </div>
                                                                -->

                                                                  
                                                                  <div class='row'>
                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> Hoja de Referencia como tipo de Archivo (" .JPG, .PNG, .PDF"). <br>Tama&ntildeo maximo de  Archivo: 5MB </label></div>
                                                                                    <!--
                                                                                    <textarea  class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control'  name='filedocu1' id='filedocu1'  rows='5' tabindex='34' maxlength='1950'>
                                                                                    </textarea>
                                                                                  -->
                                                                                 
                                                                                   <iframe id='iframedocu1' src='images/docu.png' frameborder='1' scrolling='no' width='300' height='300'></iframe>
                                                                                    <input type='hidden' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtnomdocu1' id='txtnomdocu1'>
                                                                                  <input type='file' id='filedocu1' name='filedocu1' class='btn btn-primary btn-xs' accept='.png, .jpeg, .jpg, .pdf'>
                                                                                  
                                                                                </div>


                                                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> DNI anverso y reverso como tipo de Archivo(" .JPG, .PNG, .PDF"). <br>Tama&ntildeo maximo de  Archivo: 5MB</label></div>
                                                                                    <!--
                                                                                    <textarea  class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control'  name='filedocu1' id='filedocu1'  rows='5' tabindex='34' maxlength='1950'>
                                                                                    </textarea>
                                                                                  -->
                                                                                 
                                                                                   <iframe id='iframedocu2' src='images/docu.png' frameborder='1' scrolling='no' width='300' height='300'></iframe>
                                                                                    <input type='hidden' class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtnomdocu2' id='txtnomdocu2'>
                                                                                  <input type='file' id='filedocu2' name='filedocu2' class='btn btn-primary btn-xs' accept='.png, .jpeg, .jpg, .pdf'>
                                                                                  
                                                                                </div>

                                                                  </div>

                                                             </div>
                                                        </div>
                                                      </div>

                                                      <br>
                                                      <div class='row'>    
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>DETALLE DE LA SOLICITUD DE CITA: </label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>

                                                                <br>
                                                                  <div class='row'>
                                                                      <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                            <textarea  class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control'  name='textdetasolicita' id='textdetasolicita'  rows='5' tabindex='30' maxlength='1950' autocomplete="off">

                                                                            </textarea>
                                                                      </div>
                                                                                
                                                                  </div>

                                                              </div>
                                                        </div>
                                                      </div>


                                                      <br>
                                                      <div class='row'>    
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                              <div> <H2><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>VALIDACION DEL FORMULARIO: </label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>

                                                                <br>
                                                                  <div class='row'>
                                                                    <!--
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label'> </label></div>
                                                                                    <div class="g-recaptcha" data-sitekey="6LeVtagZAAAAAOTdqVBGv93FEtNcARlrtBhbCQhg" tabindex='-1'></div>
                                                                                </div> 
                                                                              -->
                                                                 
                                                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control' id="chkaceptapacifuat" name="chkaceptapacifuat" data-off-color='danger' data-size='small' tabindex='31'>
                                                                                    <div id='autoriza'> HE LEIDO Y ACEPTO LAS POLITICAS DE PRIVACIDAD DE DATOS PERSONALES</div>
                                                                                   
                                                                                </div>
                                                                  </div>

                                                              </div>
                                                        </div>
                                                      </div>

                                                      <br><br>  
                                                      <div class='row' id='divventaaceptasolicitafuat'>    
                                                        <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                              <div> <H4><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>ACEPTACION DE LA SOLICITUD DE CITA: </label></H4> </div>
                                                              <div class='col-xs-11 col-sm-11 col-md-11 col-lg-11'>

                                                                <br>
                                                                  <div class='row'>
                                                                        <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1'>
                                                                                    <input type="checkbox" class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' id="chkaceptasolicitafuat" name="chkaceptasolicitafuat" data-off-color='danger' data-size='small' tabindex='32'>
                                                                            
                                                                        </div>
                                                                         <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>
                                                                               <label class='col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label'>OBSERVACION: (Max_2000_caracteres): </label>
                                                                        </div>
                                                                  
                                                                        <div class='col-xs-12 col-sm-9 col-md-9 col-lg-9'>
                                                                                <textarea  class='col-xs-12 col-sm-2 col-md-2 col-lg-2 form-control' name='txtobsaceptasolicitafuat' id='txtobsaceptasolicitafuat'  tabindex='33' maxlength='2000' rows='4' autocomplete="off">
                                                                                </textarea>
                                                                        
                                                                        </div>           
                                                                  </div>

                                                              </div>
                                                        </div>
                                                      </div>

                                                     
                                                                   <div class='row'>
                                                                      <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                                          <div> <label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'>  (*) Datos Obligatorios</div>
                                                                                   
                                                                      </div>
                                                                  </div>

                                                                  <div class='row'>   
                                                                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                                                                        <div> <H4><label class='col-xs-12 col-sm-12 col-md-12 col-lg-12 control-label color-rojo'><img src='../cliente/images/mano.png' width='5%'> No olvide despues de enviar su solicitud, revisar sus correos en la bandeja de entrada, correo no deseado, spam... etc.</label></H4> </div>
                                                                    </div>     
                                                                  </div>
                                                      


                                                   
                                                                                                                        
                                              </div>  <!-- form-group -->  
                                          </div><!-- /.box-body -->

                                                <div class='box-footer'>
                                                    <div class='form-group'> 


                                                      <div class='row' id='divventamensamosta'>  
                                                        <div class='panel-mensamosta col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <div id='divmensamosta' class='color-rojo'> </div>
                                                        </div>
                                                      </div>  
                                                      <br>





                                                      <div class='row'>  
                                                         <div class='panel-primary col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                                           
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1'>  
                                                            </div>  
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>  
                                                                            <!--
                                                                             <a class='btn btn-primary btn-xs' href="../cliente/login.php" role="button"><i class='glyphicon glyphicon-user'></i>Login</a>
                                                                             </a>
                                                                           -->
                                                                           <a class='color-rojo' href='../cliente/sugerencias.php' role='button'><i class='glyphicon glyphicon-envelope btn-sm'></i> Sugerencias</a>
                                                                          </a>
                                                              
                                                            </div>  
                                                            <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>  
                                                            </div>
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>  
                                                                            <button type='button' name='btaceptarfuat' id='btaceptarfuat' class='btn btn-primary btn-xs' tabindex='34'><i class='glyphicon glyphicon-floppy-disk'></i> Grabar</button>
                                                            </div>  
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>  
                                                                            <button type='button' name='btcancefuat' id='btcancefuat' class='btn btn-primary btn-xs'
                                                                             data-dismiss='modal' tabindex='35'><i class='glyphicon glyphicon glyphicon-repeat'></i> Cancelar</button>
                                                            </div>
                                                            <!--
                                                            <div class='col-xs-12 col-sm-2 col-md-4 col-lg-4'>  
                                                               <button type='button' name='btimpreticketfuat' id='btimpreticketfuat' class='btn btn-primary btn-xs' style='display: none;' tabindex='44'><i class='glyphicon glyphicon-floppy-disk'></i> Ticket</button>
                                                            </div> 
                                                          -->

                                                             
                                                            <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>  
                                                            </div>
                                                            <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1' align='center'>  
                                                                            <!--
                                                                             <a class='btn btn-primary btn-xs' href="../cliente/login.php" role="button"><i class='glyphicon glyphicon-user'></i>Login</a>
                                                                             </a>
                                                                           -->
                                                                           <a class='color-rojo' href='../cliente/login.php' role='button'><i class='glyphicon glyphicon-user btn-sm'></i> Acceso a Usuarios</a>
                                                                          </a>
                                                              
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
                                                <div class='col-xs-12 col-sm-2 col-md-1 col-lg-1 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div id='divteclafuat'>  </div>  </div> 
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
                                      <div id='divnuevo' class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align='center'>
                                       <button type='button' name='btingrefuat' id='btingrefuat' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-file'></i> Nuevo</button> 
                                      </div>
                                      <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align='center'>
                                        <button type='button' name='btactufuat' id='btactufuat' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-edit'></i>  Editar  </button>
                                        <!--    <button type='button' name='btelific' id='btelific' class='btn btn-primary btn-xs' tabindex='13'><i class='glyphicon glyphicon-remove-sign'></i> Eliminar</button>
                                          -->
                                      </div>
                                      <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align='center'>
                                          <button type='button' name='btimprefuat' id='btimprefuat' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-print'></i> Impresion</button>
                                      </div>
                                    <!--
                                      <div class='col-xs-12 col-sm-1 col-md-1 col-lg-1' align='center'>
                                          <button type='button' name='btconsufuat' id='btconsufuat' class='btn btn-primary btn-xs' tabindex='-1'><i class='glyphicon glyphicon-search'></i> Consulta</button>
                                      </div>
                                    -->

                                      <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                                      </div>
                                </div>    
                                
                            </div>    
                        </div>
                      
                    </div> <!-- final panel body -->
                    <div class='panel-footer'>
                        <div class='row'>
                           <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'> <img src='../cliente/images/folder3.png'> OFICINA DE ESTADISTICA E INFORMATICA (OEI) </div>
                           <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div>[ CTRL + F1 ]</div> <div> NUEVO </div> </div> 
                           <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div>[ CTRL + F2 ]</div> <div> EDITAR </div> </div> 
                           <!--
                           <div class='col-xs-12 col-sm-2 col-md-2 col-lg-2 color-blanco' align='center'> <img src='../cliente/images/teclado.png'> <div>[ CTRL + F3 ]</div> <div> ELIMINAR </div> </div> 
                           -->
                           <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 color-blanco' align='center'> <img src='../cliente/images/folder3.png'> AREA DE DESARROLLO DE SISTEMAS (ADS) </div>
                        </div>
                        <br>
                            

                    </div>
                 </div> <!--/. fin panel primary-->       
              </form> <!--/. fin form-->       
          
         <!--   </div>
          </div> 
        -->
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->

       <!--
   <footer id='footer'>
        <div class='container'>
   
            <div class='row'>
                <div class='col-md-12' align='center'>
                    &copy; 2020 <a target='_blank'  ></a>
                </div>
            </div>
            
        </div>
    </footer>
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
           $('#frmfuat').ready(function(){
            
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
                 $('#divnuevo').hide();
                 $('#mensacupo').hide();
                 $('#mensaservi').hide();
                 $('#divrefe').hide();
                 $('#mensamediservi').hide();


                 
                 /*

                 $(document.body).on('keydown',this,function(event){
             
                          if (event.keyCode == 13 || event.keyCode == 116)
                            {
                              return false;
                            }
                });
                */
                
                
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
                              if($('#btaceptarfuat'))
                              {
                                 $('#btaceptarfuat').click();  
                              }
                              
                          }
                          else if (event.ctrlKey == true && event.keyCode == 112) //nuevo (CTRL + F1)
                          {
                              if($('#btingrefuat'))
                              {
                                 $('#btingrefuat').click();  
                              }
                              
                          }
                          else if (event.ctrlKey == true && event.keyCode == 113) //editar (CTRL + F2)
                          {
                              if($('#btactufuat'))
                              {
                                 $('#btactufuat').click();  
                              }
                              
                          }
                        
                          else if (event.keyCode == 27) //escape (esc)
                          {
                              if($('#btcancefuat'))
                              {
                                 $('#btcancefuat').click();  
                              }
                              
                          }
                          else if (event.ctrlKey == true && event.keyCode == 73) //imprimir (CTRL + i)
                          {
                              if($('#btimprefuat'))
                              {
                                 $('#btimprefuat').click();  
                              }
                              
                          }

                });

                
                /*
                  function deshabilitar()
                  { 
                    alert("Esta funcion esta deshabilitada.");
                    return false; 
                  } 
                document.oncontextmenu=deshabilitar; 
                */




                $('#fecha').html('Fecha: '+fecha);


                $(function () {
                   $('#tablafuat').DataTable();
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
                
                // validaciones programaciones
                   $('#frmfuat').validate({
                    rules:  {
                              cbotipodocupacifuat: {required:true},
                              txtdnipacifuat: {required:true,maxlength:20},
                              txtfechanacipacifuat: {required:true},
                              txtapepatpacifuat: {required:true,maxlength:50},
                              txtapematpacifuat: {required:true,maxlength:50},
                              txtnompacifuat: {required:true,maxlength:100},
                              cbosexopacifuat: {required:true},
                          //    txtcorreopacifuat: {required:true, maxlength:100}, //correo
                           //   txtcelupacifuat: {required:true, maxlength:20}, //celular
                            

                              cbodepapacifuat: {required:true}, //departamento
                              cboprovpacifuat: {required:true}, //provincia
                              cbodistripacifuat: {required:true}, //distrito
                              
                              txtdirepacifuat: {required:true,minlength:10}, //direccion

                              //cbotipodocuapofuat: {required:true}, //tipodocu apoderado
                              //txtnrodocuapofuat: {required:true,maxlength:20}, //nro docu apoderado
                              //txtfechanaciapofuat: {required:true}, //fecha naci apoderado

                              cbodepanacipacifuat: {required:true}, //departamento
                              cboprovnacipacifuat: {required:true}, //provincia
                              cbodistrinacipacifuat: {required:true}, //distrito
                              cbopaisnacipacifuat: {required:true}, //pais

                              txtservipacifuat: {required:true,maxlength:100}, //servicio

                              cbomodasolipacifuat: {required:true}, //modalidad
                              cbotipopacifuat: {required:true}, //tipopaci


                              cboapofuat: {required:true}, //fecha naci apoderado
                              txtnomapofuat: {required:true,maxlength:200}, //nombre apoderado
                             // txtapepatapofuat: {required:true,maxlength:50}, //apepat apoderado
                             // txtapematapofuat: {required:true,maxlength:50}, //apemat apoderado
                              txtcorreoapofuat: {required:true,email: true,maxlength:200}, //correo apoderado
                              txtceluapofuat: {required:true,number:true,maxlength:20}, //celular apoderado
                              //txtdniapepatmatnomapofuat: {required:true}, //apepatmatnom apoderado
                              txtapepatmatnomapofuat: {required:true,minlength:10,maxlength:2000} //apepatmatnom apoderado
                              //txtnomdocu1: {required:true,maxlength:2000} //documento 1
                              

                            },
                  messages: { 
                              cbotipodocupacifuat: ' ',
                              txtdnipacifuat: ' ',
                              txtfechanacipacifuat: ' ',
                              txtapepatpacifuat: ' ',
                              txtapematpacifuat: ' ',
                              txtnompacifuat: ' ',
                              cbosexopacifuat: ' ',

                             // txtcorreopacifuat: ' ', //correo
                             // txtcelupacifuat: ' ', //celular
                              

                              cbodepapacifuat: ' ', //departamento
                              cboprovpacifuat: ' ',  //provincia
                              cbodistripacifuat: ' ', //distrito
                              txtdirepacifuat: ' ', //direccion

                              //cbotipodocuapofuat: ' ', //tipodocu apoderado
                              //txtnrodocuapofuat: ' ',  //nro docu apoderado

                              cbodepanacipacifuat: ' ', //departamento
                              cboprovnacipacifuat: ' ',  //provincia
                              cbodistrinacipacifuat: ' ', //distrito
                              cbopaisnacipacifuat: ' ', //pais

                              //txtfechanaciapofuat: ' ',  //fecha naci apoderado
                              txtservipacifuat:' ', //servicio

                              cbomodasolipacifuat: ' ', //moadalidad
                              cbotipopacifuat: ' ', //tipo paciente

                              cboapofuat:' ', //fecha naci apoderado
                              txtnomapofuat: ' ', //nombre apoderado
                              //txtapepatapofuat: ' ', //apepat apoderado
                              //txtapematapofuat: ' ', //apemat apoderado
                              txtcorreoapofuat: ' ', //correo apoderado
                              txtceluapofuat: ' ',//celular apoderado
                              //txtdniapepatmatnomapofuat: ' ',//dniapepatmatnom apoderado
                              txtapepatmatnomapofuat: ' '//apepatmatnom apoderado
                              //txtnomdocu1: ' ' // motivo consulta
                              


                              
                            }

                });



                var parti=0;
                var presu=0;
                var perso=0;

                var pasa=0;
                var esta=0;
                var otros=0;
                var presu=0;

                var cadena1=null;

                var cupos=false;
    

                     
                   // tecla de funciones   
               function consutecla(evento,control1,control2)
                  {
                    if (evento.which == 13 && control1.value.length>0)
                      {
                              control2.focus();
                      }
           
                  }    
             
                  $("#cbotipodocupacifuat").keypress(function(e){
                      consutecla(e,$("#cbotipodocupacifuat")[0],$("#txtdnipacifuat")[0]);
                  });      
/*
                  $("#txtdnipacifuat").keypress(function(e){
                      consutecla(e,$("#txtdnipacifuat")[0],$("#txtfechanacipacifuat")[0]);
                  });      
                  */

                  $("#txtfechanacipacifuat").keypress(function(e){
                      consutecla(e,$("#txtfechanacipacifuat")[0],$("#txtedadpacifuat")[0]);
                  });  

                  $("#txtedadpacifuat").keypress(function(e){
                      consutecla(e,$("#txtedadpacifuat")[0],$("#txtnompacifuat")[0]);
                  });

                  $("#txtnompacifuat").keypress(function(e){
                      consutecla(e,$("#txtnompacifuat")[0],$("#txtapepatpacifuat")[0]);
                  });  
                
                  $("#txtapepatpacifuat").keypress(function(e){
                      consutecla(e,$("#txtapepatpacifuat")[0],$("#txtapematpacifuat")[0]);
                  });  
                  $("#txtapematpacifuat").keypress(function(e){
                      consutecla(e,$("#txtapematpacifuat")[0],$("#cbosexopacifuat")[0]);
                  });  

                  $("#cbosexopacifuat").keypress(function(e){
                      consutecla(e,$("#cbosexopacifuat")[0],$("#txtedadpacifuat")[0]);
                  });  

                  

                  
                  


/*                
                  $("#cbotiposegupacifuat").keypress(function(e){
                      consutecla(e,$("#cbotiposegupacifuat")[0],$("#txtcorreopacifuat")[0]);
                  });  
                  
                 
                  

                  $("#txtcorreopacifuat").keypress(function(e){
                      consutecla(e,$("#txtcorreopacifuat")[0],$("#txttelepacifuat")[0]);
                  });  


  
                  $("#txttelepacifuat").keypress(function(e){
                      consutecla(e,$("#txttelepacifuat")[0],$("#txtcelupacifuat")[0]);
                  });  
                  $("#txtcelupacifuat").keypress(function(e){
                      consutecla(e,$("#txtcelupacifuat")[0],$("#cbodepapacifuat")[0]);
                  });  
                  */
                  

                  $("#cbodepapacifuat").keypress(function(e){
                      consutecla(e,$("#cbodepapacifuat")[0],$("#cboprovpacifuat")[0]);
                  });  
                  $("#cboprovpacifuat").keypress(function(e){
                      consutecla(e,$("#cboprovpacifuat")[0],$("#cbodistripacifuat")[0]);
                  });  
                  $("#cbodistripacifuat").keypress(function(e){
                      consutecla(e,$("#cbodistripacifuat")[0],$("#txtdirepacifuat")[0]);
                  });  
                  $("#txtdirepacifuat").keypress(function(e){
                      consutecla(e,$("#txtdirepacifuat")[0],$("#cbodepanacipacifuat")[0]);
                  });  
                  $("#cbodepanacipacifuat").keypress(function(e){
                      consutecla(e,$("#cbodepanacipacifuat")[0],$("#cboprovnacipacifuat")[0]);
                  });  
                  $("#cboprovnacipacifuat").keypress(function(e){
                      consutecla(e,$("#cboprovnacipacifuat")[0],$("#cbodistrinacipacifuat")[0]);
                  });  
                  $("#cbodistrinacipacifuat").keypress(function(e){
                      consutecla(e,$("#cbodistrinacipacifuat")[0],$("#cbopaisnacipacifuat")[0]);
                  }); 
                  $("#cbopaisnacipacifuat").keypress(function(e){
                      consutecla(e,$("#cbopaisnacipacifuat")[0],$("#txtservipacifuat")[0]);
                  }); 

                  /*
                  $("#txtrefepacifuat").keypress(function(e){
                      consutecla(e,$("#txtrefepacifuat")[0],$("#txtservipacifuat")[0]);
                  });
                  
                   $("#cboestaoripacifuat").keypress(function(e){
                      consutecla(e,$("#cboestaoripacifuat")[0],$("#cbotipodocuapofuat")[0]);
                  });  
                   */
                  $("#txtservipacifuat").keypress(function(e){
                      consutecla(e,$("#txtservipacifuat")[0],$("#cbopacifuat")[0]);
                  }); 
                  /*
                  $("#cbotipodocuapofuat").keypress(function(e){
                      consutecla(e,$("#cbotipodocuapofuat")[0],$("#txtnrodocuapofuat")[0]);
                  });

                  
                  $("#txtnrodocuapofuat").keypress(function(e){
                      consutecla(e,$("#txtnrodocuapofuat")[0],$("#txtnomapofuat")[0]);
                  });
                 
                  $("#txtfechanaciapofuat").keypress(function(e){txtcorreoapofuat
                      consutecla(e,$("#txtfechanaciapofuat")[0],$("#txtnomapofuat")[0]);
                  });  
                  */

                   
                  $("#cboapofuat").keypress(function(e){
                      consutecla(e,$("#cboapofuat")[0],$("#txtnomapofuat")[0]);
                  });

                  $("#txtnomapofuat").keypress(function(e){
                      consutecla(e,$("#txtnomapofuat")[0],$("#txtcorreoapofuat")[0]);
                  });  
                  /*
                  $("#txtapepatapofuat").keypress(function(e){
                      consutecla(e,$("#txtapepatapofuat")[0],$("#txtapematapofuat")[0]);
                  });  
                  $("#txtapematapofuat").keypress(function(e){
                      consutecla(e,$("#txtapematapofuat")[0],$("#txtcorreoapofuat")[0]);
                  });  
                  */
                  $("#txtcorreoapofuat").keypress(function(e){
                      consutecla(e,$("#txtcorreoapofuat")[0],$("#txtceluapofuat")[0]);
                  });  
                  $("#txtceluapofuat").keypress(function(e){
                      consutecla(e,$("#txtceluapofuat")[0],$("#txtteleapofuat")[0]);
                  });  
                  $("#txtteleapofuat").keypress(function(e){
                      consutecla(e,$("#txtteleapofuat")[0],$("#txtdniapepatmatnom")[0]);
                  });  
                  
                  $("#txtdniapepatmatnom").keypress(function(e){
                      consutecla(e,$("#txtdniapepatmatnom")[0],$("#txtapepatmatnomapofuat")[0]);
                  });  
                  $("#txtapepatmatnomapofuat").keypress(function(e){
                      consutecla(e,$("#txtapepatmatnomapofuat")[0],$("#textdetasolicita")[0]);
                  });  

                  $("#txtfechaini").keypress(function(e){
                      consutecla(e,$("#txtfechaini")[0],$("#txtfechafin")[0]);
                  }); 

                  $("#txtfechafin").keypress(function(e){
                      if (e.which == 13)
                      {

                       $("#btconsufuat").click(); 
                      }
                    
                  });  

                  

                 /*
                  $("#chkllamada1pacifuat").keypress(function(e){
                      consutecla(e,$("#chkllamada1pacifuat")[0],$("#chkaplipacifuat")[0]);
                  });  
                  
                  $("#chkaplipacifuat").keypress(function(e){
                      consutecla(e,$("#chkaplipacifuat")[0],$("#chkcelupacifuat")[0]);
                  });  
                  
                  $("#chkcelupacifuat").keypress(function(e){
                      consutecla(e,$("#chkcelupacifuat")[0],$("#chksiste1pacifuat")[0]);
                  });  
                  
                  $("#chksiste1pacifuat").keypress(function(e){
                      consutecla(e,$("#chksiste1pacifuat")[0],$("#chkcondifisipacifuat")[0]);
                  });  
                  
                  $("#chkcondifisipacifuat").keypress(function(e){
                      consutecla(e,$("#chkcondifisipacifuat")[0],$("#filedocu1")[0]);
                  });  
                  $("#filedocu1").keypress(function(e){
                      consutecla(e,$("#filedocu1")[0],$("#chkaceptapacifuat")[0]);
                  });  
*/
         
        $("#txtfechaini").keyup(function(e) 
                   { 

                    var valor="";
                     if ((e.which>=48 && e.which<=57) || (e.which>=96 && e.which<=105))
                        {    
                         if ($("#txtfechaini").prop("value").trim().length==2 || $("#txtfechaini").prop("value").trim().length==5)
                            {
                              valor=$("#txtfechaini").prop("value");
                              $("#txtfechaini").prop("value",valor+"/"); 
                            }
                        }
        });   

        $("#txtfechafin").keyup(function(e) 
                   { 

                    var valor="";
                     if ((e.which>=48 && e.which<=57) || (e.which>=96 && e.which<=105))
                        {    
                         if ($("#txtfechafin").prop("value").trim().length==2 || $("#txtfechafin").prop("value").trim().length==5)
                            {
                              valor=$("#txtfechafin").prop("value");
                              $("#txtfechafin").prop("value",valor+"/"); 
                            }
                        }
        });   
        


       $("#txtcorreoapofuat").change(function() {    
            alert("Esta escrito correctamente su Correo Electronico ?");
       });
       


       $('#filedocu1').change(function() { 
          $('#txtnomdocu1').prop('value','');
          if ($('#txtdnipacifuat').prop('value').length>0)
          {
           // alert($('#txtdnipacifuat').prop('value'));
           if($('#filedocu1')[0].files[0].size < 5242880)
              
              {
               
                  var formData = new FormData();
                  var nomdocu1 = '';
          //        nomdocu1=$('#txtdnipacifuat').prop('value')+'@'+dia+''+mes+''+anno+''+hor+''+min+''+seg+
          //'@@'+Math.random()+'@@@'+ $('#filedocu1').prop('value').split('\\').pop();

                  nomdocu1=$('#txtdnipacifuat').prop('value')+'@'+dia+''+mes+''+anno+''+hor+''+min+''+seg+
                           '@@'+Math.random()+'@@@'+ 'documento1.'+ $('#filedocu1').prop('value').slice(($('#filedocu1').prop('value').lastIndexOf(".") - 1 >>> 0) + 2);


                  formData.append('file',$('#filedocu1')[0].files[0]);
                  formData.append('nomarchi1',nomdocu1);
                  
                  $.ajax({
                    async:false, 
                    cache:false,
                      url: 'upload1.php',
                      type: 'post',
                      enctype:"multipart/form-data",
                      data: formData,
                      //data: {formData:formData,dni:dni},
                      contentType: false,
                      processData: false,
                      success: function(response) {
                          if (response != 0) {
                            //alert(response);
                              $("#iframedocu1").attr("src", response);
                              $('#txtnomdocu1').prop('value',nomdocu1);
                           // alert('bien');
                          } else {
                              //alert('Formato de imagen incorrecto.');
                              $('#divmensamosta').html('Formato de imagen incorrecto, Verifique ...');
                              $('#divventamensamosta').show();
                          }
                      }
                  });

              }
            else
              {
                  // alert("El documento excede el tamaño máximo, verifique ...");
                  $('#divmensamosta').html('El documento excede el tamaño máximo, verifique ...');
                  $('#divventamensamosta').show();
               }
              
            }
          else
            {
                  //alert('ingrese el Dni del Paciente, Verifique ...');
                  $('#divmensamosta').html('Ingrese el Dni del Paciente, Verifique ...');
                  $('#divventamensamosta').show();
             }


       });


        $('#filedocu2').change(function() { 
            $('#txtnomdocu2').prop('value','');
            if ($('#txtdnipacifuat').prop('value').length>0)
            {
             if($('#filedocu2')[0].files[0].size < 5242880)
                
                {
                    var formData2 = new FormData();
                    var nomdocu2 = '';
                    //nomdocu2=$('#txtdnipacifuat').prop('value')+'@'+dia+''+mes+''+anno+''+hor+''+min+''+seg+
            //'@@'+Math.random()+'@@@'+ $('#filedocu2').prop('value').split('\\').pop();
                     nomdocu2=$('#txtdnipacifuat').prop('value')+'@'+dia+''+mes+''+anno+''+hor+''+min+''+seg+
                           '@@'+Math.random()+'@@@'+ 'documento2.'+ $('#filedocu2').prop('value').slice(($('#filedocu2').prop('value').lastIndexOf(".") - 1 >>> 0) + 2);


                    formData2.append('file',$('#filedocu2')[0].files[0]);
                    formData2.append('nomarchi2',nomdocu2);
                    
                    $.ajax({
                      async:false, 
                      cache:false,
                        url: 'upload2.php',
                        type: 'post',
                        enctype:"multipart/form-data",
                        data: formData2,
                        //data: {formData:formData,dni:dni},
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response != 0) {
                                $("#iframedocu2").attr("src", response);
                                $('#txtnomdocu2').prop('value',nomdocu2);
                             // alert('bien');
                            } else {
                                //alert('Formato de imagen incorrecto.');
                                $('#divmensamosta').html('Formato de imagen incorrecto, Verifique ...');
                                $('#divventamensamosta').show();
                            }
                        }
                    });

                }
              else
                {
                      //alert("El documento excede el tamaño máximo, verifique ...");
                      $('#divmensamosta').html('El documento excede el tamaño máximo, verifique ...');
                      $('#divventamensamosta').show();
                 }
                
              }
            else
              {
                    //  alert('ingrese el Dni del Paciente, Verifique ...');
                    $('#divmensamosta').html('Ingrese el Dni del Paciente, Verifique ...');
                    $('#divventamensamosta').show();
               }


         });





                  $('#txtfechanacipacifuat').keyup(function(e) 
                   { 

                    var valor='';
                    //valor=$('#txtfechanacipacifuat').prop('value').trim().length;
                     //       alert(valor);

                     if ((e.which>=48 && e.which<=57) || (e.which>=96 && e.which<=105))
                        {    
                         if ($('#txtfechanacipacifuat').prop('value').trim().length==2 || $('#txtfechanacipacifuat').prop('value').trim().length==5)
                            {
                              valor=$('#txtfechanacipacifuat').prop('value');
                              $('#txtfechanacipacifuat').prop('value',valor+'/'); 
                            }
                            //edad
                            if($('#txtopcfuat').prop('value')=='I' && $('#txtfechanacipacifuat').prop('value').trim().length==10)
                            { 
                              $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtfechanacipacifuat').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consuedadpacifuat'}, type : 'POST',dataType : 'json',success : function(data)
                                        {  
                                            $.each(data, function(i){
                                               $('#txtedadpacifuat').prop('value',data[i].edad);

                                            });
                                        },
                                        error : function(xhr, status) {},
                                        complete : function(xhr, status) {}
                                      }); 
                            }
                        }

                    
                  });  

/*
                   $('#txtfechanacipacifuat').keypress(function(e) 
                    {

                       if (e.which==13)
                         {
                         
                             $('#btconsupacifuat').click();  
                            
                         }
                  });
*/

                  
                  $('#cbotipodocupacifuat').change(function() {  
                    


                    if ($('#cbotipodocupacifuat').prop('value')=='1') //dni
                     {
//                      alert($('#cbotipodocupacifuat').prop('value'));

                       $('#txtdnipacifuat').prop('value','');
                       $('#txtdnipacifuat').prop('readonly',false);

                       $('#txtfechanacipacifuat').prop('value','');
                       $('#txtfechanacipacifuat').prop('readonly',false);

                       $('#txtapepatpacifuat').prop('value','');
                       $('#txtapepatpacifuat').prop('readonly',false);

                       $('#txtapematpacifuat').prop('value','');
                       $('#txtapematpacifuat').prop('readonly',false);

                       $('#txtnompacifuat').prop('value','');
                       $('#txtnompacifuat').prop('readonly',false);

                       $('#cbosexopacifuat').prop('value','-1');
                       //$('#cbosexopacifuat').prop('readonly',true);
                       $('#cbosexopacifuat').prop('disabled',false);

                       $('#txtedadpacifuat').prop('value','');
                       $('#txtedadpacifuat').prop('readonly',false);

                       

                       $('#btconsupacifuat').prop('disabled',true);
                     } 
                    else if ($('#cbotipodocupacifuat').prop('value')=='2') //extranjeria
                     {
                       $('#txtdnipacifuat').prop('value','');
                       $('#txtdnipacifuat').prop('readonly',false);

                       $('#txtfechanacipacifuat').prop('value','');
                       $('#txtfechanacipacifuat').prop('readonly',false);


                       $('#txtapepatpacifuat').prop('value','');
                       $('#txtapepatpacifuat').prop('readonly',false);

                       $('#txtapematpacifuat').prop('value','');
                       $('#txtapematpacifuat').prop('readonly',false);

                       $('#txtnompacifuat').prop('value','');
                       $('#txtnompacifuat').prop('readonly',false);

                       $('#cbosexopacifuat').prop('value','-1');
                       //$('#cbosexopacifuat').prop('readonly',false);
                       $('#cbosexopacifuat').prop('disabled',false);

                       $('#txtedadpacifuat').prop('value','');
                       $('#txtedadpacifuat').prop('readonly',false);

                       $('#btconsupacifuat').prop('disabled',true);

                     } 
                    else if ($('#cbotipodocupacifuat').prop('value')=='3') //sin documento
                     {
                       //$('#txtdnipacifuat').prop('value','S/N');
                       $('#txtdnipacifuat').prop('value','SN');
                       $('#txtdnipacifuat').prop('readonly',true);

                       $('#txtfechanacipacifuat').prop('value','');
                       $('#txtfechanacipacifuat').prop('readonly',false);

                       $('#txtapepatpacifuat').prop('value','');
                       $('#txtapepatpacifuat').prop('readonly',false);

                       $('#txtapematpacifuat').prop('value','');
                       $('#txtapematpacifuat').prop('readonly',false);

                       $('#txtnompacifuat').prop('value','');
                       $('#txtnompacifuat').prop('readonly',false);

                       $('#cbosexopacifuat').prop('value','-1');
                       //$('#cbosexopacifuat').prop('readonly',false);
                       $('#cbosexopacifuat').prop('disabled',false);

                       $('#txtedadpacifuat').prop('value','');
                       $('#txtedadpacifuat').prop('readonly',false);

                       $('#btconsupacifuat').prop('disabled',true);
                       
                     } 

                    else if ($('#cbotipodocupacifuat').prop('value')=='4') //hc
                     {
//                      alert($('#cbotipodocupacifuat').prop('value'));

                       $('#txtdnipacifuat').prop('value','');
                       $('#txtdnipacifuat').prop('readonly',false);

                       $('#txtfechanacipacifuat').prop('value','');
                       $('#txtfechanacipacifuat').prop('readonly',false);

                       $('#txtapepatpacifuat').prop('value','');
                       $('#txtapepatpacifuat').prop('readonly',false);

                       $('#txtapematpacifuat').prop('value','');
                       $('#txtapematpacifuat').prop('readonly',false);

                       $('#txtnompacifuat').prop('value','');
                       $('#txtnompacifuat').prop('readonly',false);

                       $('#cbosexopacifuat').prop('value','-1');
                       //$('#cbosexopacifuat').prop('readonly',true);
                       $('#cbosexopacifuat').prop('disabled',false);

                       $('#txtedadpacifuat').prop('value','');
                       $('#txtedadpacifuat').prop('readonly',false);

                       

                       $('#btconsupacifuat').prop('disabled',true);
                     } 


                    });  


                    $('#txtdnipacifuat').keyup(function(event) { 
                                if ( ($('#txtdnipacifuat').prop('value').trim().length==8 && $('#cbotipodocupacifuat').prop("value").trim()=="1") || 
                                     ($('#txtdnipacifuat').prop('value').trim().length>=6 && $('#cbotipodocupacifuat').prop("value").trim()=="4") )
                                {


                                    //event.preventDefault();

                                                  $('#txtapepatpacifuat').prop('value','');
                                                  $('#txtapematpacifuat').prop('value','');
                                                  $('#txtfechanacipacifuat').prop('value','');
                                                  $('#txtdirepacifuat').prop('value','');
                                                  $('#txtedadpacifuat').prop('value','');
                                                  $('#cbodepapacifuat').empty();
                                                  $('#cbosexopacifuat').prop('value','');
                                                  $('#cbodistripacifuat').empty();
                                                  $('#cbodistripacifuat').prop('value','');
                                                  $('#txtnompacifuat').prop('value','');
                                                  
                                                  $('#cboprovpacifuat').empty();
                                                  //$('#cbotipodocuapofuat').prop('value','');
                                                  //$('#txtnrodocuapofuat').prop('value','');
                                                  $('#cboapofuat').prop('value','');
                                                  

                                                // $('#txtapepatapofuat').prop('value','');  
                                                // $('#txtapematapofuat').prop('value','');  
                                                  $('#txtnomapofuat').prop('value','');  
                                                  $('#txtcorreoapofuat').prop('value','');  
                                                  $('#txtteleapofuat').prop('value','');  
                                                  $('#txtceluapofuat').prop('value','');  
                                                  $('#cbodepanacipacifuat').empty();
                                                  $('#cboprovnacipacifuat').empty();
                                                  $('#cbodistrinacipacifuat').empty();
                                                  $('#txtapepatmatnomapofuat').prop('value','');  
                                                  $('#cbopaisnacipacifuat').empty();


                                    cadena1= $('#txtdnipacifuat').prop("value");
                                    cadena2= $('#cbotipodocupacifuat').prop("value");
                                    
                                    $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:cadena2, opc1:'fuat', opc2 : 'consudnifuat'}, type : 'POST',dataType : 'json',success : function(data)
                                      {  
                                          $.each(data, function(i){
                                           
                                                  $('#txtapepatpacifuat').prop('value',data[i].apepatpaci.trim());
                                                  $('#txtapematpacifuat').prop('value',data[i].apematpaci.trim());
                                                  $('#txtfechanacipacifuat').prop('value',data[i].fechanacipaci.trim());
                                                  $('#txtdirepacifuat').prop('value',data[i].direpaci.trim());
                                                  $('#txtedadpacifuat').prop('value',data[i].edadpaci.trim());
                                                  
      
                                                  $('#cbodepapacifuat').empty();
                                                  $('#cbodepapacifuat').append($('<option>', {
                                                      value: data[i].codidepapaci.trim(),
                                                      text: data[i].descdepapaci.trim()
                                                  }));
                                                  

                                                  $('#cbodepapacifuat').prop('value',data[i].codidepapaci.trim());
                                                  $('#cbosexopacifuat').prop('value',data[i].sexopaci.trim());
                                                  

                                                  $('#cbodistripacifuat').empty();
                                                  $('#cbodistripacifuat').append($('<option>', {
                                                    value: data[i].codidistripaci.trim(),
                                                    text: data[i].descdistripaci.trim()
                                                  }));
                                                  $('#cbodistripacifuat').prop('value',data[i].codidistripaci.trim());

                                                  $('#txtnompacifuat').prop('value',data[i].nompaci.trim());
                                                  
                                                  $('#cboprovpacifuat').empty();
                                                  $('#cboprovpacifuat').append($('<option>', {
                                                    value: data[i].codiprovpaci.trim(),
                                                    text: data[i].descprovpaci.trim()
                                                  }));
                                                  $('#cboprovpacifuat').prop('value',data[i].codiprovpaci);

                                                  //$('#cbotipodocuapofuat').prop('value',data[i].tipodocuapo.trim());
                                                  //$('#txtnrodocuapofuat').prop('value',data[i].nrodocuapo.trim());
                                                  $('#cboapofuat').prop('value',data[i].tipoapo.trim());
                                                  $("#cboapofuat").change();

                                                  //$('#txtapepatapofuat').prop('value',data[i].apepatapo.trim());  
                                                  //$('#txtapematapofuat').prop('value',data[i].apematapo.trim());  
                                                  $('#txtnomapofuat').prop('value',data[i].nomcompleapo.trim());  
                                                  $('#txtcorreoapofuat').prop('value',data[i].correoapo.trim());  
                                                  $('#txtteleapofuat').prop('value',data[i].teleapo.trim());  
                                                  $('#txtceluapofuat').prop('value',data[i].celuapo.trim());  
                                                  $('#cbodepanacipacifuat').empty();
                                                  $('#cbodepanacipacifuat').append($('<option>', {
                                                    value: data[i].codidepanacipaci.trim(),
                                                    text: data[i].descdepanacipaci.trim()
                                                  }));
                                                  $('#cbodepanacipacifuat').prop('value',data[i].codidepanacipaci.trim());

                                                  $('#cboprovnacipacifuat').empty();
                                                  $('#cboprovnacipacifuat').append($('<option>', {
                                                    value: data[i].codiprovnacipaci.trim(),
                                                    text: data[i].descprovnacipaci.trim()
                                                  }));
                                                  $('#cboprovnacipacifuat').prop('value',data[i].codiprovnacipaci.trim());

                                                  $('#cbodistrinacipacifuat').empty();
                                                  $('#cbodistrinacipacifuat').append($('<option>', {
                                                    value: data[i].codidistrinacipaci.trim(),
                                                    text: data[i].descdistrinacipaci.trim()
                                                  }));
                                                  $('#cbodistrinacipacifuat').prop('value',data[i].codidistrinacipaci.trim());

                                                  $('#txtapepatmatnomapofuat').prop('value',data[i].apepatmatnomapo.trim());  

                                                  $('#cbopaisnacipacifuat').empty();
                                                  $('#cbopaisnacipacifuat').append($('<option>', {
                                                      value: data[i].codipaispaci.trim(),
                                                      text: data[i].descpaispaci.trim()
                                                    }));
                                                  $('#cbopaisnacipacifuat').prop('value',data[i].codipaispaci.trim());

                                                // $('#txtdniapepatmatnomapofuat').prop('value',data[i].dniapepatmatnomapo.trim());  
                                           


                                            
                                          });
                                      },
                                      error : function(xhr, status) {},
                                      complete : function(xhr, status) {}
                                    }); 
                                  }
                                else
                                  {
                                            $('#txtapepatpacifuat').prop('value','');
                                            $('#txtapematpacifuat').prop('value','');
                                            $('#txtfechanacipacifuat').prop('value','');
                                            $('#txtdirepacifuat').prop('value','');
                                            $('#txtedadpacifuat').prop('value','');
                                            $('#cbodepapacifuat').empty();
                                            $('#cbosexopacifuat').prop('value','');
                                            $('#cbodistripacifuat').empty();
                                            $('#cbodistripacifuat').prop('value','');
                                            $('#txtnompacifuat').prop('value','');
                                            
                                            $('#cboprovpacifuat').empty();
                                            //$('#cbotipodocuapofuat').prop('value','');
                                            //$('#txtnrodocuapofuat').prop('value','');
                                            $('#cboapofuat').prop('value','');
                                            

                                           // $('#txtapepatapofuat').prop('value','');  
                                           // $('#txtapematapofuat').prop('value','');  
                                            $('#txtnomapofuat').prop('value','');  
                                            $('#txtcorreoapofuat').prop('value','');  
                                            $('#txtteleapofuat').prop('value','');  
                                            $('#txtceluapofuat').prop('value','');  
                                            $('#cbodepanacipacifuat').empty();
                                            $('#cboprovnacipacifuat').empty();
                                            $('#cbodistrinacipacifuat').empty();
                                            $('#txtapepatmatnomapofuat').prop('value','');  
                                            $('#cbopaisnacipacifuat').empty();
                                           // $('#txtdniapepatmatnomapofuat').prop('value','');  
                                  }
                         });
                    

                  $('#btconsupacifuat').click(function() {  

                    // $('#txtedadpacifuat').prop('value','20');

                    var depa='';

                    $('#btconsupacifuat').find('i').toggleClass('fa-refresh fa-spin').toggleClass('fa-search');

                     if ($('#txtdnipacifuat').prop('value').length==0)
                     {
                        //alert('Ingrese correctamente el Nro del DNI, Verifique ...');
                        $('#divmensamosta').html('Ingrese correctamente el Nro del DNI, Verifique ...');
                        $('#divventamensamosta').show();
                        $('#txtdnipacifuat').focus();

                     }
                     else if ($('#txtfechanacipacifuat').prop('value').length==0)
                     {
                        //alert('Ingrese correctamente la Fecha de Nacimiento, Verifique ...');
                        $('#divmensamosta').html('Ingrese correctamente la Fecha de Nacimiento, Verifique ...');
                        $('#divventamensamosta').show();
                        $('#txtfechanacipacifuat').focus();  
                     }
                     else 
                        {

                         // var fechanacipaci='';
                          var error='';
                         // fechanacipaci=$("#txtfechanacipacifuat").prop("value").trim();

                          $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtfechanacipacifuat').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consufechanacifuat'}, type : 'POST',dataType : 'json',success : function(data)
                            {  
                                $.each(data, function(i){
                                  error=data[i].error;
                                });
                            },
                            error : function(xhr, status) {},
                            complete : function(xhr, status) {}
                          }); 


                          if (error=='1')
                              {
                                  //alert("Ingrese Correctamente la Fecha de Nacimiento, Verifique ...");
                                  $('#divmensamosta').html('Ingrese Correctamente la Fecha de Nacimiento, Verifique ...');
                                  $('#divventamensamosta').show();
                                  $('#txtfechanacipacifuat').focus();  
                              }
                          else if (error=='2')
                              {
                                  //alert("Fecha de Nacimiento pertenece a Paciente mayor de Edad, Verifique ...");
                                  $('#divmensamosta').html('Fecha de Nacimiento pertenece a Paciente mayor de Edad, Verifique ...');
                                  $('#divventamensamosta').show();
                                  $('#txtfechanacipacifuat').focus();  
                              }
                          else if (error=='0')
                            {
            

                         
                                $('#txtapepatpacifuat').prop('value','');
                                $('#txtapematpacifuat').prop('value','');
                                $('#txtnompacifuat').prop('value','');
                                $('#cbosexopacifuat').prop('selected','-1');
                                $('#cbodepapacifuat').prop('selected','-1');
                                $('#cboprovpacifuat').prop('selected','-1');
                                $('#cbodistripacifuat').prop('selected','-1');
                                $('#txtdirepacifuat').prop('value','');

                                 var fechanacipaci='';
                                 var apepatpaci='';
                                 var apematpaci='';
                                 var nompaci='';
                                 var sexo='';
                                 var dire='';
                                 var depa='';
                                 var prov='';
                                 var distri='';
                                 
                                 // consulta de datos del paciente con filtro del dni y fecha de nacimiento
                                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtdnipacifuat').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consupacifuat'}, type : 'POST',dataType : 'json',success : function(data)
                                  {  
                                      $.each(data, function(i){
                                         apepatpaci=data[3].replace('<\/string>',"").replace('<string>',"");
                                         apematpaci=data[4].replace('<\/string>',"").replace('<string>',"");
                                         nompaci=data[5].replace('<\/string>',"").replace('<string>',"");
                                         sexo=data[19].replace('<\/string>',"").replace('<string>',"");
                                         dire=data[18].replace('<\/string>',"").replace('<string>',"");
                                         fechanacipaci=data[20].replace('<\/string>',"").replace('<string>',"");

                                         depa=data[14].replace('<\/string>',"").replace('<string>',"");
                                         prov=data[15].replace('<\/string>',"").replace('<string>',"");
                                         distri=data[16].replace('<\/string>',"").replace('<string>',"");

 
                                      });
                                  },
                                  error : function(xhr, status) {},
                                  complete : function(xhr, status) {}
                                }); 


                                if ($('#txtfechanacipacifuat').prop('value').trim()!=fechanacipaci.trim())
                                  {
                                    //alert('la Fecha de Nacimiento no pertenece al Paciente, Verifique ...')
                                    $('#divmensamosta').html('la Fecha de Nacimiento no pertenece al Paciente, Verifique ...');
                                    $('#divventamensamosta').show();
                                      
                                  }
                                else
                                  {
                                    $('#txtapepatpacifuat').prop('value',apepatpaci);
                                    $('#txtapematpacifuat').prop('value',apematpaci);
                                    $('#txtnompacifuat').prop('value',nompaci);

                                    $('#cbosexopacifuat').prop('disabled',false);
                                    $('#cbosexopacifuat').prop('value',sexo);
                                    $('#cbosexopacifuat').prop('disabled',true);

                                    $('#txtdirepacifuat').prop('value',dire);

                                    // consulta de departamento y filtro segun nombre del departamento
                                    if (depa.trim().length>0)
                                     {
                                        var codidepa='';
                                        $('#cbodepapacifuat').focus();
                                        $("#cbodepapacifuat option").each(function(){
                                          if ($(this).text()==depa)
                                          {
                                            codidepa=$(this).attr('value');
                                            // alert('opcion '+$(this).text()+' valor '+ $(this).attr('value'));
                                          }
                                        });
                                        $('#cbodepapacifuat').prop('value',codidepa);

                                        // consulta de provincia y filtro segun nombre de la provincia
                                        if (prov.trim().length>0)
                                          {
                                            var codiprov='';
                                            $('#cboprovpacifuat').focus();
                                            $("#cboprovpacifuat option").each(function(){
                                              if ($(this).text()==prov)
                                              {
                                                codiprov=$(this).attr('value');
                                              }
                                            });
                                            $('#cboprovpacifuat').prop('value',codiprov);
                                            
                                            // consulta de distrito y filtro segun nombre del distrito
                                            if (distri.trim().length>0)
                                              {
                                                var codidistri='';
                                                $('#cbodistripacifuat').focus();
                                                $("#cbodistripacifuat option").each(function(){
                                                  if ($(this).text()==distri)
                                                  {
                                                    codidistri=$(this).attr('value');
                                                  }
                                                });
                                                $('#cbodistripacifuat').prop('value',codidistri);
                                              }

                                          }
                                       }
                             

                                      //consulta de codigo de establecimiento sis desde service web
                                      var codiestaorisisfuat='';
                                      var tipopacisisfuat='';
                                      $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtdnipacifuat').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consuestaorisisfuat'}, type : 'POST',dataType : 'json',success : function(data)
                                        {  
                                            $.each(data, function(i){
                                              codiestaorisisfuat=data[10].replace('<\/string>',"").replace('<string>',"");
                                              tipopacisisfuat=data[19].replace('<\/string>',"").replace('<string>',"");
                                              

                                            });
                                        },
                                        error : function(xhr, status) {},
                                        complete : function(xhr, status) {}
                                      }); 
                                      //
                                      //  alert(codiestaorisisfuat);
                                     //consulta de establecimiento de salud con el filtro de codigo sis
                                     /*
                                     if (codiestaorisisfuat.trim().length>0)
                                        {
                         
                                          var codiestafuat='';
                                        //('#cboestaoripacifuat').empty().append("<option value='' selected='true'></option>");
                                          $('#txtrefepacifuat').prop("value","");
                                          $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:codiestaorisisfuat, cade2:'', opc1:'fuat', opc2 : 'consuestaori'}, type : 'POST',dataType : 'json',success : function(data)
                                            {  
                                                $.each(data, function(i){
                                                  //odiestafuat=data[i].codiestaori;
                                                  //('#cboestaoripacifuat').append("<option value="+data[i].codiestaori+">" + data[i].descestaori+ " - " + data[i].dptoestaori+ " - " + data[i].provestaori+ " - " + data[i].distriestaori +"</option>");
                                                    $('#txtrefepacifuat').prop("value",data[i].descestaori);
                                                });
                                            },
                                            error : function(xhr, status) {},
                                            complete : function(xhr, status) {}
                                          }); 
                                          //('#cboestaoripacifuat').prop('value',codiestafuat);

                                          //('#cbotipodocuapofuat').focus();
                                           $('#txtrefepacifuat').focus();
                                           
                                       }
                                       */
                        
                                       if (tipopacisisfuat.trim()=='ACTIVO')
                                        {
                                            $('#cbotipopacifuat').prop('value','2');   
                                        }
                                        else
                                        {
                                           $('#cbotipopacifuat').prop('value','');   
                                        }
                                      //

                                      ////
                                      
                                      $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtfechanacipacifuat').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consuedadpacifuat'}, type : 'POST',dataType : 'json',success : function(data)
                                        {  
                                            $.each(data, function(i){
                                               $('#txtedadpacifuat').prop('value',data[i].edad);

                                            });
                                        },
                                        error : function(xhr, status) {},
                                        complete : function(xhr, status) {}
                                      }); 
                                      ////



                                  }

                           }
                        
                      }

                      $('#btconsupacifuat').find('i').toggleClass('fa-search').toggleClass('fa-refresh  fa-spin');

                  });


              $("#cboapofuat").change(function() { 
                 if ($("#cboapofuat").prop('value')=='1')
                   {
                    //$("#lbldniapepatmatnom").html('DNI DEL PADRE<span class="color-rojo"> (*)</span>');   
                    $("#lblapepatmatnom").html('APELLIDOS, NOMBRE(S) Y DNI DEL PADRE<span class="color-rojo"> (*)</span>');   
                   }
                  else if ($("#cboapofuat").prop('value')=='2')
                   {
                    //$("#lbldniapepatmatnom").html('DNI DE LA MADRE<span class="color-rojo"> (*)</span>');   
                    $("#lblapepatmatnom").html('APELLIDOS, NOMBRE(S) Y DNI DEL MADRE<span class="color-rojo"> (*)</span>');   
                   }
                  else if ($("#cboapofuat").prop('value')=='3')
                   {
                    //$("#lbldniapepatmatnom").html('DNI DE PADRE Y DE MADRE<span class="color-rojo"> (*)</span>');   
                    $("#lblapepatmatnom").html('APELLIDOS, NOMBRE(S) Y DNI DEL PADRE Y/O MADRE<span class="color-rojo"> (*)</span>');   
                   }
                });

              /*
              $("#cbotipodocuapofuat").change(function() { 
                if ($('#cbotipodocuapofuat').prop('value')=='1') //dni
                  {
                       $('#txtnomapofuat').prop('value','');
                       $('#txtnomapofuat').prop('readonly',false);
                       $('#txtapepatapofuat').prop('value','');
                       $('#txtapepatapofuat').prop('readonly',false);
                       $('#txtapematapofuat').prop('value','');
                       $('#txtapematapofuat').prop('readonly',false);
                      
                       $('#txtcorreoapofuat').prop('value','');
                       $('#txtteleapofuat').prop('value','');
                       $('#txtceluapofuat').prop('value','');
                       $('#txtdniapepatmatnomapofuat').prop('value','');
                       $('#txtapepatmatnomapofuat').prop('value','');
                       $('#textdetasolicita').prop('value','');
                  }
                  else if ($('#cbotipodocuapofuat').prop('value')=='2') //carnet de extranjeria
                  {
                       $('#txtnomapofuat').prop('value','');
                       $('#txtnomapofuat').prop('readonly',false);
                      
                       $('#txtapepatapofuat').prop('value','');
                       $('#txtapepatapofuat').prop('readonly',false);
                       $('#txtapematapofuat').prop('value','');
                       $('#txtapematapofuat').prop('readonly',false);
                      
                       $('#txtcorreoapofuat').prop('value','');
                       $('#txtteleapofuat').prop('value','');
                       $('#txtceluapofuat').prop('value','');
                       $('#txtdniapepatmatnomapofuat').prop('value','');
                       $('#txtapepatmatnomapofuat').prop('value','');
                       $('#textdetasolicita').prop('value','');
                  }

                  });
                  */

  /*              
                  $('#txtnrodocuapofuat').keypress(function(e) 
                    {

                       if (e.which==13)
                         {
                         
                             $('#btconsuapofuat').click();  

                         }
                  });  
*/


/*
                  $("#btconsuapofuat").click(function() { 

                     $('#btconsuapofuat').find('i').toggleClass('fa-refresh  fa-spin').toggleClass('fa-search'); 
                     
                     if ($("#txtnrodocuapofuat").prop("value").length>0)
                        {
                         
                          $("#txtapepatapofuat").prop("value","");
                          $("#txtapematapofuat").prop("value","");
                         
                          $("#txtnomapofuat").prop("value","");

                         


                          cadena1=$("#txtnrodocuapofuat").prop("value").trim();
                          cadena2='';
                  
                          $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consuapofuat'}, type : 'POST',dataType : 'json',success : function(data)
                            {  
                                $.each(data, function(i){
       
                            //   alert(data["name"]);
                                  
                           //    alert(data[9]);
            

                                   //$("#txtapepatpacifuat").prop("value",data[3].replace('<\/string>',"").replace('<string>',"")+" "+data[4].replace('<\/string>',"").replace('<string>',"")+" "+data[5].replace('<\/string>',"").replace('<string>',""));

                                 
                                   $("#txtapepatapofuat").prop("value",data[3].replace('<\/string>',"").replace('<string>',""));
                                   $("#txtapematapofuat").prop("value",data[4].replace('<\/string>',"").replace('<string>',""));
                                 
                                   $("#txtnomapofuat").prop("value",data[5].replace('<\/string>',"").replace('<string>',""));
                                  
                                   
                                   fechanaciapofuat=data[20].replace('<\/string>',"").replace('<string>',"")
                                    //  alert(fechatelefuat);
                    
                                      <?php
                                            if ($fnavegador['nombre']=='Google Chrome' )
                                              {
                                            ?>   
                                                //convert formato de fecha a yyyy-MM-DD
                                                $('#txtfechanaciapofuat').val(fechanaciapofuat.trim().substring(6,10)+'-'+fechanaciapofuat.trim().substring(3,5)+'-'+fechanaciapofuat.trim().substring(0,2));
                                            <?php
                                              }
                                            else 
                                              {   
                                            ?>   
                                                $('#txtfechanaciapofuat').val(fechanaciapofuat);
                                      <?php } ?>   
                                   

                                    // $("#txtfechanaciapofuat").prop("value",data[20].replace('<\/string>',"").replace('<string>',""));

                                });
                            },
                            error : function(xhr, status) {},
                            complete : function(xhr, status) {}
                          }); 
                        }

                        $('#btconsuapofuat').find('i').toggleClass('fa-search').toggleClass('fa-refresh  fa-spin');   
                  });
                  */




           //combos

            $('#cbodepanacipacifuat').focus(function () {
            
                cadena1='';
                cadena2='';
                
                $('#cbodepanacipacifuat').empty().append("<option value='' selected='true'></option>");
                $('#cboprovnacipacifuat').empty().append("<option value='' selected='true'></option>");
                $('#cbodistrinacipacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consudepa'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cbodepanacipacifuat').append("<option value="+data[i].codidepa+">" + data[i].descdepa  +"</option>");
                      });
                  },
                  error : function(xhr, status) {
                   // alert("aa");
                  },
                  complete : function(xhr, status) {}
                }); 
            });    

            $('#cbodepanacipacifuat').change(function () {
            
              cadena1='';
              cadena2='';
              
              if ($('#cbodepanacipacifuat').prop('value')=='900000') //extranjero
                 {
                  cadena1='';
                 }
                 else
                 {
                  cadena1='159'; //peru
                 }

              $('#cbopaisnacipacifuat').empty().append("<option value='' selected='true'></option>");
              $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consupais'}, type : 'POST',dataType : 'json',success : function(data)
                {  
                    $.each(data, function(i){
                      $('#cbopaisnacipacifuat').append("<option value="+data[i].codipais+">" + data[i].descpais  +"</option>");
                    });
                },
                error : function(xhr, status) {
                
                },
                complete : function(xhr, status) {}
              }); 

              if ($('#cbodepanacipacifuat').prop('value')!='900000') //peru
                 {
                  $('#cbopaisnacipacifuat').prop('value','159')
                 }



            });    

            


            $('#cboprovnacipacifuat').focus(function () {
            
                cadena1= $('#cbodepanacipacifuat').prop("value");
                cadena2='';
                
                $('#cboprovnacipacifuat').empty().append("<option value='' selected='true'></option>");
                $('#cbodistrinacipacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consuprov'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cboprovnacipacifuat').append("<option value="+data[i].codiprov+">" + data[i].descprov  +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });

            $('#cbodistrinacipacifuat').focus(function () {
            
                cadena1= $('#cboprovnacipacifuat').prop("value");
                cadena2='';
                
                $('#cbodistrinacipacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consudistri'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cbodistrinacipacifuat').append("<option value="+data[i].codidistri+">" + data[i].descdistri  +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });    


      
            $('#cbodepapacifuat').focus(function () {
            
                cadena1='';
                cadena2='';
                
                $('#cbodepapacifuat').empty().append("<option value='' selected='true'></option>");
                $('#cboprovpacifuat').empty().append("<option value='' selected='true'></option>");
                $('#cbodistripacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consudepa'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cbodepapacifuat').append("<option value="+data[i].codidepa+">" + data[i].descdepa  +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });       

            $('#cboprovpacifuat').focus(function () {
            
                cadena1= $('#cbodepapacifuat').prop("value");
                cadena2='';
                
                $('#cboprovpacifuat').empty().append("<option value='' selected='true'></option>");
                $('#cbodistripacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consuprov'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cboprovpacifuat').append("<option value="+data[i].codiprov+">" + data[i].descprov  +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });       

            $('#cbodistripacifuat').focus(function () {
            
                cadena1= $('#cboprovpacifuat').prop("value");
                cadena2='';
                
                $('#cbodistripacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consudistri'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cbodistripacifuat').append("<option value="+data[i].codidistri+">" + data[i].descdistri  +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });    

            
             $('#txtservipacifuat').focus(function () {
                $('#mensacupo').hide();
                $('#mensaservi').hide();
                $('#mensamediservi').hide();
                
                $('#txtservipacifuat').empty().append("<option value='' selected='true'></option>");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:'', cade2:'', opc1:'fuat', opc2 : 'consuservifuat'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#txtservipacifuat').append("<option value="+data[i].codiservi+">" + data[i].descservi +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });   

            $('#cbomediservifuat').focus(function () {
                
                $('#cbomediservifuat').empty().append("<option value='' selected='true'></option>");
                cadena=$('#txtservipacifuat').prop("value");
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena, cade2:'', opc1:'fuat', opc2 : 'consumediservifuat'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#cbomediservifuat').append("<option value="+data[i].codimedi+">" + data[i].nomcomplemedi +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
            });   

             $('#txtservipacifuat').change(function () {

              $('#cbotipopacifuat').prop('disabled',false);
              $('#cbotipopacifuat').prop('value','');
              $('#cbomediservifuat').prop('value','');

               $('#mensacupo').hide();
               $('#mensaservi').hide();
               $('#mensamediservi').hide();
               
                var moda='';
                var nuevo='';
                cupos=false;
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtservipacifuat').prop('value'), cade2:'', opc1:'fuat', opc2 : 'consumodafuat'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                       moda=data[i].Moda;
                       nuevo=data[i].Nuevo;
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                });

               
                 //if (  $('#txtservipacifuat').prop('value')=='151002'  || $('#txtservipacifuat').prop('value')=='150801'  || $('#txtservipacifuat').prop('value')=='150821' || $('#txtservipacifuat').prop('value')=='150822'  || $('#txtservipacifuat').prop('value')=='150823'  || $('#txtservipacifuat').prop('value')=='150904'  || $('#txtservipacifuat').prop('value')=='150815'  || $('#txtservipacifuat').prop('value')=='150903'  || $('#txtservipacifuat').prop('value')=='150806'  || $('#txtservipacifuat').prop('value')=='150907'   || $('#txtservipacifuat').prop('value')=='150811'  || $('#txtservipacifuat').prop('value')=='150813' || $('#txtservipacifuat').prop('value')=='150808' || $('#txtservipacifuat').prop('value')=='150812' ) //psico,pediatria,asma,alergia,inmunologia,oftalmologia,reuma,urologia,cardio,cirugia plastica,nefro,neonato,endo,derma     todos
                 if (moda=='0') //todos
                 {
                    cupos=true;
                    $('#cbomodasolipacifuat').prop('disabled',false);
                 }
                 //else if ($('#txtservipacifuat').prop('value')=='151110' || $('#txtservipacifuat').prop('value')=='151001' || $('#txtservipacifuat').prop('value')=='151305' || $('#txtservipacifuat').prop('value')=='150908'  || $('#txtservipacifuat').prop('value')=='150901'  || $('#txtservipacifuat').prop('value')=='150909'  || $('#txtservipacifuat').prop('value')=='150206'  || $('#txtservipacifuat').prop('value')=='150819'  || $('#txtservipacifuat').prop('value')=='150811'  || $('#txtservipacifuat').prop('value')=='150813'  || $('#txtservipacifuat').prop('value')=='150905'  || $('#txtservipacifuat').prop('value')=='150004' || $('#txtservipacifuat').prop('value')=='150906'  || $('#txtservipacifuat').prop('value')=='150911' || $('#txtservipacifuat').prop('value')=='150805' || $('#txtservipacifuat').prop('value')=='150809' ) //orl,gine,psiquiatria,oncologia,cirugia cabeza cuello,cirugia general,cirugia torax,genetica,mediadolescente,nefro,neonato,neurocirugia,nutri,quemados,neumo,gastro  --presencial
                else if (moda=='2') //presencial
                 {
                    $('#cbomodasolipacifuat').prop('value','2');
                    $('#cbomodasolipacifuat').prop('disabled',true);
       // alert("presencial"+cupos);
                    $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtservipacifuat').prop('value'), cade2:moda, opc1:'fuat', opc2 : 'consucupofuat'}, type : 'POST',dataType : 'json',success : function(data)
                        {  
                            $.each(data, function(i){
                              if (data[i].CuposSaldo>0)
                              {
                                  cupos=true;
                              }
                            
                            });
                        },
                        error : function(xhr, status) {},
                        complete : function(xhr, status) {}
                      });
                      
//        alert("presencial2"+cupos);

                 }
                 //else //virtual
                 else if (moda=='1') //virtual
                  {
                    $('#cbomodasolipacifuat').prop('value','1');
                    $('#cbomodasolipacifuat').prop('disabled',true);

                          $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtservipacifuat').prop('value'), cade2:moda, opc1:'fuat', opc2 : 'consucupofuat'}, type : 'POST',dataType : 'json',success : function(data)
                        {  
                            $.each(data, function(i){
                              if (data[i].CuposSaldo>0)
                              {
                                  cupos=true;
                              }
                            
                            });
                        },
                        error : function(xhr, status) {},
                        complete : function(xhr, status) {}
                      });
                  }

                  if ( $('#txtservipacifuat').prop('value')=='150804') //Triaje Medico
                  {
                    $('#cbotipopacifuat').prop('value','3');
                    $('#cbotipopacifuat').prop('disabled',true);
                  }
                  if ( $('#txtservipacifuat').prop('value')=='190103' || $('#txtservipacifuat').prop('value')=='150809') //fisioterapia,gastro
                  {
                    
                    $('#mensamediservi').show();
                  }
                  





               if (cupos==true)
                {
                  $('#mensacupo').hide();
                  /*if ($('#txtservipacifuat').prop('value')=='150812' || $('#txtservipacifuat').prop('value')=='150808') //derma,endocrino mensaje para pacientes nuevos*/
                  
                  //if ( $('#txtservipacifuat').prop('value')=='150808') //endocrino mensaje para pacientes nuevos
                  if (nuevo=='1')
                  {
                    $('#mensaservi').show();
                  }
                  else
                  {
                    $('#mensaservi').hide();
                  }

                }
                else
                 {
                   $('#mensacupo').show();
                 } 

              });   

              $('#cbomodasolipacifuat').change(function () 
              {
  //alert("moda1"+cupos);                
                //alert($('#cbomodasolipacifuat').prop('value'));
                 cupos=false;
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtservipacifuat').prop('value'), cade2:$('#cbomodasolipacifuat').prop('value'), opc1:'fuat', opc2 : 'consucupofuat'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                        //alert(data[i].CuposSaldo);
                       
                        if (data[i].CuposSaldo>0)
                         {
                            cupos=true;
                         }
                       
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                });
//alert("moda2"+cupos);                
                if (cupos==true)
                {
                  $('#mensacupo').hide();

                  /*if ($('#txtservipacifuat').prop('value')=='150812' || $('#txtservipacifuat').prop('value')=='150808') //derma,endocrino mensaje para pacientes nuevos*/
                  
                  /*if ( $('#txtservipacifuat').prop('value')=='150808') //endocrino mensaje para pacientes nuevos
                  {
                    $('#mensaservi').show();
                  }
                  else
                  {
                    $('#mensaservi').hide();
                  }
                  */

                }
                else
                 {
                  $('#mensacupo').show();
                } 


              });   


              $('#cbotipopacifuat').change(function () {

                if ($('#cbotipopacifuat').prop('value')=='2' )
                {
                  $('#divrefe').show();

                }
                else if ( $('#txtservipacifuat').prop('value')!='150804' && $('#cbotipopacifuat').prop('value')=='3' ) //no Triaje Medico y Gratuito
                  {
                    alert("No se puede seleccionar el Tipo de Paciente GRATUITO para la Especialidad solicitada !!!");
                    $('#cbotipopacifuat').prop('value','');
                    
                    $('#divrefe').hide();
                  }
                  else
                  {
                    $('#divrefe').hide();
                  }

              });  
              
              $('#txtfecharefefuat').keyup(function(e) 
                   { 

                    var valor='';
                    //valor=$('#txtfechanacipacifuat').prop('value').trim().length;
                     //       alert(valor);

                     if ((e.which>=48 && e.which<=57) || (e.which>=96 && e.which<=105))
                        {    
                         if ($('#txtfecharefefuat').prop('value').trim().length==2 || $('#txtfecharefefuat').prop('value').trim().length==5)
                            {
                              valor=$('#txtfecharefefuat').prop('value');
                              $('#txtfecharefefuat').prop('value',valor+'/'); 
                            }
                        }
                   
                        
                  });  


/*
            $('#txtfechatelefuat').keyup(function(event) { 
                 if (event.which == 13) 
                    {
                        event.preventDefault();
                        this.value = this.value + "\n";
                    }
            }); 
            

            $('#txtcelupacifuat').keyup(function(event) { 
                 if (event.which == 13) 
                    {
                        event.preventDefault();
                        this.value = this.value + "\n";
                    }
            }); 

*/



               //botones

           $('#autoriza').click(function() {  
                window.open('Autorizacion - Ministerio de Salud.html','ventana1','width=600,height=600,scrollbars=NO'); 
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
                                $('#frmfuat').prop('action','../cliente/info_listasolicita.php');
                                document.frmfuat.submit();     
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
                                $('#frmfuat').prop('action','../cliente/info_listaususolicita.php');
                                document.frmfuat.submit();     
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
                                    $('#frmfuat').prop('action','../cliente/info_listaprovsolicita.php');
                                    document.frmfuat.submit();     
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
                                $('#frmfuat').prop('action','../cliente/info_listasuge.php');
                                document.frmfuat.submit();     
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
                                $('#frmfuat').prop('action','../cliente/info_consoususolicita.php');
                                document.frmfuat.submit();     
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
                                $('#frmfuat').prop('action','../cliente/info_consousudiasolicita.php');
                                document.frmfuat.submit();     
                              }

                      <?php
                        }                      
                      ?>

            });   
                
            $('#btingrefuat').click(function() {  
                    $('#modalfuat').modal('show');

                    valor="<div class='col-md-6' align='left'> <img src='../cliente/images/beneficiarios.gif'> Solicitud de Cita </div>  <div class='col-md-6' align='right'> <img src='../cliente/images/nuevo.gif'> Nuevo Registro </div>";
                    $('#divtitufuat').html(valor);
                    $('#divteclafuat').html('<div> [ CTRL + F8 ] </div><div> GRABAR </div>');
                    $('#frmfuat')
                       .find('input,textarea,select')
                       .prop('value','')
                       .prop('readonly',false)
                       .end()
                       .find('input[type=checkbox], input[type=radio]')
                       .prop('checked','')
                       .prop('readonly',false)
                       .end();

                   

                    $('#txtcodifuat').prop('readonly',true);
                 //   $('#txtfechaemifuat').prop('readonly',true);
                 //   $('#txtusuemifuat').prop('readonly',true);
                 //   $('#txtdatosusuemifuat').prop('readonly',true);
                 //   $('#txtespeusuemifuat').prop('readonly',true);
                 //   $('#txtnrocoleusuemifuat').prop('readonly',true);
                 //   $('#txtnrorneusuemifuat').prop('readonly',true);

                    $('#txtfechatelefuat').prop('readonly',true);
                    $('#txtfechatelefuat').prop('value',fecha);
                    /*
                    $('#txtusuemifuat').prop('value',"<?php echo $_SESSION['dni'];?>");
                    $('#txtdatosusuemifuat').prop('value',"<?php echo $_SESSION['usu'];?>");
                    
                    $('#txtespeusuemifuat').prop('value',"<?php echo $_SESSION['cargo'];?>");
                    $('#txtnrocoleusuemifuat').prop('value',"<?php echo $_SESSION['codicole'];?>");
                    $('#txtnrorneusuemifuat').prop('value',"<?php echo $_SESSION['nrorne'];?>");
                    */

                    $('#btaceptarfuat').html("<i class='glyphicon glyphicon-share'></i> Grabar");
                    $('#txtopcfuat').prop('value','I'); 

                   // $('#chkllamada1pacifuat').bootstrapSwitch('state',true);
                  //  $('#chkllamada2pacifuat').bootstrapSwitch('state',false);

                  //  $('#chkaplipacifuat').bootstrapSwitch('state',false);
                   // $('#chkapli2').bootstrapSwitch('state',false);

                  // $('#chkcelupacifuat').bootstrapSwitch('state',false);
                   // $('#chkcelu2').bootstrapSwitch('state',false);

                 //   $('#chksiste1pacifuat').bootstrapSwitch('state',true);
                 //   $('#chksiste2pacifuat').bootstrapSwitch('state',false);
                      //16032023
                     //$('#chkcondifisipacifuat').bootstrapSwitch('state',false);
                   // $('#chkcodifisi2').bootstrapSwitch('state',false);
                     $('#iframedocu1').attr('src','images/docu.png');
                     $('#iframedocu2').attr('src','images/docu.png');

                    $('#divventamensamosta').hide();
                    //$('#divventamensaverde').show();
                    $('#divventaaceptasolicitafuat').hide();
                     


                    <?php
                        if (isset($_SESSION['acepta']))    
                         {
                    ?>
                   // alert("remito1");
                            $('#modalfuat').modal('hide');

                              
                    <?php
                         
                          }
                   ?>                    
                 


                });


                $('#btactufuat').click(function() { 

                    <?php
                       if ($_SESSION['usu']=='')
                         {
                     ?>
                          alert("No tiene Acceso para la Actualizacion del Registro, Verifique ...");
                          //$('#divmensamosta').html('No tiene Acceso para la Actualizacion del Registro, Verifique ...');
                          //$('#divventamensamosta').show();
                     <?php
                         }
                         else
                         {
                     ?>
 
                

                          if ($('#txtcodifuat').prop('value').trim().length>0)
                             {
                                $('#modalfuat').modal('show');
                                valor="<div class='col-md-6' align='left'> <img src='../cliente/images/beneficiarios.gif'> Solicitud de Cita </div>  <div class='col-md-6' align='right'> <img src='../cliente/images/editar.gif'> Actualizacion de Registro </div>";
                                $('#divtitufuat').html(valor);
                                $('#divteclafuat').html('<div> [ CTRL + F8 ] </div><div> GRABAR </div>');
                                $('#frmfuat')
                                  .find('input,textarea,select')
                                  .prop('readonly',false)
                                  .end()
                                  .find('input[type=checkbox], input[type=radio]')
                                  .prop('readonly',false)
                                  .end();

                               
                                $('#txtcodifuat').prop('readonly',true);
                              //  $('#txtfechaemifuat').prop('readonly',true);
                               // $('#txtusuemifuat').prop('readonly',true);
                               // $('#txtdatosusuemifuat').prop('readonly',true);
                               // $('#txtespeusuemifuat').prop('readonly',true);
                               // $('#txtnrocoleusuemifuat').prop('readonly',true);
                               // $('#txtnrorneusuemifuat').prop('readonly',true);
                               $('#txtfechatelefuat').prop('readonly',true);


                               
                               if ($('#cbotipodocupacifuat').prop('value')=='1') //dni
                                 {
                                   $('#txtdnipacifuat').prop('readonly',false);
                                   $('#txtfechanacipacifuat').prop('readonly',false);
                                   $('#txtapepatpacifuat').prop('readonly',false);
                                   $('#txtapematpacifuat').prop('readonly',false);
                                   $('#txtnompacifuat').prop('readonly',false);
                                   
                                   //$('#cbosexopacifuat').prop('readonly',true);
                                   $('#cbosexopacifuat').prop('disabled',false);

                                   $('#txtedadpacifuat').prop('readonly',false);

                                   $('#btconsupacifuat').prop('disabled',true);
                                 } 
                              else if ($('#cbotipodocupacifuat').prop('value')=='2') //extranjeria
                                 {
                                 
                                   $('#txtdnipacifuat').prop('readonly',false);
                                   $('#txtfechanacipacifuat').prop('readonly',false);
                                   $('#txtapepatpacifuat').prop('readonly',false);
                                   $('#txtapematpacifuat').prop('readonly',false);
                                   $('#txtnompacifuat').prop('readonly',false);
                                   //$('#cbosexopacifuat').prop('readonly',false);
                                   $('#cbosexopacifuat').prop('disabled',false);
                                   $('#txtedadpacifuat').prop('readonly',false);
                                   $('#btconsupacifuat').prop('disabled',true);
                                 } 
                              else if ($('#cbotipodocupacifuat').prop('value')=='3') //sin documento
                                 {
                                
                                   $('#txtdnipacifuat').prop('readonly',true);
                                   $('#txtfechanacipacifuat').prop('readonly',false);
                                   $('#txtapepatpacifuat').prop('readonly',false);
                                   $('#txtapematpacifuat').prop('readonly',false);
                                   $('#txtnompacifuat').prop('readonly',false);
                                   //$('#cbosexopacifuat').prop('readonly',false);
                                   $('#cbosexopacifuat').prop('disabled',false);
                                   $('#txtedadpacifuat').prop('readonly',false);

                                   $('#btconsupacifuat').prop('disabled',true);
                                 }
                              else if ($('#cbotipodocupacifuat').prop('value')=='4') //hc
                                 {
                                   $('#txtdnipacifuat').prop('readonly',false);
                                   $('#txtfechanacipacifuat').prop('readonly',false);
                                   $('#txtapepatpacifuat').prop('readonly',false);
                                   $('#txtapematpacifuat').prop('readonly',false);
                                   $('#txtnompacifuat').prop('readonly',false);
                                   
                                   //$('#cbosexopacifuat').prop('readonly',true);
                                   $('#cbosexopacifuat').prop('disabled',false);

                                   $('#txtedadpacifuat').prop('readonly',false);

                                   $('#btconsupacifuat').prop('disabled',true);
                                 } 


                               

                            /*
                               if ($('#cbotipodocuapofuat').prop('value')=='1') //dni
                                 {
                            
                                   $('#txtapepatapofuat').prop('readonly',false);
                                   $('#txtapematapofuat').prop('readonly',false);
                            
                                   $('#txtnomapofuat').prop('readonly',false);
                                   
                                 } 
                              else if ($('#cbotipodocuapofuat').prop('value')=='2') //extranjeria
                                 {
                            
                                   $('#txtapepatapofuat').prop('readonly',false);
                                   $('#txtapematapofuat').prop('readonly',false);
                            
                                   $('#txtnomapofuat').prop('readonly',false);
                                 } 
                              */
                                
                              
                                $('#btaceptarfuat').html("<i class='glyphicon glyphicon-share'></i> Grabar");
                                $('#txtopcfuat').prop('value','A');

                               $('#divventaaceptasolicitafuat').show();

                                


                              }
                          else
                              {
                                  alert('Debe seleccionar el registro para Actualizar, Verifique ...'); 

                              }  
                      <?php
                         }
                  
                      ?>        
                


                });
                
/*
                $('#btelific').click(function() {  
                  if ($('#txtcodifuat').prop('value').trim().length>0)
                      {
                        $('#modalfuat').modal('show');
                        valor="<div class='col-md-6' align='left'> <img src='../cliente/images/beneficiarios.gif'> Ficha Tecnica </div>  <div class='col-md-6' align='right'> <img src='../cliente/images/eliminar.gif'> Eliminacion de Registro </div>";
                        $('#divtitufuat').html(valor);
                        $('#frmfuat')
                          .find('input,textarea,select')
                          .prop('readonly',true)
                          .end()
                          .find('input[type=checkbox], input[type=radio]')
                          .prop('readonly',true)
                          .end();

                        $('#detatrabafic').html('');
                        $('#detajefeinmefic').html('');
                        $('#detajefesupefic').html('');  
                        
                        $('#cbotrabafic').prop('disabled',true); 
                        $('#btaceptarfuat').html("<i class='glyphicon glyphicon-remove-sign'></i> Eliminar");
                        $('#txtopcfuat').prop('value','E');
                      }
                    else
                      {
                        alert('Debe seleccionar el registro para Eliminar, Verifique ...'); 
                      }  
                });
                */

              
               $('#btimprefuat').click(function() {  

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
                           if ($('#txtcodifuat').prop('value').trim().length>0) 
                                   {
                                      $('#frmfuat').prop('action','../cliente/info_solicita.php');
                                      document.frmfuat.submit();                    
                                   }
                                else
                                {
                                  alert('Seleccionar el registro del Paciente, Verifique ...'); 
                                }
                      <?php
                         }
                      ?>
                  
               });

                $('#btimpreticketfuat').click(function() {  

                  
                           if ($('#txtdnipacifuat').prop('value').trim().length>0) 
                                   {
                                      $('#frmfuat').prop('action','../cliente/info_ticketfuat.php');
                                      document.frmfuat.submit();                    
                                   }
                                else
                                {
                                  alert('Seleccionar el registro del Paciente, Verifique ...'); 
                                }
                    
                  
               });

               $('#btconsufuat').click(function() {  

                  document.frmfuat.submit(); 
                  
               });

                 


   

//aqui me quede 29052024
               $('#btaceptarfuat').click(function() { 


                //verificacion de solicitud existente 
                var verrorhc='';
               // alert($('#txtdnipacifuat').prop('value').trim());
               // alert($('#txtservipacifuat').prop('value').trim());

                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtdnipacifuat').prop('value').trim(), cade2:$('#txtservipacifuat').prop('value').trim(), opc1:'fuat', opc2 : 'consuverisolicita'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                          verrorhc=data[i].error;
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                });   



                //verificacion de fecha de nacimiento 
                var error='';
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:$('#txtfechanacipacifuat').prop('value').trim(), cade2:'', opc1:'fuat', opc2 : 'consufechanacifuat'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                          error=data[i].error;
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 

               if($('#cbotipodocupacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione Tipo de Documento del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbotipodocupacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtdnipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Ingrese el Nro. del Documento del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtdnipacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if (error=='1')
                  {
                    //alert('Ingrese Correctamente la Fecha de Nacimiento, Verifique ...');
                    $('#divmensamosta').html('Ingrese Correctamente la Fecha de Nacimiento, Verifique ...');
                    $('#divventamensamosta').show();

                    //$('#txtfechanacipacifuat').focus();  
                    $('#btaceptarfuat').focus();

                  }
                else if (error=='2')
                  {
                    //alert('Fecha de Nacimiento pertenece a Paciente de mayor Edad, Verifique ...');
                    $('#divmensamosta').html('Fecha de Nacimiento pertenece a Paciente de mayor Edad, Verifique ...');
                    $('#divventamensamosta').show();

                    //$('#txtfechanacipacifuat').focus();  
                    $('#btaceptarfuat').focus();
                  }
                else if($('#txtnompacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Nombre del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtnompacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtapepatpacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Apellido Paterno del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtapepatpacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtapematpacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Apellido Materno del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtapematpacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#cbosexopacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Sexo del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbosexopacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtedadpacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese la Edad del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtedadpacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                 else if($('#cbodepapacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Departamento de Procedencia del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbodepapacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#cboprovpacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione la Provincia de Procedencia del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cboprovpacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#cbodistripacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Distrito de Procedencia del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbodistripacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtdirepacifuat').prop('value').trim().length<=10)
                  {
                      $('#divmensamosta').html('Ingrese correctamente la Direccion de Procedencia del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbodistripacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  /*
                else if($('#txtrefepacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Ingrese el Establecimiento de Procedencia del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtrefepacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  */
                else if($('#cbodepanacipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Departamento de Nacimiento del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbodepapacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#cboprovnacipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione la Provincia de Nacimiento del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cboprovpacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#cbodistrinacipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Distrito de Nacimiento del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbodistripacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }

                  else if($('#cbopaisnacipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Pais de Nacimiento del Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbodepapacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }

                else if($('#txtservipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione la Especialidad, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtservipacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  
                  //if ($('#txtopcfuat').prop('value')=='A' 

                else if($('#cbomodasolipacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione la Modalidad de Cita, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtservipacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if (cupos==false && $('#txtopcfuat').prop('value')=='I' )
                  {
                    //alert(cupos);

                      $('#divmensamosta').html('Ya se terminaron las citas para esta Especialidad...! No podra realizar la solicitud de cita., Verifique ...');
                      $('#divventamensamosta').show();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#cbotipopacifuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Tipo de Paciente, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtservipacifuat').focus();
                      $('#btaceptarfuat').focus();
                  }


                else if(verrorhc=='1')
                  {
                      $('#divmensamosta').html('No se puede registrar la Solicitud de Cita, El paciente ya tiene una solicitud pendiente para la Especialidad requerida, Verifique ...');
                      $('#divventamensamosta').show();
                      $('#btaceptarfuat').focus();
                  }

                else if($('#cboapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Parentesco, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cboapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  /*
                else if($('#cbotipodocuapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione el Tipo de Documento, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbotipodocuapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtnrodocuapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Ingrese el Nro. del Documento del Apoderado, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#cbotipodocuapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  */

                else if($('#txtnomapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Nombre del Apoderado, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtnomapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  /*
                else if($('#txtapepatapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Apellido Paterno del Apoderado, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtapepatapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtapematapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Consulte o Ingrese el Apellido Materno del Apoderado, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtapematapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  */
                else if($('#txtcorreoapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Ingrese el Correo del Apoderado, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtcorreoapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                else if($('#txtceluapofuat').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Ingrese el Nro. de Celular del Apoderado, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtceluapofuat').focus();
                      $('#btaceptarfuat').focus();
                  }
                  /*
                else if($('#txtdniapepatmatnomapofuat').prop('value').trim().length==0 || $('#txtdniapepatmatnomapofuat').prop('value').trim().toUpperCase()==$('#txtnrodocuapofuat').prop('value').trim())
                  {
                      $('#divmensamosta').html('Ingrese el DNI del Padre y/o Madre Correctamente, Verifique ...');
                      $('#divventamensamosta').show();
                      $('#txtdniapepatmatnomapofuat').prop('value',' ');
                      $('#txtdniapepatmatnomapofuat').focus()
                      
                      //$('#btaceptarfuat').focus();
                  }
                  */
                //else if($('#txtapepatmatnomapofuat').prop('value').trim().length==0 || $('#txtapepatmatnomapofuat').prop('value').trim().toUpperCase()==$('#txtapepatapofuat').prop('value').trim()+' '+$('#txtapematapofuat').prop('value').trim()+' '+$('#txtnomapofuat').prop('value').trim())
                else if($('#txtapepatmatnomapofuat').prop('value').trim().length==0 || $('#txtapepatmatnomapofuat').prop('value').trim().toUpperCase()==$('#txtnomapofuat').prop('value').trim())
                  {
                      $('#divmensamosta').html('Ingrese los Apellidos y Nombres del Padre y/o Madre Correctamente, Verifique ...');
                      $('#divventamensamosta').show();
                      $('#txtapepatmatnomapofuat').prop('value',' ');
                      $('#txtapepatmatnomapofuat').focus()
                      
                      //$('#btaceptarfuat').focus();
                  }

                  /*
                else if($('#txtnomdocu1').prop('value').trim().length==0)
                  {
                      $('#divmensamosta').html('Seleccione archivo de Referencia, Verifique ...');
                      $('#divventamensamosta').show();
                      //$('#txtnomdocu1').focus();
                      $('#btaceptarfuat').focus();
                  }
                  */

                  /*
                else if(grecaptcha.getResponse().length == 0) 
                  { 
    
                      //alert('Seleccione el Captcha');
                      $('#divmensamosta').html('Seleccione el Captcha');
                      $('#divventamensamosta').show();
                      $('#btaceptarfuat').focus();
                  }
                  */
                  
                else if($('#chkaceptapacifuat').bootstrapSwitch('state')==false)
                  {
          
                      //alert('Seleccione la Aceptacion de los Datos Personales, Verifique ...');
                      $('#divmensamosta').html('Seleccione la Aceptacion de los Datos Personales, Verifique ...');
                      $('#divventamensamosta').show();
                      $('#btaceptarfuat').focus();
                  }
                                
                else 
                  { 
                    
                   // var rptacaptcha=true;
                    /*
                    $.ajax({async:false, cache:false, url : 'consulta.php', data :{captcha:valorcaptcha, opc1:'fuat', opc2:'captcha'}, type : 'POST',dataType : 'json',
                      success : function(data)  
                        { 
                          $.each(data, function(i)
                            {
                              rptacaptcha=data["success"];                                 
                            });
                        },
                      error : function(xhr, status) {  },
                      complete : function(xhr, status) { }
                    }); 
                    */


         // alert($('#txtopcfuat').prop('value'));
                   // var valor=true;
                    var cade='';
                    cade="<?php echo $_SESSION['usu'];?>";

                    if ($('#txtopcfuat').prop('value')=='A' && cade.length==0)
                     
                      {
                        // valor=false;
                         alert('No tiene Acceso para la Actualizacion del Registro, Verifique ...');
                      }
               
                     /*
                    if (valor==false)
                      {
                           
                            alert('No tiene Acceso para la Actualizacion del Registro, Verifique ...');
                      }
                      */
                   
                    else
                    
                      {
                         if ($('#frmfuat').valid())
                         { 
                            $('#divmensamosta').html('');
                            $('#divventamensamosta').hide();

                            if ($('#txtopcfuat').prop('value')=='I')
                                {
                     
                                   rpta = confirm('Estan escritos correctamente los datos para grabar la solicitud de cita ?');
                                   codifuat = '0';
                                 
                                   
                                }  
                            
                            else if ($('#txtopcfuat').prop('value')=='A')
                                {
                                    rpta = confirm('Desea Grabar el Registro ?');
                                    codifuat = $('#txtcodifuat').prop('value').trim();
                                   
                                }    
                       
                            else if ($('#txtopcfuat').prop('value')=='E')
                               {
                                  var rpta = confirm('Desea Eliminar el Registro ?');
                                  codifuat = $('#txtcodifuat').prop('value').trim();
                                 
                                }


                            if (rpta == true)  
                                 { 

                                     
                                  //   usuemifuat =$('#txtusuemifuat').prop('value').trim().toUpperCase();
                                  //    usuemifuat="";

                                    nomipressfuat = $('#txtdirepacifuat').prop('value').trim().toUpperCase();
                                //    fechasolifuat = $('#txtfechanacipacifuat').prop('value').trim().toUpperCase();

                                   fechasolifuat='';
                                   fechanaciapofuat='';

                                
                               /* 
                                <?php
                                  if ($fnavegador['nombre']=='Google Chrome' )
                                    {
                                  ?>   
                                      //convert formato de fecha a yyyy-MM-DD
                                       fechasolifuat=$('#txtfechanacipacifuat').prop("value").trim().substring(8,10)+'/'+$('#txtfechanacipacifuat').prop("value").trim().substring(5,7)+'/'+$('#txtfechanacipacifuat').prop("value").trim().substring(0,4);

                                       fechanaciapofuat=$('#txtfechanaciapofuat').prop("value").trim().substring(8,10)+'/'+$('#txtfechanaciapofuat').prop("value").trim().substring(5,7)+'/'+$('#txtfechanaciapofuat').prop("value").trim().substring(0,4);

                                  <?php
                                    }
                                  else 
                                    {   
                                  ?>   
                                      fechasolifuat = $('#txtfechanacipacifuat').prop('value').trim().toUpperCase();
                                      fechanaciapofuat = $('#txtfechanaciapofuat').prop('value').trim().toUpperCase();

                                <?php } ?>   
                                */

                                      fechasolifuat = $('#txtfechanacipacifuat').prop('value').trim().toUpperCase();
                                      //fechanaciapofuat = $('#txtfechanaciapofuat').prop('value').trim().toUpperCase();
                                      fechanaciapofuat = $('#cboapofuat').prop('value').trim().toUpperCase();

                                 

                                      soliservifuat = $('#cbotipodocupacifuat').prop('value').trim().toUpperCase();
                                      //tipodocuapofuat = $('#cbotipodocuapofuat').prop('value').trim().toUpperCase();


                                      horasolifuat = $('#txtnompacifuat').prop('value').trim().toUpperCase();
                                      
                                      
                                      datospacifuat = $('#txtapepatpacifuat').prop('value').trim().toUpperCase();
                                      //apematpacifuat = $('#txtapematpacifuat').prop('value').trim().toUpperCase();
                                      apematpacifuat = $('#txtapematpacifuat').prop('value').trim().toUpperCase();
                                      //tiposegufuat = $('#cbotiposegupacifuat').prop('value').trim().toUpperCase();
                                      codiservifuat=$('#txtservipacifuat').prop('value').trim().toUpperCase();
                                   
                                      
                                      dnipacifuat = $('#txtdnipacifuat').prop('value').trim().toUpperCase();
                                      //nrodocuapofuat = $('#txtnrodocuapofuat').prop('value').trim().toUpperCase();
                                      //nomapofuat = $('#txtnomapofuat').prop('value').trim().toUpperCase();
                                      nomcompleapofuat = $('#txtnomapofuat').prop('value').trim().toUpperCase();

                                      //apepatapofuat = $('#txtapepatapofuat').prop('value').trim().toUpperCase();
                                      //apepatapofuat = ''
                                      //apematapofuat = $('#txtapematapofuat').prop('value').trim().toUpperCase();
                                      //apematapofuat = '';
                                      correoapofuat = $('#txtcorreoapofuat').prop('value').trim().toUpperCase();
                                      teleapofuat = $('#txtteleapofuat').prop('value').trim().toUpperCase();
                                      celuapofuat = $('#txtceluapofuat').prop('value').trim().toUpperCase();
                                      

                                      //codijefeinmefic ='';
                                      if ($('#txtopcfuat').prop('value')=='A')
                                        {

                                          if($('#chkaceptasolicitafuat').bootstrapSwitch('state')==true)
                                             {
                                                codijefeinmefic ='SI';      
                                             }
                                             else
                                             {
                                                codijefeinmefic ='NO';     
                                             }
                                        }
                                      else
                                        {
                                                codijefeinmefic ='';     
                                        } 


                                      codijefesupefic = "1";
                                      //puestosupefic = "";
                                       puestosupefic = $('#txtobsaceptasolicitafuat').prop('value').trim().toUpperCase();
                                       
                                       /*
                                       if($('#txtrefepacifuat').prop('value').trim().length>0)
                                        {
                                            otrosdocufuat = $('#txtrefepacifuat').prop('value').trim().toUpperCase();
                                        } 
                                      else
                                        {
                                           otrosdocufuat = ''; 
                                        }
                                        */
                                        otrosdocufuat = ''; 
                                        
                                      
                                        /*

                                        if($('#txtedadpacifuat').prop('value').trim().length>0)
                                        {
                                            edadpacifuat = $('#txtedadpacifuat').prop('value').trim().toUpperCase();
                                        } 
                                      else
                                        {
                                           edadpacifuat = ''; 
                                        }
                                        */
  
  
                                        
                                         /*
                                        if($('#chkllamada1pacifuat').bootstrapSwitch('state')==true)
                                         {
                                            edadpacifuat='1';      
                                         }
                                         else if($('#chkllamada2pacifuat').bootstrapSwitch('state')==true)
                                         {
                                            edadpacifuat='2';      
                                         }
*/
                                          edadpacifuat= $('#txtedadpacifuat').prop('value').trim().toUpperCase();

/*
                                         trataactualfuat="";
                                         if($('#chkaplipacifuat').bootstrapSwitch('state')==true)
                                         {
                                            trataactualfuat ='1';      
                                         }
                                         else //if($('#chkapli2').bootstrapSwitch('state')==true)
                                         {
                                            trataactualfuat ='2';      
                                         }
                                         */
                                        fun4fic ="";  
/*
                                         exaapodiagfuat="";
                                         if($('#chkcelupacifuat').bootstrapSwitch('state')==true)
                                         {
                                            exaapodiagfuat ='1';      
                                         }
                                         else //if($('#chkcelu2').bootstrapSwitch('state')==true)
                                         {
                                            exaapodiagfuat ='2';      
                                         }
                                         */
                                        fun5fic ="";    
/*
                                         moticonsufuat="";
                                         if($('#chksiste1pacifuat').bootstrapSwitch('state')==true)
                                         {
                                            moticonsufuat ='1';      
                                         }
                                         else if($('#chksiste2pacifuat').bootstrapSwitch('state')==true)
                                         {
                                            moticonsufuat ='2';      
                                         }
                                         */
                                          moticonsufuat ="";   
                                        /*
                                         recofuat="";
                                         if($('#chkcondifisipacifuat').bootstrapSwitch('state')==true)
                                         {
                                            recofuat ='1';      
                                         }
                                         else  //if($('#chkcodifisi2').bootstrapSwitch('state')==true)
                                         {
                                            recofuat ='2';      
                                         }*/

                                        //   resusolifuat = $('#chkaceptapacifuat').prop('value').trim().toUpperCase();
                                        resusolifuat="";
                                         if($('#chkaceptapacifuat').bootstrapSwitch('state')==true)
                                         {
                                            resusolifuat ='1';      
                                         }
                                         else
                                         {
                                            resusolifuat ='2';      
                                         }

                                       

/*
                                       if($('#filedocu1').prop('value').trim().length>0)
                                        {
                                            desccasofuat = $('#filedocu1').prop('value').trim().toUpperCase();
                                        } 
                                      else
                                        {
                                           desccasofuat = ''; 
                                        }
                                        */

                                 //  desccasofuat = $('#txtdnipacifuat').prop("value")+"|"+fecha+" "+hora+"||"+ $('#filedocu1').prop("value").split('\\').pop();


                                      desccasofuat=$('#txtnomdocu1').prop('value');
                                       
/*
                                        if($('#txtcorreopacifuat').prop('value').trim().length>0)
                                        {
                                           nomipressconsufuat = $('#txtcorreopacifuat').prop('value').trim().toUpperCase();
                                        } 
                                      else
                                        {
                                           nomipressconsufuat = ''; 
                                        }
                                        */
                                      nomipressconsufuat = $('#txtnomdocu2').prop('value');
                                       
                                       /*
                                        if($('#txttelepacifuat').prop('value').trim().length>0)
                                        {
                                           codiipressconsufuat = $('#txttelepacifuat').prop('value').trim().toUpperCase();
                                        } 
                                      else
                                        {
                                           codiipressconsufuat = ''; 
                                        }

                                        */
                                      codiipressconsufuat = ''; 

                                  
                                      codidiag2fuat= $('#cboprovpacifuat').prop('value').trim().toUpperCase();
                                  
                                      descdiag2= '';
                                    //tipodiag2fuat= $('#cboestaoripacifuat').prop('value').trim().toUpperCase();
                                      tipodiag2fuat='';

                                      codidiag1fuat = $('#cbodepapacifuat').prop('value').trim().toUpperCase();
                                      coordiexterfic = '';
                                      
                                      //horatelefuat= $('#txtcelupacifuat').prop('value').trim().toUpperCase();
                                      horatelefuat='';
                                      //fechatelefuat = $('#txtfechatelefuat').prop('value').trim().toUpperCase();
                                      /*
                                      <?php
                                        if ($fnavegador['nombre']=='Google Chrome' )
                                          {
                                        ?>   
                                            //convert formato de fecha a yyyy-MM-DD
                                             fechatelefuat=$('#txtfechatelefuat').prop("value").trim().substring(8,10)+'/'+$('#txtfechatelefuat').prop("value").trim().substring(5,7)+'/'+$('#txtfechatelefuat').prop("value").trim().substring(0,4);

                                        <?php
                                          }
                                        else 
                                          {   
                                        ?>   
                                            fechatelefuat = $('#txtfechatelefuat').prop('value').trim().toUpperCase();

                                      <?php } ?>   
                                      */
                                      fechatelefuat = $('#txtfechatelefuat').prop('value').trim().toUpperCase();
                                
                                      $('#cbosexopacifuat').prop('disabled',false);
                                      sexofuat = $('#cbosexopacifuat').prop('value').trim().toUpperCase();
                                      $('#cbosexopacifuat').prop('disabled',true);
                                    
                                      //espefuat = $('#cboespefuat').prop('value').trim().toUpperCase();
                                      espefuat = '';


                                      
                                      inglesfic = $('#cbodistripacifuat').prop('value').trim().toUpperCase();

                                      otrosfic=''; 
                                      otrosfic = $('#cbopaisnacipacifuat').prop('value').trim().toUpperCase();


                                   
                                      

                                      
                                     // ofiotrosobsfic='';
                                      //otrosobsfic='';
                                      secunfic='0';
                                      auxific='0'; 
                                      tecnisupefic='0';    
                                      //opctecnisupefic='NINGUNO';  
                                      unific='0';      
                                      //opcunific='';  

                                      maesfic='';
                                      maesfic=$('#cbomediservifuat').prop('value').trim().toUpperCase();    
                                    
                                     // opcmaesfic='';  

                                      //doctofic='0';   
                                     // opcdoctofic='';  
                                      ofiotrosfic=''
                                    //  otrosfic='.'; 
          
                                      //usuemifuat = $('#txtusuemifuat').prop('value').trim().toUpperCase();
                                      //usuemifuat = "";
                                      otrosobsfic='';
                                      otrosobsfic = $('#textdetasolicita').prop('value').trim().toUpperCase();
                                    

                                      usuemifuat="<?php echo $_SESSION['dni'];?>";
                                    

                                      opcfuat = $('#txtopcfuat').prop('value').trim().toUpperCase();

                                      opcunific='';
                                      opcunific = $('#cbodepanacipacifuat').prop('value').trim().toUpperCase();

                                      opcmaesfic='';
                                      opcmaesfic = $('#cboprovnacipacifuat').prop('value').trim().toUpperCase();

                                      opcdoctofic='';
                                      opcdoctofic = $('#cbodistrinacipacifuat').prop('value').trim().toUpperCase();

                                      //recofuat='';
                                      //dniapepatmatnomapofuat='';
                                      //dniapepatmatnomapofuat = $('#txtdniapepatmatnomapofuat').prop('value').trim().toUpperCase();

                                      ofiotrosobsfic='';
                                      ofiotrosobsfic = $('#txtapepatmatnomapofuat').prop('value').trim().toUpperCase();

                                      opctecnisupefic='';

                                      $('#cbotipopacifuat').prop('disabled',false);
                                      opctecnisupefic = $('#cbotipopacifuat').prop('value').trim().toUpperCase();
                                      $('#cbotipopacifuat').prop('disabled',true);

                                      doctofic = $('#cbomodasolipacifuat').prop('value').trim().toUpperCase();

                                      secunfic=$('#cboespesolihospi').prop('value').trim().toUpperCase();
                                      auxific=$('#cbocitaespesolihospi').prop('value').trim().toUpperCase();
                                      
                                      ofipowerfic=$('#txtnrohojarefefuat').prop('value').trim().toUpperCase();
                                      ofiotrosfic=$('#txtfecharefefuat').prop('value').trim().toUpperCase();



                               //alert(tipodiag2fuat);
                                // alert( $('#txtapepatpacifuat').prop('value').trim().toUpperCase());
                                

       


        



 
                                      $.ajax({async:false, cache:false, url : 'consulta.php', data :{ codifuat:codifuat, usuemifuat:usuemifuat
                                        , nomipressfuat:nomipressfuat, fechasolifuat:fechasolifuat, soliservifuat:soliservifuat, horasolifuat:horasolifuat, datospacifuat:datospacifuat
                                        , apematpacifuat:apematpacifuat, codiservifuat:codiservifuat, dnipacifuat:dnipacifuat, codijefeinmefic:codijefeinmefic 
                                        , codijefesupefic:codijefesupefic, puestosupefic:puestosupefic
                                        , otrosdocufuat:otrosdocufuat, edadpacifuat:edadpacifuat
                                        , desccasofuat:desccasofuat
                                        //, trataactualfuat:trataactualfuat, exaapodiagfuat:exaapodiagfuat
                                        , fun4fic:fun4fic, fun5fic:fun5fic
                                        , moticonsufuat:moticonsufuat, nomipressconsufuat:nomipressconsufuat, codiipressconsufuat:codiipressconsufuat
                                        , codidiag1fuat:codidiag1fuat, coordiexterfic:coordiexterfic, horatelefuat:horatelefuat, fechatelefuat:fechatelefuat
                                        , sexofuat:sexofuat, resusolifuat:resusolifuat
                                        
                                        //, espefuat:espefuat, ofiotrosfic:ofiotrosfic
                                        , ofipowerfic:ofipowerfic, ofiotrosfic:ofiotrosfic

                                        , inglesfic:inglesfic, otrosfic:otrosfic
                                        //, recofuat:recofuat
                                        //, dniapepatmatnomapofuat:dniapepatmatnomapofuat
                                        , ofiotrosobsfic:ofiotrosobsfic, otrosobsfic:otrosobsfic
                                        , secunfic:secunfic, auxific:auxific, tecnisupefic:tecnisupefic, opctecnisupefic:opctecnisupefic, unific:unific, opcunific:opcunific, maesfic:maesfic, opcmaesfic:opcmaesfic, doctofic:doctofic, opcdoctofic:opcdoctofic, usuemifuat:usuemifuat
                                        ,codidiag2fuat:codidiag2fuat,descdiag2:descdiag2,tipodiag2fuat:tipodiag2fuat
                                        //,tipodocuapofuat:tipodocuapofuat
                                        //,nrodocuapofuat:nrodocuapofuat
                                        ,fechanaciapofuat:fechanaciapofuat,nomcompleapofuat:nomcompleapofuat
                                        //,apepatapofuat:apepatapofuat
                                        //,apematapofuat:apematapofuat
                                        ,correoapofuat:correoapofuat,teleapofuat:teleapofuat,celuapofuat:celuapofuat

                                        
                                        ,opcfuat:opcfuat, opc1:'fuat', opc2:'transafuat'}, type : 'POST',dataType : 'json',success : function(data)  
                                        
                                        {

                        
                                          
                                          //       $.each(data, function(i){
                                          //        alert(data[i].retorno);
                                          //      });
                                                  if ($('#txtopcfuat').prop('value')=='I')
                                                  {
                                                     //alert('Registro Grabado Correctamente. el comprobante se le enviara a su correo.');   
                                                     alert('Se ha recepcionado su Solicitud de Cita satisfactoriamente.');
                                                  }
                                                  else if ($('#txtopcfuat').prop('value')=='A')
                                                  {
                                                    alert('Registro Actualizado Correctamente.');    
                                                  }
                                                 
                                          

                                          //   $('#btimpreticketfuat').click();

                  
                        
                                         },
                                        error : function(xhr, status) {  },
                                        complete : function(xhr, status) { }
                                      }); 
                                   

                              
                                      
                                      $('#frmfuat')
                                        .find('input,textarea,select')
                                        .prop('value','')
                                        .end()
                                        .find('input[type=checkbox], input[type=radio]')
                                        .prop('checked','')
                                        .end();
                                    
                                      document.frmfuat.submit();     


                                     ////////////
                                       <?php
                                          if (!isset($_SESSION['acepta']))    
                                           {
                                      ?>
                                 
                                               location.href ='http://www.insn.gob.pe/';

                                                
                                      <?php
                                           
                                            }
                                     ?>  
                                     ////////////
                                          
                                     
                                    

                               }
                             }
                            else
                             {
                                alert('Ingrese los Datos Obligatorios, Verifique ...');
                             }
                           }
                      }   

                      
                });     




                $('#btcancefuat').click(function() { 
                  
                    $('#frmfuat')
                        .find('input,textarea,select')
                        .prop('value','')
                        .end()
                        .find('input[type=checkbox], input[type=radio]')
                        .prop('checked','')
                        .prop('readonly',true)
                        .end();

                    // $('#chkllamada1pacifuat').bootstrapSwitch('state',true);
                    // $('#chkllamada2pacifuat').bootstrapSwitch('state',false);   

                    // $('#chkaplipacifuat').bootstrapSwitch('state',false);
                    // $('#chkapli2').bootstrapSwitch('state',false);   

                   //  $('#chkcelupacifuat').bootstrapSwitch('state',false);
                    // $('#chkcelu2').bootstrapSwitch('state',false);   

                    // $('#chksiste1pacifuat').bootstrapSwitch('state',true);
                   //  $('#chksiste2pacifuat').bootstrapSwitch('state',false);   
                    
                   //16032023
                    // $('#chkcondifisipacifuat').bootstrapSwitch('state',false);

                    // $('#chkcodifisi2').bootstrapSwitch('state',false);  


                    
                    <?php
                     if ($_SESSION['usu']=='')
                       {
                     ?>
                        document.frmfuat.submit();          
                     <?php
                       }
                     ?>

                    
                });
                
/*
                $('#chkllamada1pacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                       $('#chkllamada2pacifuat').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chkllamada2pacifuat').bootstrapSwitch('state',true);  
                     } 

                  
                });
                  
                $('#chkllamada2pacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                        $('#chkllamada1pacifuat').bootstrapSwitch('state',false);  
                       
                      } 
                    else
                     {
                       $('#chkllamada1pacifuat').bootstrapSwitch('state',true);  
                     } 
                  
                 });  
                */

                /*
                $('#chkaplipacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                       $('#chkapli2').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chkapli2').bootstrapSwitch('state',true);  
                     }   

                  
                });  
                $('#chkapli2').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                        $('#chkaplipacifuat').bootstrapSwitch('state',false);  
                      } 
                     else
                     {
                       $('#chkaplipacifuat').bootstrapSwitch('state',true);  
                     } 
                  
                 });  
                
                $('#chkcelupacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                       $('#chkcelu2').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chkcelu2').bootstrapSwitch('state',true);  
                     } 
                  
                });  
                $('#chkcelu2').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                        $('#chkcelupacifuat').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chkcelupacifuat').bootstrapSwitch('state',true);  
                     } 
                  
                 }); 
                
                 $('#chksiste1pacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                       $('#chksiste2pacifuat').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chksiste2pacifuat').bootstrapSwitch('state',true);  
                     } 
                  
                });  
                 
                $('#chksiste2pacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                        $('#chksiste1pacifuat').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chksiste1pacifuat').bootstrapSwitch('state',true);  
                     }
                  
                 }); 
                */

                /*
                $('#chkcondifisipacifuat').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                       $('#chkcodifisi2').bootstrapSwitch('state',false);  
                      } 
                    else
                     {
                       $('#chkcodifisi2').bootstrapSwitch('state',true);  
                     }
                  
                });  
                $('#chkcodifisi2').on('switchChange.bootstrapSwitch', function (event, state) {
                    if (state) 
                      {
                        $('#chkcondifisipacifuat').bootstrapSwitch('state',false);  
                      } 
                   else
                     {
                       $('#chkcondifisipacifuat').bootstrapSwitch('state',true);  
                     }
                  
                 }); 
                */

               /*
  $('#cboaceptafuat').change(function () {
            
                cadena1='';
                cadena2='';
                alert($('#cboaceptafuat').prop('value'));
                //$('#txtcodifuat').prop('value',$("td:eq(0)",this).text().trim());
             //   alert($('#txtcodifuat').prop('value'));
               // $('#txtservipacifuat').empty().append("<option value='' selected='true'></option>");
                
                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ cade1:cadena1, cade2:'', opc1:'fuat', opc2 : 'consuservifuat'}, type : 'POST',dataType : 'json',success : function(data)
                  {  
                      $.each(data, function(i){
                         $('#txtservipacifuat').append("<option value="+data[i].codiservi+">" + data[i].descservi +"</option>");
                      });
                  },
                  error : function(xhr, status) {},
                  complete : function(xhr, status) {}
                }); 
                
            });  
*/

                

                $('#tablafuat tr').click(function(){
                    
                    $("#tablafuat tr").each(function(item,i) {
                            if (item!='0')
                              {
                                $(this).css('text-shadow','3px 5px 5px #d9edf7');
                //                $(this).css('color','#337ab7');
                              }
                    })
                    //$(this).css('text-shadow','1px 1px 1px #337ab7');
                    $(this).css('text-shadow','1px 1px 1px #ff0084');
                    //  $(this).css('color','#ff0084');





/*
                    //alert($(this).parents("tr").find("td")[1].html());
                    var vcodiacepta=$("td:eq(0)",this).text().trim();
                    //alert(cadena1);
                    var vnro=1;

                    $("td:eq(28)",this).click(function(){
                      if (vnro==1) 
                        {
                            var vrptaacepta=prompt('Desea aceptar la solicitud de la Cita? [SI/NO]','SI').toUpperCase();
                            vnro=0;
                            
                            if(vrptaacepta=="SI" || vrptaacepta=="NO")
                            {
                               //alert(vrptaacepta);
                                var vopcacepta=vrptaacepta;
                                var vobsacepta='';
                               if(vrptaacepta=='NO')
                               {
                                  vobsacepta=prompt('Porque No se acepto la Solicitud de Cita?').toUpperCase();
                               } 
                               

                                $.ajax({async:false, cache:false, url : 'consulta.php', data :{ codi:vcodiacepta, opcacepta:vopcacepta, obs:vobsacepta, opc1:'fuat', opc2 : 'aceptafuat'}, type : 'POST',dataType : 'json',success : function(data)
                                  {  
                                      //$.each(data, function(i){
                                      //   $('#txtservipacifuat').append("<option value="+data[i].codiservi+">" + data[i].descservi +"</option>");
                                      //});

                                  },
                                  error : function(xhr, status) {},
                                  complete : function(xhr, status) {}
                                }); 
                              


                                
                                document.frmfuat.submit();      
                            }
                            else
                            {
                              
                              alert('ingrese Correctamente la Respuesta');
                            }
                        }
                    })
                   
*/




                    

                    //$(this).find('input:radio').bootstrapSwitch('state',true);  


                    $('#txtcodifuat').prop('value',$("td:eq(0)",this).text().trim());

                    $('#cbotipodocupacifuat').prop('value',$("td:eq(5)",this).text().trim());
                  

          
                    $('#txtdnipacifuat').prop('value',$("td:eq(1)",this).text().trim());

  

                    $('#txtapepatpacifuat').prop('value',$("td:eq(2)",this).text().trim());
                    $('#txtapematpacifuat').prop('value',$("td:eq(3)",this).text().trim());

                   //$('#txtfechanacipacifuat').prop('value',$("td:eq(4)",this).text().trim());
                        /*
                        <?php
                          if ($fnavegador['nombre']=='Google Chrome' )
                            {
                          ?>   
                              //convert formato de fecha a yyyy-MM-DD
                              $('#txtfechanacipacifuat').val($("td:eq(25)", this).text().trim().substring(6,10)+'-'+$("td:eq(25)", this).text().trim().substring(3,5)+'-'+$("td:eq(25)", this).text().trim().substring(0,2));
                          <?php
                            }
                          else 
                            {   
                          ?>   
                              $('#txtfechanacipacifuat').val($("td:eq(25)", this).text().trim());
                          <?php } ?>   
                          */

                           $('#txtfechanacipacifuat').val($("td:eq(25)", this).text().trim());






                     


                    $('#txtdirepacifuat').prop('value',$("td:eq(6)",this).text().trim());


                   // $('#txtrefepacifuat').prop('value',$("td:eq(7)",this).text().trim());
                    
                    $('#txtedadpacifuat').prop('value',$("td:eq(8)",this).text().trim());
/*
                    if($("td:eq(8)",this).text().trim()=="1")
                    {
                      $('#chkllamada1pacifuat').bootstrapSwitch('state',true);
                      $('#chkllamada2pacifuat').bootstrapSwitch('state',false);
                    }
                    else if($("td:eq(8)",this).text().trim()=="2")
                    {
                      $('#chkllamada1pacifuat').bootstrapSwitch('state',false);
                      $('#chkllamada2pacifuat').bootstrapSwitch('state',true);
                    }
                    */


                  // $('#filedocu1').prop('value',$("td:eq(9)",this).text().trim());

                     //$('#txtnomdocu1').prop('value',$("td:eq(9)",this).text().trim());
                     //$("#iframedocu1").attr("src","docu/" + $("td:eq(9)",this).text().trim());  
                     if ($("td:eq(9)",this).text().trim().length>0)
                     {
                        $('#txtnomdocu1').prop('value',$("td:eq(9)",this).text().trim());
                        $("#iframedocu1").attr("src","docu/" + $("td:eq(9)",this).text().trim());  
                     }
                    else
                     {
                        $('#txtnomdocu1').prop('value','');
                        $('#iframedocu1').attr('src','images/docu.png');
                     }
                     
                    
                  
                    
                    //alert($("td:eq(9)",this).text().trim());


                    //$('#txttrataactualfuat').prop('value',$("td:eq(10)",this).text().trim());
/*
                    if($("td:eq(10)",this).text().trim()=="1")
                    {
                      $('#chkaplipacifuat').bootstrapSwitch('state',true);
                    //  $('#chkapli2').bootstrapSwitch('state',false);
                    }
                    else // if($("td:eq(10)",this).text().trim()=="2")
                    {
                      $('#chkaplipacifuat').bootstrapSwitch('state',false);
                      //$('#chkapli2').bootstrapSwitch('state',true);
                    }
                    */


                    //$('#txtexaapodiagfuat').prop('value',$("td:eq(11)",this).text().trim());
/*
                    if($("td:eq(11)",this).text().trim()=="1")
                    {
                      $('#chkcelupacifuat').bootstrapSwitch('state',true);
                    //  $('#chkcelu2').bootstrapSwitch('state',false);
                    }
                    else //if($("td:eq(11)",this).text().trim()=="2")
                    {
                      $('#chkcelupacifuat').bootstrapSwitch('state',false);
                     // $('#chkcelu2').bootstrapSwitch('state',true);
                    }
                    


                    //$('#txtmoticonsufuat').prop('value',$("td:eq(12)",this).text().trim());
                    if($("td:eq(12)",this).text().trim()=="1")
                    {
                      $('#chksiste1pacifuat').bootstrapSwitch('state',true);
                      $('#chksiste2pacifuat').bootstrapSwitch('state',false);
                    }
                    else if($("td:eq(12)",this).text().trim()=="2")
                    {
                      $('#chksiste1pacifuat').bootstrapSwitch('state',false);
                      $('#chksiste2pacifuat').bootstrapSwitch('state',true);
                    }
*/



                    // $('#txtcorreopacifuat').prop('value',$("td:eq(13)",this).text().trim());
                    //$('#txtnomdocu2').prop('value',$("td:eq(13)",this).text().trim());
                    //$("#iframedocu2").attr("src","docu/" + $("td:eq(13)",this).text().trim());
                    
                    if ($("td:eq(13)",this).text().trim().length>0)
                     {
                        $('#txtnomdocu2').prop('value',$("td:eq(13)",this).text().trim());
                        $("#iframedocu2").attr("src","docu/" + $("td:eq(13)",this).text().trim());  
                     }
                    else
                     {
                        $('#txtnomdocu2').prop('value','');
                        $('#iframedocu2').attr('src','images/docu.png');
                     }
                    



                   // $('#txttelepacifuat').prop('value',$("td:eq(14)",this).text().trim());
                 
                    $('#cbodepapacifuat').empty();
                    $('#cbodepapacifuat').append($('<option>', {
                       value: $("td:eq(15)", this).text().trim(),
                       text: $("td:eq(16)", this).text().trim()
                    }));
                    $('#cbodepapacifuat').prop('value',$("td:eq(15)",this).text().trim());



                 
                   // $('#txtcelupacifuat').prop('value',$("td:eq(17)",this).text().trim());
                    $('#cbosexopacifuat').prop('disabled',false);
                    $('#cbosexopacifuat').prop('value',$("td:eq(18)",this).text().trim());
                    $('#cbosexopacifuat').prop('disabled',true);

                    //$('#chkaceptapacifuat').prop('value',$("td:eq(19)",this).text().trim());
                    if($("td:eq(19)",this).text().trim()=="1")
                    {
                      $('#chkaceptapacifuat').bootstrapSwitch('state',true);
                    
                    }
                    else
                    {
                      $('#chkaceptapacifuat').bootstrapSwitch('state',false);
                      
                    }


                   // $('#cboespefuat').prop('value',$("td:eq(20)",this).text().trim());


                    
                   // $('#cbodistripacifuat').prop('value',$("td:eq(21)",this).text().trim());
                    $('#cbodistripacifuat').empty();
                    $('#cbodistripacifuat').append($('<option>', {
                       value: $("td:eq(21)", this).text().trim(),
                       text: $("td:eq(35)", this).text().trim()
                    }));
                    $('#cbodistripacifuat').prop('value',$("td:eq(21)",this).text().trim());


                   
                    //$('#textrecofuat').prop('value',$("td:eq(22)",this).text().trim());
                    
                    /* 16032023
                    if($("td:eq(22)",this).text().trim()=="1")
                    {
                      $('#chkcondifisipacifuat').bootstrapSwitch('state',true);
                  //    $('#chkcodifisi2').bootstrapSwitch('state',false);
                    }
                    else //if($("td:eq(22)",this).text().trim()=="2")
                    {
                      $('#chkcondifisipacifuat').bootstrapSwitch('state',false);
                     // $('#chkcodifisi2').bootstrapSwitch('state',true);
                    }
                    */


                  //  $('#txtfechaemifuat').prop('value',$("td:eq(23)",this).text().trim());
                    $('#txtnompacifuat').prop('value',$("td:eq(24)",this).text().trim());

                   // $('#txtfechatelefuat').prop('value',$("td:eq(25)",this).text().trim());
                   /*
                    <?php
                          if ($fnavegador['nombre']=='Google Chrome' )
                            {
                          ?>   
                              //convert formato de fecha a yyyy-MM-DD
                              $('#txtfechatelefuat').val($("td:eq(25)", this).text().trim().substring(6,10)+'-'+$("td:eq(25)", this).text().trim().substring(3,5)+'-'+$("td:eq(25)", this).text().trim().substring(0,2));
                          <?php
                            }
                          else 
                            {   
                          ?>   
                              $('#txtfechatelefuat').val($("td:eq(25)", this).text().trim());


                    <?php } ?>   
                    */

                    // $('#txtfechatelefuat').val($("td:eq(25)", this).text().trim());
                      //$('#txtfechatelefuat').val($("td:eq(26)", this).text().trim());
                      $('#txtfechatelefuat').val($("td:eq(23)", this).text().trim());




                    //$('#cbotiposegupacifuat').prop('value',$("td:eq(26)",this).text().trim());
                    //$('#txtservipacifuat').prop('value',$("td:eq(27)",this).text().trim());
                    //$('#txtusuemifuat').prop('value',$("td:eq(27)",this).text().trim());
                    
                  //  $('#txtdatosusuemifuat').prop('value',$("td:eq(28)",this).text().trim());
                  //  $('#txtnrocoleusuemifuat').prop('value',$("td:eq(29)",this).text().trim());
                  //  $('#txtnrorneusuemifuat').prop('value',$("td:eq(30)",this).text().trim());
                  //  $('#txtespeusuemifuat').prop('value',$("td:eq(31)",this).text().trim());

                    $('#cboprovpacifuat').empty();
                    $('#cboprovpacifuat').append($('<option>', {
                       value: $("td:eq(33)", this).text().trim(),
                       text: $("td:eq(34)", this).text().trim() 
                    }));
                    $('#cboprovpacifuat').prop('value',$("td:eq(33)",this).text().trim());


                    //$('#cboestaoripacifuat').prop('value',$("td:eq(35)",this).text().trim());

                  //$('#txtservipacifuat').prop('value',$("td:eq(27)",this).text().trim());
                  $('#txtservipacifuat').empty();
                  $('#txtservipacifuat').append($('<option>', {
                       value: $("td:eq(32)", this).text().trim(),
                       text: $("td:eq(27)", this).text().trim()
                    }));
                  $('#txtservipacifuat').prop('value',$("td:eq(32)",this).text().trim());



                  if ($("td:eq(28)",this).text().trim()=='PAGANTE')
                    {
                        $('#cbotipopacifuat').prop('value','1');  
                        $('#divrefe').hide();
                    }
                    else if ($("td:eq(28)",this).text().trim()=='SIS')
                    {
                        $('#cbotipopacifuat').prop('value','2');  
                        $('#divrefe').show();
                    }
                    else if ($("td:eq(28)",this).text().trim()=='GRATUITO')
                    {
                        $('#cbotipopacifuat').prop('value','3');  
                        $('#divrefe').hide();
                    }
                    


                   $('#txtobsaceptasolicitafuat').prop('value',$("td:eq(29)",this).text().trim());
               
                   if($("td:eq(30)",this).text().trim()=="SI")
                    {
                      $('#chkaceptasolicitafuat').bootstrapSwitch('state',true);
                    }
                    else 
                    {
                      $('#chkaceptasolicitafuat').bootstrapSwitch('state',false);
                    
                    }
                   


                    //$('#cbotipodocuapofuat').prop('value',$("td:eq(41)",this).text().trim());
                    //$('#txtnrodocuapofuat').prop('value',$("td:eq(42)",this).text().trim());
                          /*
                          <?php
                          if ($fnavegador['nombre']=='Google Chrome' )
                            {
                          ?>   
                              //convert formato de fecha a yyyy-MM-DD
                              $('#txtfechanaciapofuat').val($("td:eq(43)", this).text().trim().substring(6,10)+'-'+$("td:eq(43)", this).text().trim().substring(3,5)+'-'+$("td:eq(43)", this).text().trim().substring(0,2));
                          <?php
                            }
                          else 
                            {   
                          ?>   
                              $('#txtfechanaciapofuat').val($("td:eq(43)", this).text().trim());
                          <?php } ?> 
                          */

                          //$('#txtfechanaciapofuat').val($("td:eq(43)", this).text().trim());
                          $('#cboapofuat').val($("td:eq(43)", this).text().trim());
                          $("#cboapofuat").change();
                    
                    /*
                    $('#txtapepatapofuat').prop('value',$("td:eq(44)",this).text().trim());  
                    $('#txtapematapofuat').prop('value',$("td:eq(45)",this).text().trim());  
                    */
                    $('#txtnomapofuat').prop('value',$("td:eq(46)",this).text().trim());  
                    $('#txtcorreoapofuat').prop('value',$("td:eq(47)",this).text().trim());  
                    $('#txtteleapofuat').prop('value',$("td:eq(48)",this).text().trim());  
                    $('#txtceluapofuat').prop('value',$("td:eq(49)",this).text().trim());  
                    $('#textdetasolicita').prop('value',$("td:eq(50)",this).text().trim());  

                    $('#cbodepanacipacifuat').empty();
                    $('#cbodepanacipacifuat').append($('<option>', {
                       value: $("td:eq(52)", this).text().trim(),
                       text: $("td:eq(53)", this).text().trim()
                    }));
                    $('#cbodepanacipacifuat').prop('value',$("td:eq(52)",this).text().trim());

                    $('#cboprovnacipacifuat').empty();
                    $('#cboprovnacipacifuat').append($('<option>', {
                       value: $("td:eq(54)", this).text().trim(),
                       text: $("td:eq(55)", this).text().trim()
                    }));
                    $('#cboprovnacipacifuat').prop('value',$("td:eq(54)",this).text().trim());

                    $('#cbodistrinacipacifuat').empty();
                    $('#cbodistrinacipacifuat').append($('<option>', {
                       value: $("td:eq(56)", this).text().trim(),
                       text: $("td:eq(57)", this).text().trim()
                    }));
                    $('#cbodistrinacipacifuat').prop('value',$("td:eq(56)",this).text().trim());

                    $('#txtapepatmatnomapofuat').prop('value',$("td:eq(58)",this).text().trim());  

                    

                    $('#cbomodasolipacifuat').prop('value',$("td:eq(60)",this).text().trim());  

                    $('#cbopaisnacipacifuat').empty();
                    $('#cbopaisnacipacifuat').append($('<option>', {
                       value: $("td:eq(62)", this).text().trim(),
                       text: $("td:eq(63)", this).text().trim() 
                    }));
                    $('#cbopaisnacipacifuat').prop('value',$("td:eq(62)",this).text().trim());
                    //$('#txtdniapepatmatnomapofuat').prop('value',$("td:eq(64)",this).text().trim());  

                    if($("td:eq(66)",this).text().trim()=="SI")
                    {
                      $('#cboespesolihospi').prop('value','1');  
                    }
                    else if($("td:eq(66)",this).text().trim()=="NO")
                    {
                      $('#cboespesolihospi').prop('value','2');  
                    }

                    if($("td:eq(67)",this).text().trim()=="SI")
                    {
                      $('#cbocitaespesolihospi').prop('value','1');  
                    }
                    else if($("td:eq(67)",this).text().trim()=="NO")
                    {
                      $('#cbocitaespesolihospi').prop('value','2');  
                    }

                    $('#txtnrohojarefefuat').prop('value',$("td:eq(73)",this).text().trim());  
                    $('#txtfecharefefuat').prop('value',$("td:eq(74)",this).text().trim());  
                    $('#txtnomapofuat').prop('value',$("td:eq(75)",this).text().trim());  


                    $('#cbomediservifuat').empty();
                    $('#cbomediservifuat').append($('<option>', {
                       value: $("td:eq(76)", this).text().trim(),
                       text: $("td:eq(77)", this).text().trim()
                      }));
                    $('#cbomediservifuat').prop('value',$("td:eq(76)",this).text().trim());
                    
                    if ($("td:eq(32)", this).text().trim()=='190103' || $("td:eq(32)", this).text().trim()=='150809') //fisioterapia,gastro
                    {
                      $('#mensamediservi').show();
                    }
                    else
                    {
                      $('#mensamediservi').hide();
                    }
                    

                    


                });

                   $('#btingrefuat').click();  

                  $("#txtfechaini").prop("value","<?php echo $fechaini; ?>");
                  $("#txtfechafin").prop("value","<?php echo $fechafin; ?>");

                  $('#divhospi').hide();  
                  
                 
                 
               

           });

       </script>



    </body>
</html>