<?php

	header("Content-type:charset=ISO-8859-1");
	session_start();

	/** Error reporting */
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	//date_default_timezone_set('Europe/London');

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

	/** Include PHPExcel */
	//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
	include ("../Cliente/Classes/PHPExcel.php");


	// crear objeto PHPExcel
	$objPHPExcel = new PHPExcel();

	// propiedad del documento
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
								 ->setLastModifiedBy("Maarten Balliauw")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Test result file");
	 

	// activa la ficha
	$objPHPExcel->setActiveSheetIndex(0);


	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("R")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("S")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("T")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("U")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("V")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("W")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("X")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Y")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Z")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AA")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AB")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AC")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AD")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AE")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AF")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AG")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AH")->setWidth(15);


    $objPHPExcel->getActiveSheet()->getStyle("A2:AH2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	$objPHPExcel->getActiveSheet()->getStyle("A2:AH2")->getFill()->getStartColor()->setARGB("FF1E90FF");

    

	//titulo
	$objRichText = new PHPExcel_RichText();
	//$objRichText->createText('你好 ');
	$objPayable = $objRichText->createTextRun("CONSOLIDACION DE SOLICITUD DE CITAS POR DIA - ".$_SESSION["fechaimpre"]);
	$objPayable->getFont()->setBold(true);
	//$objPayable->getFont()->setItalic(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED));
	$objPHPExcel->getActiveSheet()->setCellValue("A1", $objRichText);
    $objPHPExcel->getActiveSheet()->getStyle("A1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	//nro
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("NRO");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("A2", $objRichText);
	$objPHPExcel->getActiveSheet()->getStyle("A2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//usuario
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("USUARIO");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("B2", $objRichText);
	$objPHPExcel->getActiveSheet()->getStyle("B2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//01
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("01");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("C2", $objRichText);
	$objPHPExcel->getActiveSheet()->getStyle("C2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	                              
	//02
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("02");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("D2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("D2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//03
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("03");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("E2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("E2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//04
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("04");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("F2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("F2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
	
	//05
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("05");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("G2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("G2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
	
	//06
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("06");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("H2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("H2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//07
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("07");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("I2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("I2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//08
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("08");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("J2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("J2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//09
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("09");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("K2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("K2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//10
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("10");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("L2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("L2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//11
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("11");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("M2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("M2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//12
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("12");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("N2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("N2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//13
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("13");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("O2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("O2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//14
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("14");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("P2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("P2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//15
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("15");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("Q2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("Q2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//16
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("16");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("R2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("R2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//17
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("17");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("S2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("S2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//18
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("18");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("T2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("T2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//19
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("19");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("U2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("U2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//20
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("20");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("V2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("V2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//21
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("21");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("W2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("W2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//22
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("22");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("X2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("X2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//23
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("23");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("Y2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("Y2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//24
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("24");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("Z2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("Z2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

    //25
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("25");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AA2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AA2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//26
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("26");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AB2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AB2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//27
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("27");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AC2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AC2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//28
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("28");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AD2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AD2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//29
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("29");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AE2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AE2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//30
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("30");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AF2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AF2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//31
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("31");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AG2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("AG2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  


	//total
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("TOTAL");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("AH2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("AH2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    include("../negocio/clsnegocio.php");
    $clsnegocio = new clsnegocio;
    $arrayinfo = $clsnegocio->finfo($_SESSION["fechaimpre"],"","","","infoconsousudiafuat",""); 
    $nro=3;
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
	        	$objPHPExcel->getActiveSheet()->setCellValue("A".$nro, $nro-2)
		                              ->setCellValue("B".$nro, $datainfo["usuactu"])
		                              ->setCellValue("C".$nro,$datainfo["01"])
		                              ->setCellValue("D".$nro,$datainfo["02"])
									  ->setCellValue("E".$nro,$datainfo["03"])
									  ->setCellValue("F".$nro,$datainfo["04"])
									  ->setCellValue("G".$nro,$datainfo["05"])
									  ->setCellValue("H".$nro,$datainfo["06"])
									  ->setCellValue("I".$nro,$datainfo["07"])
									  ->setCellValue("J".$nro,$datainfo["08"])
									  ->setCellValue("K".$nro,$datainfo["09"])
									  ->setCellValue("L".$nro,$datainfo["10"])
									  ->setCellValue("M".$nro,$datainfo["11"])
									  ->setCellValue("N".$nro,$datainfo["12"])
									  ->setCellValue("O".$nro,$datainfo["13"])
									  ->setCellValue("P".$nro,$datainfo["14"])
									  ->setCellValue("Q".$nro,$datainfo["15"])
									  ->setCellValue("R".$nro,$datainfo["16"])
									  ->setCellValue("S".$nro,$datainfo["17"])
									  ->setCellValue("T".$nro,$datainfo["18"])
									  ->setCellValue("U".$nro,$datainfo["19"])
									  ->setCellValue("V".$nro,$datainfo["20"])
									  ->setCellValue("W".$nro,$datainfo["21"])
									  ->setCellValue("X".$nro,$datainfo["22"])
									  ->setCellValue("Y".$nro,$datainfo["23"])
									  ->setCellValue("Z".$nro,$datainfo["24"])
									  ->setCellValue("AA".$nro,$datainfo["25"])
									  ->setCellValue("AB".$nro,$datainfo["26"])
									  ->setCellValue("AC".$nro,$datainfo["27"])
									  ->setCellValue("AD".$nro,$datainfo["28"])
									  ->setCellValue("AE".$nro,$datainfo["29"])
									  ->setCellValue("AF".$nro,$datainfo["30"])
									  ->setCellValue("AG".$nro,$datainfo["31"])
		                              ->setCellValue("AH".$nro,$datainfo["total"]);

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
		

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun("TOTAL: ");
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("B".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("B".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total01);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("C".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("C".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total02);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("D".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("D".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total03);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("E".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("E".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total04);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("F".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("F".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total05);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("G".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("G".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total06);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("H".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("H".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total07);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("I".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("I".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total08);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("J".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("J".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total09);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("K".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("K".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total10);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("L".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("L".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total11);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("M".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("M".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total12);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("N".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("N".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total13);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("O".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("O".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total14);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("P".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("P".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total15);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("Q".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("Q".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total16);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("R".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("R".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total17);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("S".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("S".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total18);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("T".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("T".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total19);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("U".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("U".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total20);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("V".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("V".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total21);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("W".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("W".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total22);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("X".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("X".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total23);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("Y".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("Y".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total24);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("Z".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("Z".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total25);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AA".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AA".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total26);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AB".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AB".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total27);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AC".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AC".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total28);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AD".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AD".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total29);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AE".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AE".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total30);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AF".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AF".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($total31);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AG".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AG".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objRichText = new PHPExcel_RichText();
			$objPayable = $objRichText->createTextRun($totalgral);
			$objPayable->getFont()->setBold(true);
			$objPayable->getFont()->setColor( new PHPExcel_Style_Color('#000000'));
			$objPHPExcel->getActiveSheet()->setCellValue("AH".$nro, $objRichText);
			$objPHPExcel->getActiveSheet()->getStyle("AH".$nro)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        }

	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle("Consolidacion");


	// Redirect output to a client’s web browser (Excel5)

	header("Content-Type: application/vnd.ms-excel");
	header('Content-Disposition: attachment;filename="ConsolidaciondiaSolicitudCitas.xls"');
	header("Cache-Control: max-age=0");
	// If you're serving to IE 9, then the following may be needed
	header("Cache-Control: max-age=1");

	// If you're serving to IE over SSL, then the following may be needed
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header ("Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT"); // always modified
	header ("Cache-Control: cache, must-revalidate"); // HTTP/1.1
	header ("Pragma: public"); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
	$objWriter->save("php://output");
	exit;
?>