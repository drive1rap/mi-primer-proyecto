<?php
  header('Content-Type: text/html; charset=ISO-8859-1');
  //header('Content-Type: text/html; charset=utf-8;charset=ISO-8859-1');
  //header("Content-type: application/json; charset=utf-8");
  //header("Content-type: application/pdf; charset=utf-8");
  
  //header('Content-type:application/json; charset=ISO-8859-1');

 

  include("../cliente/fpdf181/fpdf.php");
  class PDF extends FPDF
    {

      function Header()
       {
          $this->SetY(10);
          $this->SetTextColor(200,0,120);
          $this->SetFont('Arial','B',7);
          $this->image('../cliente/images/logoinfo.gif',36,8,10,8,'gif','../cliente/index.php');
  
          $this->ln(5);
          $this->Cell(18,10,'',0);
          $this->Cell(1,10,'SOLICITUD DE CITA',0);
         
/*
          $this->ln(5);
          $this->Cell(5,10,'',0);
          $this->Cell(1,10,'TELEORIENTACION Y TELEMONITOREO',0);
          $this->Cell(106,10,'',0);
*/

       //  $this->Cell(1,10,'Usuario: ' .$_SESSION['usu'].'',0);  
          
       //   $this->ln(5);
       //   $this->Cell(56,10,'',0);
         // $this->Cell(1,10,utf8_decode('Página: '. $this->PageNo()),0,0,'C');
        //  $this->image('../cliente/images/cancelar.gif',55,22,5,5,'gif','../cliente/index.php');

          


          $this->ln(2);

          $this->Cell(160,10,'___________________________________________',0);

        //  $this->ln(10);

        }

      function Footer()
        {
          $this->SetY(-15);
          $this->SetTextColor(200,0,120);
          $this->SetFont('Arial','B',7);
          $this->Cell(160,10,'____________________________________________',0);
    
          $this->ln(5);
         // $this->Cell(1,10,'OEI - Oficina de Estadistica e informatica',0);
          $this->Cell(1,10,'',0);
          $this->Cell(1,10,'FECHA IMPRESION: ' .date('d/m/Y').'',0);  
          $this->Cell(50,10,'',0);
          $this->Cell(1,10,'OEI',0);
          

          
        }

    }
    
   // $pdf=new PDF();
  // $pdf = new PDF('P', 'cm', array(29,21));
   $pdf = new PDF('P','mm',array(100,80));
    $pdf->AddPage('P');

    include('../negocio/clsnegocio.php');
    $clsnegocio = new clsnegocio;
    //$arrayinfo = $clsnegocio->finfo($_SESSION['dni'],'','','','infofic',''); 
    $arrayinfo = $clsnegocio->finfo($_POST['txtdnipacifuat'],$_POST['txtservipacifuat'],$_POST['txtfechatelefuat'],'','infoticketfuat',''); 
    if($arrayinfo) 
      {
        foreach ($arrayinfo as $datainfo):
         
        //  $pdf->SetTextColor(200,0,120);
        //  $pdf->SetFont('Arial','B',7);
        //  $pdf->ln(5);
        //  $pdf->Cell(1,8,'DATOS PERSONALES DEL PACIENTE:',0);

          
          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','B',7);
          $pdf->ln(8);
          $pdf->Cell(1,8,'Codigo:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['codigo'],0);

          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Tipo Documento:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['tipodocupaci'],0);

          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Nro. Documento:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['nrodocupaci'],0);

          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Paciente:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['apepatpaci'].' '.$datainfo['apematpaci'].' '.$datainfo['nompaci'],0);

         
          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Sexo:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['sexopaci'],0);

          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Fecha Nacimiento:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['fechanacipaci'],0);

          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Fecha Registro:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['fechareg'],0);


          $pdf->SetFont('Arial','B',7);
          $pdf->ln(5);
          $pdf->Cell(1,8,'Especialidad:',0);
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(22,8,'',0);
          $pdf->Cell(1,8,$datainfo['servi'],0);


         


  
      endforeach;
      $pdf->Output();
    }

?>


 