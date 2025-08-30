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
  
  
          $this->Cell(96,10,'',0);
          $this->Cell(1,10,'LISTA DE SOLICITUD DE CITAS POR PROVINCIA',0);
          $this->Cell(147,10,'',0);
          $this->Cell(1,10,'Fecha: ' .date('d/m/Y').'',0);  

          $this->ln(5);
          $this->Cell(104,10,'',0);
          $this->Cell(1,10,'TELEORIENTACION Y TELEMONITOREO',0);
          $this->Cell(139,10,'',0);
          $this->Cell(1,10,'Usuario: ' .$_SESSION['usuacce'].'',0);  

          $this->ln(5);
          $this->Cell(130,10,'',0);
          $this->Cell(1,10,$_POST['txtfechaimpre'],0);
          $this->Cell(122,10,'',0);
          $this->Cell(1,10,utf8_decode('Página: '. $this->PageNo()),0,0,'C');
          $this->image('../cliente/images/excel.gif',273,22,5,5,'gif','../cliente/expolistaprovsolicita.php');

          $this->ln(8);
          $this->Cell(160,10,'____________________________________________________________________________________________________________________________________________',0);

          $this->ln(5);
          $this->SetTextColor(0,100,220);
          $this->SetFont('Arial','B',8);
          $this->Cell(160,10,'----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0);
          $this->ln(5);
          $this->Cell(100,10,'NRO | CODIGO |  NRO DOCU  | APELLIDOS Y NOMBRE(S) DEL PACIENTE                             |  FECHA USUARIO  |             ESPECIALIDAD          |          DISTRITO           |       PROVINCIA       |    DEPARTAMENTO  ',0);
          $this->ln(5);
          $this->Cell(160,10,'----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0);
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
    $arrayinfo = $clsnegocio->finfo($_SESSION['fechaimpre'],'','','','infolistaprovfuat',''); 
    $nro=1;
    if($arrayinfo) 
      {
        foreach ($arrayinfo as $datainfo):

         
          
          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','',8);
          $pdf->ln(5);
          $pdf->Cell(7,5,' ',0);
          $pdf->Cell(1,5,' '.$nro,0,0,'R');

          $pdf->Cell(13,5,' ',0);
          $pdf->Cell(1,5,$datainfo['codigo'],0,0,'R');
          
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['nrodocupaci'],0,0,'L');

          $pdf->Cell(16,5,' ',0);
          $pdf->Cell(1,5,$datainfo['apepatpaci'].' '.$datainfo['apematpaci'].' '.$datainfo['nompaci'],0,0,'L');

          $pdf->Cell(84,5,' ',0);
          $pdf->Cell(1,5,$datainfo['fechaactu'],0,0,'L');

          $pdf->Cell(23,5,' ',0);
          $pdf->Cell(1,5,$datainfo['servi'],0,0,'L');

          $pdf->Cell(40,5,' ',0);
          $pdf->Cell(1,5,$datainfo['descdistri'],0,0,'L');

          $pdf->Cell(28,5,' ',0);
          $pdf->Cell(1,5,$datainfo['descprov'],0,0,'L');

          $pdf->Cell(28,5,' ',0);
          $pdf->Cell(1,5,$datainfo['descdepa'],0,0,'L');

          


/*
          $nrodeta=1;
          $arrayinfodeta = $clsnegocio->finfo($datainfo['mtr_correo'],'','','','infojefedetaficvali',''); 
          if($arrayinfodeta) 
            {
               foreach ($arrayinfodeta as $datainfodeta):
                 $pdf->ln(5);
                 $pdf->SetTextColor(0,0,102);
                 $pdf->SetFont('Arial','',8);
                 $pdf->Cell(25,5,'',0);
                 $pdf->Cell(8,5,$nrodeta,0);
                 $pdf->Cell(16,5,$datainfodeta['mtr_dni_traba'],0);
                 $pdf->Cell(80,5,$datainfodeta['mtr_apepat_traba'].' '.$datainfodeta['mtr_apemat_traba'].' '.$datainfodeta['mtr_nom_traba'],0);

                 $nrodeta=$nrodeta+1;
               endforeach;

            }
            */




          $nro=$nro+1;

      endforeach;
      $pdf->Output();
    }

?>


 