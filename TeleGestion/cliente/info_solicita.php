<?php
  header('Content-Type: text/html; charset=ISO-8859-1');
  //header('Content-Type: text/html; charset=utf-8;charset=ISO-8859-1');
  //header("Content-type: application/json; charset=utf-8");
  //header("Content-type: application/pdf; charset=utf-8");
  
  //header('Content-type:application/json; charset=ISO-8859-1');

  session_start();
  if ($_SESSION['usu']=='')
   {
     header('Location:login.php');
     exit;
   }


  include("../cliente/fpdf181/fpdf.php");
  class PDF extends FPDF
    {

      function Header()
       {
          $this->SetY(10);
          $this->SetTextColor(200,0,120);
          $this->SetFont('Arial','B',10);
          $this->image('../cliente/images/logoinfo.gif',10,12,22,10,'gif','../cliente/index.php');
  
  
          $this->Cell(70,10,'',0);
          $this->Cell(1,10,'SOLICITUD DE CITA',0);
          $this->Cell(86,10,'',0);
          $this->Cell(1,10,'Fecha: ' .date('d/m/Y').'',0);  

          $this->ln(5);
          $this->Cell(50,10,'',0);
          $this->Cell(1,10,'TELEORIENTACION Y TELEMONITOREO',0);
          $this->Cell(106,10,'',0);
          $this->Cell(1,10,'Usuario: ' .$_SESSION['usuacce'].'',0);  
          
          $this->ln(5);
          $this->Cell(166,10,'',0);
          $this->Cell(1,10,utf8_decode('Página: '. $this->PageNo()),0,0,'C');
          $this->image('../cliente/images/cancelar.gif',185,22,5,5,'gif','../cliente/index.php');

          


          $this->ln(5);

          $this->Cell(160,10,'________________________________________________________________________________________________',0);

          $this->ln(10);

        }

      function Footer()
        {
          $this->SetY(-25);
          $this->SetTextColor(200,0,120);
          $this->SetFont('Arial','B',10);
          $this->Cell(160,10,'________________________________________________________________________________________________',0);
    
          $this->ln(8);
          $this->Cell(1,10,'OEI - Oficina de Estadistica e informatica',0);
          $this->Cell(123,10,'',0);
          $this->Cell(1,10,'ADS - Area de Desarrollo De Sistemas',0);
          

          
        }

    }
    
    $pdf=new PDF();
    //$pdf = new PDF('P', 'cm', array(29,21));
    $pdf->AddPage('P');

    include('../negocio/clsnegocio.php');
    $clsnegocio = new clsnegocio;
    //$arrayinfo = $clsnegocio->finfo($_SESSION['dni'],'','','','infofic',''); 
    $arrayinfo = $clsnegocio->finfo($_POST['txtcodifuat'],'','','','infofuat',''); 
    if($arrayinfo) 
      {
        foreach ($arrayinfo as $datainfo):
         
          $pdf->SetTextColor(200,0,120);
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'DATOS PERSONALES DEL PACIENTE:',0);

          
          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Codigo:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['codigo'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Tipo Documento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['tipodocupaci'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Nro. Documento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['nrodocupaci'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Paciente:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['apepatpaci'].' '.$datainfo['apematpaci'].' '.$datainfo['nompaci'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Fecha Nacimiento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['fechanacipaci'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Sexo:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['sexopaci'],0);
/*
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Tipo Seguro:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['tiposegu'],0);


          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Correo:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['correo'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Telefono:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['tele'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Celular:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['celu'],0);
*/

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Residencia Actual:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['descdepa'].' '.$datainfo['descprov'].' '.$datainfo['descdistri'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Direccion:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['dire'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Establecimiento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['refe'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Especialidad:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['servi'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Fecha de Solicitud de Cita:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['fechaemi'],0);


          $pdf->SetTextColor(200,0,120);
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(10);
          $pdf->Cell(1,8,'DATOS PERSONALES DEL APODERADO:',0);

          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Tipo Documento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['tipodocuapo'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Nro. Documento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['nrodocuapo'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Apoderado:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['apepatapo'].' '.$datainfo['apematapo'].' '.$datainfo['nomapo'],0);
/*
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Fecha Nacimiento:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['fechanaciapo'],0);
*/
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Correo Electronico:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['correoapo'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Telefono:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['teleapo'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Celular:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,'',0);
          $pdf->Cell(1,8,$datainfo['celuapo'],0);



/*

          $pdf->SetTextColor(200,0,120);
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(10);
          $pdf->Cell(1,8,'SOLICITUD DE PREGUNTAS:',0);


          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Como desea atender la atencion?:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(60,8,'',0);
          $pdf->Cell(1,8,$datainfo['llamada'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Utiliza aplicaciones de mensajeria instantanea?:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(82,8,'',0);
          $pdf->Cell(1,8,$datainfo['aplica'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Dispone de un Celular o Tablet con acceso a interner?:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(92,8,'',0);
          $pdf->Cell(1,8,$datainfo['dispocelu'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Con que Sistema Operativo funciona su Celular?:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(85,8,'',0);
          $pdf->Cell(1,8,$datainfo['sisteope'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Tiene alguna condicion fisica que lo limite en el manejo del Celular o Tablet?:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(133,8,'',0);
          $pdf->Cell(1,8,$datainfo['condifisi'],0);

          $pdf->SetFont('Arial','B',10);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Motivo de Consulta:',0);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(38,8,'',0);
          $pdf->MultiCell(100,8,$datainfo['moticonsu'],0,'L',false);
          */


/*

          $pdf->ln(5);
          $pdf->Cell(50,8,'',0);
          $pdf->SetFont('Arial','',10);
          $pdf->MultiCell(140,8,'4] '.$datainfo['mfi_fun4'],0,'L',false);
*/
  
      endforeach;
      $pdf->Output();
    }

?>


 