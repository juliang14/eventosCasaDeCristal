<?php

require('vendor/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header(){
    
    // Logo
    $this->Image('Assets/img/Logo.jpeg',10,8,23);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(200,10,'Reporte '.$_REQUEST['tipoReporte'],1,0,'C');

    // Salto de línea
    $this->Ln(30);

    //$this->SetDrawColor(0,80,180);
    //$this->SetFillColor(255,192,203);
    $this->SetTextColor(0,11,146);
    
    
    

    if($_REQUEST['tipoReporte']=='Empleados'){
        $this->SetFont('Arial','B',6);    
        $this->Cell(20, 10, 'ID_EMPLEADO',1, 0, 'C',0);
        $this->Cell(30, 10, 'NOMBRES',1, 0, 'C',0);
        $this->Cell(25, 10, 'APELLIDOS',1, 0, 'C',0);
        $this->Cell(25, 10, 'DOCUMENTO',1, 0, 'C',0);
        $this->Cell(8, 10, 'EDAD',1, 0, 'C',0);
        $this->Cell(17, 10, 'TELEFONO',1, 0, 'C',0);
        $this->Cell(35, 10, 'EMAIL',1, 0, 'C',0);
        $this->Cell(18, 10, 'ROL',1, 0, 'C',0);
        $this->Cell(20, 10, 'CARGO',1, 0, 'C',0);
        $this->Cell(25, 10, 'USUARIO_SISTEMA',1, 0, 'C',0);
        $this->Cell(20, 10, 'CLAVE',1, 0, 'C',0);
        $this->Cell(20, 10, 'P_FECHA_INICIO',1, 0, 'C',0);
        $this->Cell(20, 10, 'P_FECHA_FIN',1, 1, 'C',0);

    }else if($_REQUEST['tipoReporte']=='Usuarios'){
        $this->SetFont('Arial','B',6);    
        $this->Cell(20, 10, 'ID_USUARIO',1, 0, 'C',0);
        $this->Cell(30, 10, 'NOMBRES',1, 0, 'C',0);
        $this->Cell(25, 10, 'APELLIDOS',1, 0, 'C',0);
        $this->Cell(25, 10, 'DOCUMENTO',1, 0, 'C',0);
        $this->Cell(8, 10, 'EDAD',1, 0, 'C',0);
        $this->Cell(17, 10, 'TELEFONO',1, 0, 'C',0);
        $this->Cell(45, 10, 'EMAIL',1, 0, 'C',0);
        $this->Cell(18, 10, 'ROL',1, 0, 'C',0);
        $this->Cell(25, 10, 'USUARIO_SISTEMA',1, 0, 'C',0);
        $this->Cell(20, 10, 'CLAVE',1, 0, 'C',0);
        $this->Cell(20, 10, 'P_FECHA_INICIO',1, 0, 'C',0);
        $this->Cell(20, 10, 'P_FECHA_FIN',1, 1, 'C',0);

    }else if($_REQUEST['tipoReporte']=='Pedidos'){
        $this->SetFont('Arial','B',3.5);    
        $this->Cell(8, 10, 'ID_PEDIDO',1, 0, 'C',0);
        $this->Cell(15, 10, 'FECHA_PEDIDO',1, 0, 'C',0);
        $this->Cell(20, 10, 'NOMBRES',1, 0, 'C',0);
        $this->Cell(20, 10, 'APELLIDOS',1, 0, 'C',0);
        $this->Cell(16, 10, 'DOCUMENTO',1, 0, 'C',0);
        $this->Cell(10, 10, 'ID_PAQUETE',1, 0, 'C',0);
        $this->Cell(16, 10, 'EVENTO',1, 0, 'C',0);
        $this->Cell(18, 10, 'PAQUETE',1, 0, 'C',0);
        $this->Cell(13, 10, 'VALOR_PAQUETE',1, 0, 'C',0);
        $this->Cell(9, 10, 'IVA',1, 0, 'C',0);
        $this->Cell(10, 10, 'VALOR_TOTAL',1, 0, 'C',0);
        $this->Cell(10, 10, 'ESTADO',1, 0, 'C',0);
        $this->Cell(16, 10, 'FECHA_INICIO_EVENTO',1, 0, 'C',0);
        $this->Cell(16, 10, 'FECHA_FIN_EVENTO',1, 0, 'C',0);
        $this->Cell(13, 10, 'CIUDAD_EVENTO',1, 0, 'C',0);
        $this->Cell(14, 10, 'BARRIO_EVENTO',1, 0, 'C',0);
        $this->Cell(21, 10, 'DIRECCION_EVENTO',1, 0, 'C',0);
        $this->Cell(20, 10, 'P_FECHA_INICIO',1, 0, 'C',0);
        $this->Cell(20, 10, 'P_FECHA_FIN',1, 1, 'C',0);

    }
    
}
function Body(){
}
// Pie de página
function Footer(){
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

    if($_REQUEST['tipoReporte']=='Empleados'){
        $pdf->SetFont('Times','',7);
        foreach (parent::getReporte( $_REQUEST['tipoReporte'], $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']) as $ResponseReporte){
            //$pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->ID_EMPLEADO),1, 0, 'c',0);
            $pdf->Cell(30, 10, utf8_decode($ResponseReporte->NOMBRES),1, 0, 'c',0);
            $pdf->Cell(25, 10, utf8_decode($ResponseReporte->APELLIDOS),1, 0, 'c',0);
            $pdf->Cell(25, 10, utf8_decode($ResponseReporte->DOCUMENTO),1, 0, 'c',0);
            $pdf->Cell(8, 10, utf8_decode($ResponseReporte->EDAD),1, 0, 'c',0);
            $pdf->Cell(17, 10, utf8_decode($ResponseReporte->TELEFONO),1, 0, 'c',0);
            $pdf->Cell(35, 10, utf8_decode($ResponseReporte->EMAIL),1, 0, 'c',0);
            $pdf->Cell(18, 10, utf8_decode($ResponseReporte->ROL),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->CARGO),1, 0, 'c',0);
            $pdf->Cell(25, 10, utf8_decode($ResponseReporte->USUARIO_SISTEMA),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->CLAVE),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->P_FECHA_INICIO),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->P_FECHA_FIN),1, 1, 'c',0);
        }
    }else if($_REQUEST['tipoReporte']=='Usuarios'){
        $pdf->SetFont('Times','',7);
        foreach (parent::getReporte( $_REQUEST['tipoReporte'], $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']) as $ResponseReporte){
            //$pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->ID_USUARIO),1, 0, 'c',0);
            $pdf->Cell(30, 10, utf8_decode($ResponseReporte->NOMBRES),1, 0, 'c',0);
            $pdf->Cell(25, 10, utf8_decode($ResponseReporte->APELLIDOS),1, 0, 'c',0);
            $pdf->Cell(25, 10, utf8_decode($ResponseReporte->DOCUMENTO),1, 0, 'c',0);
            $pdf->Cell(8, 10, utf8_decode($ResponseReporte->EDAD),1, 0, 'c',0);
            $pdf->Cell(17, 10, utf8_decode($ResponseReporte->TELEFONO),1, 0, 'c',0);
            $pdf->Cell(45, 10, utf8_decode($ResponseReporte->EMAIL),1, 0, 'c',0);
            $pdf->Cell(18, 10, utf8_decode($ResponseReporte->ROL),1, 0, 'c',0);
            $pdf->Cell(25, 10, utf8_decode($ResponseReporte->USUARIO_SISTEMA),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->CLAVE),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->P_FECHA_INICIO),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->P_FECHA_FIN),1, 1, 'c',0);
        }
    }else if($_REQUEST['tipoReporte']=='Pedidos'){
        $pdf->SetFont('Times','',4.5);
        foreach (parent::getReporte( $_REQUEST['tipoReporte'], $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']) as $ResponseReporte){
            //$pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);
            $pdf->Cell(8, 10, utf8_decode($ResponseReporte->ID_PEDIDO),1, 0, 'c',0);
            $pdf->Cell(15, 10, utf8_decode($ResponseReporte->FECHA_PEDIDO),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->NOMBRES),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->APELLIDOS),1, 0, 'c',0);
            $pdf->Cell(16, 10, utf8_decode($ResponseReporte->DOCUMENTO),1, 0, 'c',0);
            $pdf->Cell(10, 10, utf8_decode($ResponseReporte->ID_PAQUETE),1, 0, 'c',0);
            $pdf->Cell(16, 10, utf8_decode($ResponseReporte->EVENTO),1, 0, 'c',0);
            $pdf->Cell(18, 10, utf8_decode($ResponseReporte->PAQUETE),1, 0, 'c',0);
            $pdf->Cell(13, 10, utf8_decode($ResponseReporte->VALOR_PAQUETE),1, 0, 'c',0);
            $pdf->Cell(9, 10, utf8_decode($ResponseReporte->IVA),1, 0, 'c',0);
            $pdf->Cell(10, 10, utf8_decode($ResponseReporte->VALOR_TOTAL),1, 0, 'c',0);
            $pdf->Cell(10, 10, utf8_decode($ResponseReporte->ESTADO),1, 0, 'c',0);
            $pdf->Cell(16, 10, utf8_decode($ResponseReporte->FECHA_INICIO_EVENTO),1, 0, 'c',0);
            $pdf->Cell(16, 10, utf8_decode($ResponseReporte->FECHA_FIN_EVENTO),1, 0, 'c',0);
            $pdf->Cell(13, 10, utf8_decode($ResponseReporte->CIUDAD_EVENTO),1, 0, 'c',0);
            $pdf->Cell(14, 10, utf8_decode($ResponseReporte->BARRIO_EVENTO),1, 0, 'c',0);
            $pdf->Cell(21, 10, utf8_decode($ResponseReporte->DIRECCION_EVENTO),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->P_FECHA_INICIO),1, 0, 'c',0);
            $pdf->Cell(20, 10, utf8_decode($ResponseReporte->P_FECHA_FIN),1, 1, 'c',0);
        }
    }


$pdf->Output();



?>