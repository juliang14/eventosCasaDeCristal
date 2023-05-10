<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
        $fila = 2;

        $spreadsheet = new Spreadsheet();
        if($_REQUEST['tipoReporte']=='Empleados'){
            
            // Establecer encabezados para el reporte
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'ID_EMPLEADO');
            $sheet->setCellValue('B1', 'NOMBRES');
            $sheet->setCellValue('C1', 'APELLIDOS');
            $sheet->setCellValue('D1', 'DOCUMENTO');
            $sheet->setCellValue('E1', 'EDAD');
            $sheet->setCellValue('F1', 'TELEFONO');
            $sheet->setCellValue('G1', 'EMAIL');
            $sheet->setCellValue('H1', 'ROL');
            $sheet->setCellValue('I1', 'CARGO');
            $sheet->setCellValue('J1', 'USUARIO_SISTEMA');
            $sheet->setCellValue('K1', 'CLAVE');
            $sheet->setCellValue('L1', 'P_FECHA_INICIO');
            $sheet->setCellValue('M1', 'P_FECHA_FIN');

            // Calcular automaticamente el ancho de las columnas
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getColumnDimension('H')->setAutoSize(true);
            $sheet->getColumnDimension('I')->setAutoSize(true);
            $sheet->getColumnDimension('J')->setAutoSize(true);
            $sheet->getColumnDimension('K')->setAutoSize(true);
            $sheet->getColumnDimension('L')->setAutoSize(true);
            $sheet->getColumnDimension('M')->setAutoSize(true);

            // Imprimir los resultados de la consulta

            //while($row = $resultado->fetch_assoc()){
            //for($i=0; $i <= count($ResponseReporte); $i++){
            foreach (parent::getReporte( $_REQUEST['tipoReporte'], $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']) as $ResponseReporte){
                //$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['id']);
                $sheet->setCellValue('A'.$fila, $ResponseReporte->ID_EMPLEADO);
                $sheet->setCellValue('B'.$fila, $ResponseReporte->NOMBRES);
                $sheet->setCellValue('C'.$fila, $ResponseReporte->APELLIDOS);
                $sheet->setCellValue('D'.$fila, $ResponseReporte->DOCUMENTO);
                $sheet->setCellValue('E'.$fila, $ResponseReporte->EDAD);
                $sheet->setCellValue('F'.$fila, $ResponseReporte->TELEFONO);
                $sheet->setCellValue('G'.$fila, $ResponseReporte->EMAIL);
                $sheet->setCellValue('H'.$fila, $ResponseReporte->ROL);
                $sheet->setCellValue('I'.$fila, $ResponseReporte->CARGO);
                $sheet->setCellValue('J'.$fila, $ResponseReporte->USUARIO_SISTEMA);
                $sheet->setCellValue('K'.$fila, $ResponseReporte->CLAVE);
                $sheet->setCellValue('L'.$fila, $ResponseReporte->P_FECHA_INICIO);
                $sheet->setCellValue('M'.$fila, $ResponseReporte->P_FECHA_FIN);

                $fila++;
            }
            $fila = $fila-1;

            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000'],
                    ],
                ],
            ];
            $sheet->getStyle('A1:M1')->applyFromArray($styleArray);
            $sheet->getStyle('A2:M'.$fila)->applyFromArray($styleArray);
        }else if($_REQUEST['tipoReporte']=='Usuarios'){
            
            // Establecer encabezados para el reporte
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'ID_USUARIO');
            $sheet->setCellValue('B1', 'NOMBRES');
            $sheet->setCellValue('C1', 'APELLIDOS');
            $sheet->setCellValue('D1', 'DOCUMENTO');
            $sheet->setCellValue('E1', 'EDAD');
            $sheet->setCellValue('F1', 'TELEFONO');
            $sheet->setCellValue('G1', 'EMAIL');
            $sheet->setCellValue('H1', 'ROL');
            $sheet->setCellValue('I1', 'USUARIO_SISTEMA');
            $sheet->setCellValue('J1', 'CLAVE');
            $sheet->setCellValue('K1', 'P_FECHA_INICIO');
            $sheet->setCellValue('L1', 'P_FECHA_FIN');

            // Calcular automaticamente el ancho de las columnas
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getColumnDimension('H')->setAutoSize(true);
            $sheet->getColumnDimension('I')->setAutoSize(true);
            $sheet->getColumnDimension('J')->setAutoSize(true);
            $sheet->getColumnDimension('K')->setAutoSize(true);
            $sheet->getColumnDimension('L')->setAutoSize(true);

            // Imprimir los resultados de la consulta

            //while($row = $resultado->fetch_assoc()){
            //for($i=0; $i <= count($ResponseReporte); $i++){
            foreach (parent::getReporte( $_REQUEST['tipoReporte'], $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']) as $ResponseReporte){
                //$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['id']);
                $sheet->setCellValue('A'.$fila, $ResponseReporte->ID_USUARIO);
                $sheet->setCellValue('B'.$fila, $ResponseReporte->NOMBRES);
                $sheet->setCellValue('C'.$fila, $ResponseReporte->APELLIDOS);
                $sheet->setCellValue('D'.$fila, $ResponseReporte->DOCUMENTO);
                $sheet->setCellValue('E'.$fila, $ResponseReporte->EDAD);
                $sheet->setCellValue('F'.$fila, $ResponseReporte->TELEFONO);
                $sheet->setCellValue('G'.$fila, $ResponseReporte->EMAIL);
                $sheet->setCellValue('H'.$fila, $ResponseReporte->ROL);
                $sheet->setCellValue('I'.$fila, $ResponseReporte->USUARIO_SISTEMA);
                $sheet->setCellValue('J'.$fila, $ResponseReporte->CLAVE);
                $sheet->setCellValue('K'.$fila, $ResponseReporte->P_FECHA_INICIO);
                $sheet->setCellValue('L'.$fila, $ResponseReporte->P_FECHA_FIN);

                $fila++;
            }
            $fila = $fila-1;

            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000'],
                    ],
                ],
            ];
            $sheet->getStyle('A1:L1')->applyFromArray($styleArray);
            $sheet->getStyle('A2:L'.$fila)->applyFromArray($styleArray);
        }else if($_REQUEST['tipoReporte']=='Pedidos'){
            
            // Establecer encabezados para el reporte
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'ID_PEDIDO');
            $sheet->setCellValue('B1', 'FECHA_PEDIDO');
            $sheet->setCellValue('C1', 'NOMBRES');
            $sheet->setCellValue('D1', 'APELLIDOS');
            $sheet->setCellValue('E1', 'DOCUMENTO');
            $sheet->setCellValue('F1', 'ID_PAQUETE');
            $sheet->setCellValue('G1', 'EVENTO');
            $sheet->setCellValue('H1', 'PAQUETE');
            $sheet->setCellValue('I1', 'VALOR_PAQUETE');
            $sheet->setCellValue('J1', 'IVA');
            $sheet->setCellValue('K1', 'VALOR_TOTAL');
            $sheet->setCellValue('L1', 'ESTADO');
            $sheet->setCellValue('M1', 'FECHA_INICIO_EVENTO');
            $sheet->setCellValue('N1', 'FECHA_FIN_EVENTO');
            $sheet->setCellValue('O1', 'CIUDAD_EVENTO');
            $sheet->setCellValue('P1', 'BARRIO_EVENTO');
            $sheet->setCellValue('Q1', 'DIRECCION_EVENTO');
            $sheet->setCellValue('R1', 'P_FECHA_INICIO');
            $sheet->setCellValue('S1', 'P_FECHA_FIN');

            // Calcular automaticamente el ancho de las columnas
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getColumnDimension('H')->setAutoSize(true);
            $sheet->getColumnDimension('I')->setAutoSize(true);
            $sheet->getColumnDimension('J')->setAutoSize(true);
            $sheet->getColumnDimension('K')->setAutoSize(true);
            $sheet->getColumnDimension('L')->setAutoSize(true);
            $sheet->getColumnDimension('M')->setAutoSize(true);
            $sheet->getColumnDimension('N')->setAutoSize(true);
            $sheet->getColumnDimension('O')->setAutoSize(true);
            $sheet->getColumnDimension('P')->setAutoSize(true);
            $sheet->getColumnDimension('Q')->setAutoSize(true);
            $sheet->getColumnDimension('R')->setAutoSize(true);
            $sheet->getColumnDimension('S')->setAutoSize(true);

            // Imprimir los resultados de la consulta

            //while($row = $resultado->fetch_assoc()){
            //for($i=0; $i <= count($ResponseReporte); $i++){
            foreach (parent::getReporte( $_REQUEST['tipoReporte'], $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']) as $ResponseReporte){
                //$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['id']);
                $sheet->setCellValue('A'.$fila, $ResponseReporte->ID_PEDIDO);
                $sheet->setCellValue('B'.$fila, $ResponseReporte->FECHA_PEDIDO);
                $sheet->setCellValue('C'.$fila, $ResponseReporte->NOMBRES);
                $sheet->setCellValue('D'.$fila, $ResponseReporte->APELLIDOS);
                $sheet->setCellValue('E'.$fila, $ResponseReporte->DOCUMENTO);
                $sheet->setCellValue('F'.$fila, $ResponseReporte->ID_PAQUETE);
                $sheet->setCellValue('G'.$fila, $ResponseReporte->EVENTO);
                $sheet->setCellValue('H'.$fila, $ResponseReporte->PAQUETE);
                $sheet->setCellValue('I'.$fila, $ResponseReporte->VALOR_PAQUETE);
                $sheet->setCellValue('J'.$fila, $ResponseReporte->IVA);
                $sheet->setCellValue('K'.$fila, $ResponseReporte->VALOR_TOTAL);
                $sheet->setCellValue('L'.$fila, $ResponseReporte->ESTADO);
                $sheet->setCellValue('M'.$fila, $ResponseReporte->FECHA_INICIO_EVENTO);
                $sheet->setCellValue('N'.$fila, $ResponseReporte->FECHA_FIN_EVENTO);
                $sheet->setCellValue('O'.$fila, $ResponseReporte->CIUDAD_EVENTO);
                $sheet->setCellValue('P'.$fila, $ResponseReporte->BARRIO_EVENTO);
                $sheet->setCellValue('Q'.$fila, $ResponseReporte->DIRECCION_EVENTO);
                $sheet->setCellValue('R'.$fila, $ResponseReporte->P_FECHA_INICIO);
                $sheet->setCellValue('S'.$fila, $ResponseReporte->P_FECHA_FIN);

                $fila++;
            }
            $fila = $fila-1;

            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000'],
                    ],
                ],
            ];
            $sheet->getStyle('A1:S1')->applyFromArray($styleArray);
            $sheet->getStyle('A2:S'.$fila)->applyFromArray($styleArray);
        }
	    // Cabecera para generar archivo y poderlo descargar
        //$writer = new Xlsx($spreadsheet);
        //$writer->save('hello world.xlsx');
        
        // redirect output to client browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte Excel '.$_REQUEST['tipoReporte'].' '.date_default_timezone_set('UTC').'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');


?>