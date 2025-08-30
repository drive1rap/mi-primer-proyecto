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
          $this->Cell(1,10,'CONSOLIDACION DE SOLICITUD DE CITAS POR DIA',0);
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
          $this->image('../cliente/images/excel.gif',273,22,5,5,'gif','../cliente/expoconsousudiasolicita.php');

          $this->ln(8);
          $this->Cell(160,10,'____________________________________________________________________________________________________________________________________________',0);

          $this->ln(5);
          $this->SetTextColor(0,100,220);
          $this->SetFont('Arial','B',6);
          $this->Cell(160,10,'--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0);
          $this->ln(5);
          $this->Cell(100,10,'|  NRO  |            USUARIO            |   01  |   02  |  03   |  04    |  05   |  06   |  07   |  08   |  09   |  10    |  11   |  12   |  13   |  14   |  15    |  16   |  17   |  18   |  19   |  20   |  21   |  22    |   23   |  24   |  25   |  26   |  27   |  28   |  29   |   30    |  31   |  TOTAL  |',0);
          $this->ln(5);
          $this->Cell(160,10,'--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0);
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
    $arrayinfo = $clsnegocio->finfo($_SESSION['fechaimpre'],'','','','infoconsousudiafuat',''); 
    $nro=1;
    $total01=0;
    $total02=0;
    $total03=0;
    $total04=0;
    $total05=0;
    $total06=0;
    $total07=0;
    $total08=0;
    $total09=0;
    $total10=0;
    $total11=0;
    $total12=0;
    $total13=0;
    $total14=0;
    $total15=0;
    $total16=0;
    $total17=0;
    $total18=0;
    $total19=0;
    $total20=0;
    $total21=0;
    $total22=0;
    $total23=0;
    $total24=0;
    $total25=0;
    $total26=0;
    $total27=0;
    $total28=0;
    $total29=0;
    $total30=0;
    $total31=0;


    $totalgral=0;
    if($arrayinfo) 
      {
        foreach ($arrayinfo as $datainfo):

         
          
          $pdf->SetTextColor(0,100,220);
          $pdf->SetFont('Arial','',6);
          $pdf->ln(5);

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(6,5,' ',0);
          $pdf->Cell(1,5,' '.$nro,0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,' ',0);
          $pdf->Cell(1,5,'|',0);

          $pdf->SetFont('Arial','',6);
          $pdf->Cell(3,5,' ',0);
          $pdf->Cell(1,5,$datainfo['usuactu'],0);
          
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(18,5,' ',0);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['01'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);

          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['02'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['03'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['04'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['05'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['06'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);

          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['07'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['08'],0,0,'R');


          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['09'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['10'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['11'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['12'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['13'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['14'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['15'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['16'],0,0,'R');
          
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['17'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['18'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['19'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['20'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['21'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['22'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['23'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['24'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['25'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['26'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['27'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['28'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['29'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['30'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);
          
          $pdf->SetFont('Arial','',6);
          $pdf->Cell(4,5,' ',0);
          $pdf->Cell(1,5,$datainfo['31'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);

          $pdf->SetFont('Arial','',6);
          $pdf->Cell(8,5,' ',0);
          $pdf->Cell(1,5,$datainfo['total'],0,0,'R');

          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(1,5,'|',0);

          $total01=$total01+$datainfo['01'];
          $total02=$total02+$datainfo['02'];
          $total03=$total03+$datainfo['03'];
          $total04=$total04+$datainfo['04'];
          $total05=$total05+$datainfo['05'];
          $total06=$total06+$datainfo['06'];
          $total07=$total07+$datainfo['07'];
          $total08=$total08+$datainfo['08'];
          $total09=$total09+$datainfo['09'];
          $total10=$total10+$datainfo['10'];
          $total11=$total11+$datainfo['11'];
          $total12=$total12+$datainfo['12'];
          $total13=$total13+$datainfo['13'];
          $total14=$total14+$datainfo['14'];
          $total15=$total15+$datainfo['15'];
          $total16=$total16+$datainfo['16'];
          $total17=$total17+$datainfo['17'];
          $total18=$total18+$datainfo['18'];
          $total19=$total19+$datainfo['19'];
          $total20=$total20+$datainfo['20'];
          $total21=$total21+$datainfo['21'];
          $total22=$total22+$datainfo['22'];
          $total23=$total23+$datainfo['23'];
          $total24=$total24+$datainfo['24'];
          $total25=$total25+$datainfo['25'];
          $total26=$total26+$datainfo['26'];
          $total27=$total27+$datainfo['27'];
          $total28=$total28+$datainfo['28'];
          $total29=$total29+$datainfo['29'];
          $total30=$total30+$datainfo['30'];
          $total31=$total31+$datainfo['31'];
          


          $totalgral=$totalgral+$datainfo['01']+$datainfo['02']+$datainfo['03']+$datainfo['04']+$datainfo['05']+$datainfo['06']+$datainfo['07']+$datainfo['08']+$datainfo['09']+$datainfo['10']
          +$datainfo['11']+$datainfo['12']+$datainfo['13']+$datainfo['14']+$datainfo['15']+$datainfo['16']+$datainfo['17']+$datainfo['18']+$datainfo['19']+$datainfo['20']
          +$datainfo['21']+$datainfo['22']+$datainfo['23']+$datainfo['24']+$datainfo['25']+$datainfo['26']+$datainfo['27']+$datainfo['28']+$datainfo['29']+$datainfo['30']+$datainfo['31'];
          $nro=$nro+1;

      endforeach;

      $pdf->SetTextColor(0,100,220);
      $pdf->ln(8);

      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(13,5,' ',0);
      $pdf->Cell(1,5,'TOTAL : ',0,0,'L');
 
      $pdf->SetFont('Arial','',6);
      $pdf->Cell(24,5,' ',0);
      $pdf->Cell(1,5,$total01,0,0,'R');

      $pdf->Cell(6,5,' ',0);
      $pdf->Cell(1,5,$total02,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total03,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total04,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total05,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total06,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total07,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total08,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total09,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total10,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total11,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total12,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total13,0,0,'R');

      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total14,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total15,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total16,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total17,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total18,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total19,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total20,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total21,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total22,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total23,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total24,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total25,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total26,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total27,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total28,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total29,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total30,0,0,'R');
      
      $pdf->Cell(5,5,' ',0);
      $pdf->Cell(1,5,$total31,0,0,'R');


      $pdf->Cell(7,5,' ',0);
      $pdf->Cell(1,5,$totalgral,0,0,'R');

      $pdf->Output();
    }

?>


 