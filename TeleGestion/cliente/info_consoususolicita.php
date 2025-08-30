<?php
  //header('Content-Type: text/html; charset=ISO-8859-1');
  //header('Content-Type: text/html; charset=utf-8;charset=ISO-8859-1');
  //header("Content-type: application/json; charset=utf-8");

  header("Content-type: application/pdf; charset=utf-8");
  session_start();
  if ($_SESSION['usu']=='')
   {
     header('Location:index.php');
     exit;
   }

  
  include("../cliente/fpdf181/fpdf.php");
   $_SESSION['fechaimpre']="";
  
  class PDF extends FPDF
    {

      function Header()
       {
          $this->SetY(10);
          $this->SetTextColor(200,0,120);
          $this->SetFont('Arial','B',10);
          $this->image('../cliente/images/logoinfo.gif',10,12,22,10,'gif','../cliente/index.php');
  
  
          $this->Cell(89,10,'',0);
          $this->Cell(1,10,'CONSOLIDACION DE SOLICITUD DE CITAS POR USUARIO',0);
          $this->Cell(154,10,'',0);
          $this->Cell(1,10,'Fecha: ' .date('d/m/Y').'',0);  

          $this->ln(5);
          $this->Cell(104,10,'',0);
          $this->Cell(1,10,'TELEORIENTACION Y TELEMONITOREO',0);
          $this->Cell(139,10,'',0);
          $this->Cell(1,10,'Usuario: ' .$_SESSION['usuacce'].'',0);  

          $this->ln(5);
          $this->Cell(120,10,'',0);
          $this->Cell(1,10,$_POST['txtfechaimpre'],0);
          $this->Cell(132,10,'',0);
          $this->Cell(1,10,utf8_decode('Página: '. $this->PageNo()),0,0,'C');
          $this->image('../cliente/images/excel.gif',273,22,5,5,'gif','../cliente/expoconsoususolicita.php');

          $this->ln(8);
          $this->Cell(160,10,'____________________________________________________________________________________________________________________________________________',0);

          $this->ln(5);
          $this->SetTextColor(0,100,220);
          $this->SetFont('Arial','B',8);
          $this->Cell(160,10,'-----------------------------------------------------------------------------------------------------------------------',0);
          $this->ln(5);
          $this->Cell(100,10,'|    NRO    |          USUARIO          |   PAGANTE   |      SIS      |   GRATUITO   |   TOTAL  |',0);
          $this->ln(5);
          $this->Cell(160,10,'-----------------------------------------------------------------------------------------------------------------------',0);
          $this->ln(5);
        }

      function Footer()
        {
          $this->SetY(-25);
          $this->SetTextColor(200,0,120);
          $this->SetFont('Arial','B',10);
          $this->Cell(160,10,'____________________________________________________________________________________________________________________________________________',0);

    
          $this->ln(8);
          $this->Cell(1,10,'OEI - Oficina de Estadistica e informatica',0);
          $this->Cell(210,10,'',0);
          $this->Cell(1,10,'ADS - Area de Desarrollo De Sistemas',0);

          
        }

    }
    
    $pdf=new PDF();
    $pdf->AddPage('L');

    include('../negocio/clsnegocio.php');
    $clsnegocio = new clsnegocio;
    //$arrayinfo = $clsnegocio->finfo($_SESSION['dni'],'','','','infofic',''); 
    $_SESSION['fechaimpre']=$_POST['txtfechaimpre'];
    $arrayinfo = $clsnegocio->finfo($_SESSION['fechaimpre'],'','','','infoconsousufuat',''); 
    $nro=1;
    $totalpaga=0;
    $totalsis=0;
    $totalgratui=0;
    $totalgral=0;
    if($arrayinfo) 
      {
        foreach ($arrayinfo as $datainfo):

         
          
          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','',8);
          $pdf->ln(5);

          
          $pdf->Cell(1,5,'|',0);

          $pdf->Cell(8,5,' ',0);
          $pdf->Cell(1,5,' '.$nro,0,0,'R');

          $pdf->Cell(3,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $pdf->Cell(5,5,' ',0);
          $pdf->Cell(1,5,$datainfo['usuactu'],0);
          
          $pdf->Cell(23,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $pdf->Cell(11,5,' ',0);
          $pdf->Cell(1,5,$datainfo['pagante'],0,0,'R');

          $pdf->Cell(6,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $pdf->Cell(10,5,' ',0);
          $pdf->Cell(1,5,$datainfo['sis'],0,0,'R');

          $pdf->Cell(3,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $pdf->Cell(12,5,' ',0);
          $pdf->Cell(1,5,$datainfo['gratuito'],0,0,'R');

          $pdf->Cell(6,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $pdf->Cell(10,5,' ',0);
          $pdf->Cell(1,5,$datainfo['total'],0,0,'R');

          $pdf->Cell(2,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $totalpaga=$totalpaga+$datainfo['pagante'];
          $totalsis=$totalsis+$datainfo['sis'];
          $totalgratui=$totalgratui+$datainfo['gratuito'];
          $totalgral=$totalgral+$datainfo['pagante']+$datainfo['sis']+$datainfo['gratuito'];
          $nro=$nro+1;

      endforeach;

      $pdf->SetTextColor(0,100,220);
      $pdf->SetFont('Arial','B',8);
      $pdf->ln(8);
      $pdf->Cell(20,5,' ',0);
      $pdf->Cell(1,5,'TOTAL : ',0);

      $pdf->Cell(28,5,' ',0);
      $pdf->Cell(1,5,$totalpaga,0,0,'L');

      $pdf->Cell(24,5,' ',0);
      $pdf->Cell(1,5,$totalsis,0,0,'R');

      $pdf->Cell(15,5,' ',0);
      $pdf->Cell(1,5,$totalgratui,0,0,'R');

      $pdf->Cell(17,5,' ',0);
      $pdf->Cell(1,5,$totalgral,0,0,'R');

      $pdf->Output();
    }

?>


 