<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportesController extends Reportes{

    public function Index(){
        security::validate();
        require_once('views/Reportes/Index.php');
    }
    
    public function createReportExcel(){
        security::validate();
        require_once('views/Reportes/ReporteExcel.php');
    }

    public function createReportPdf(){
        security::validate();
        require_once('views/Reportes/ReportePdf.php');
    }

}

?>