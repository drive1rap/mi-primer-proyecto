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

     /*
		$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
	 */
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(40);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setWidth(15);

    $objPHPExcel->getActiveSheet()->getStyle("A2:J2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->getFill()->getStartColor()->setARGB("FF1E90FF");

    

	//titulo
	$objRichText = new PHPExcel_RichText();
	//$objRichText->createText('你好 ');
	$objPayable = $objRichText->createTextRun("LISTADO DE SOLICITUD DE CITAS");
	$objPayable->getFont()->setBold(true);
	//$objPayable->getFont()->setItalic(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED));
	$objPHPExcel->getActiveSheet()->setCellValue("B1", $objRichText);
    $objPHPExcel->getActiveSheet()->getStyle("B1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//nro
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("NRO");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("A2", $objRichText);
	$objPHPExcel->getActiveSheet()->getStyle("A2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//codigo
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("CODIGO");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("B2", $objRichText);
	$objPHPExcel->getActiveSheet()->getStyle("B2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//nrodocu
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("NRO DOCU");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("C2", $objRichText);
	$objPHPExcel->getActiveSheet()->getStyle("C2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	                              
	//apellidos y nombres
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("APELLIDOS Y NOMBRES");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("D2", $objRichText);                            
	$objPHPExcel->getActiveSheet()->getStyle("D2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  

	//fechanaci
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("FECHA EMISION");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("E2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("E2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


	//especialidad
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("ESPECIALIDAD");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("F2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("F2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//fecha emision
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("FECHA USUARIO");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("G2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("G2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//usuario
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("USUARIO");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("H2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("H2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//aceptacion
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("ACEPTA");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("I2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("I2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//tipopaci
	$objRichText = new PHPExcel_RichText();
	$objPayable = $objRichText->createTextRun("TIPOPACI");
	$objPayable->getFont()->setBold(true);
	$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_WHITE) );
	$objPHPExcel->getActiveSheet()->setCellValue("J2", $objRichText);                              
	$objPHPExcel->getActiveSheet()->getStyle("J2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    include("../negocio/clsnegocio.php");
    $clsnegocio = new clsnegocio;
    $arrayinfo = $clsnegocio->finfo($_SESSION["fechaimpre"],"","","","infolistafuat",""); 
    $nro=3;
    if($arrayinfo) 
       {
	        foreach ($arrayinfo as $datainfo):
	        	$objPHPExcel->getActiveSheet()->setCellValue("A".$nro, $nro-2)
		                              ->setCellValue("B".$nro, $datainfo["codigo"])
		                              ->setCellValue("C".$nro,$datainfo["nrodocupaci"])
		                              ->setCellValue("D".$nro, utf8_encode($datainfo["apepatpaci"])." ".utf8_encode($datainfo["apematpaci"])." ".utf8_encode($datainfo["nompaci"]))
		                              ->setCellValue("E".$nro,$datainfo["fechaemi"])
		                              ->setCellValue("F".$nro,$datainfo["servi"])
		                              ->setCellValue("G".$nro,$datainfo["fechaactu"])
		                              ->setCellValue("H".$nro,$datainfo["usuactu"])
		                              ->setCellValue("I".$nro,$datainfo["acepta"])
									  ->setCellValue("J".$nro,$datainfo["tipopaci"]);
	               


	            $nro=$nro+1;
	        endforeach;
        }

	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle("Solicitud de Citas");


	// Redirect output to a client’s web browser (Excel5)

	header("Content-Type: application/vnd.ms-excel");
	header('Content-Disposition: attachment;filename="ListaSoliCitas.xls"');
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