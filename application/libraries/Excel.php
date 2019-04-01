<?php defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel {

    private static $_alphabet = array(
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
    );

    public static function setExcelTitle($titleArray = array())
    {
        $array = array();
        foreach ($titleArray as $key => $value) {
            foreach ($value as $keys => $values) {
                $array[self::$_alphabet[$key] . 1] = [$value[0], $value[1]];
            }            
        }
        return $array;
    }

    public static function setExcelValue($valueArray = array(), $alignment = 'horizontal_center|vertical_center', $wrap_text = true)
    {        
        $array      = array();
        $arrayGlob  = array();
        
        foreach ($valueArray as $key => $value) {
            foreach ($value as $k => $v) {
                $array[$k] = [$v, $alignment, $wrap_text];
            }
            $arrayGlob[] = $array;
        }
        return $arrayGlob;
    }

    public static function exportExcel($title = '', $dataTitle = array(), $dataQuery = array())
    {
        set_time_limit(0);
        ini_set("memory_limit", "-1");
        $col = 2;
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->setTitle('Sheet 1');
        
        $styleBorderBold = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK
                ]
            ]
        ];

        $styleBorderThin = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ];

        $styleAlignmentTtile = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];
        

        // Set Title
        foreach ($dataTitle as $key => $value) {
            foreach ($value as $keys => $values) {
                $spreadsheet->getActiveSheet()->setCellValue($key, $value[0]);
                $spreadsheet->getActiveSheet()->getColumnDimension(substr($key, 0, 1))->setWidth($value[1]);
                $spreadsheet->getActiveSheet()->getRowDimension(substr($key, 1, 1))->setRowHeight(25);
                $spreadsheet->getActiveSheet()->getStyle($key)->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle($key)->applyFromArray($styleBorderBold);
                $spreadsheet->getActiveSheet()->getStyle($key)->applyFromArray($styleAlignmentTtile);
            }
        }

        $styleAlignmenValueCenter = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];

        $styleAlignmenValueRight = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];

        // Set Value
        $summary = 0;
        foreach ($dataQuery as $key => $value) {
            foreach ($value as $keyVal => $valueVal) {
                $cell = $keyVal.$col;
                // print_debug($cell);
                $spreadsheet->getActiveSheet()->setCellValue($cell, $valueVal[0]);                
                $spreadsheet->getActiveSheet()->getStyle($cell)->getAlignment()->setWrapText($valueVal[2]);
                $spreadsheet->getActiveSheet()->getStyle($cell)->applyFromArray($styleBorderThin);
                if($keyVal == 'G') {                    
                    $spreadsheet->getActiveSheet()->getStyle($cell)->getNumberFormat()->setFormatCode('#,##0.00');
                    $spreadsheet->getActiveSheet()->getStyle($cell)->applyFromArray($styleAlignmenValueRight);
                    $summary += $valueVal[0];
                } else {
                    $spreadsheet->getActiveSheet()->getStyle($cell)->applyFromArray($styleAlignmenValueCenter);
                }                

            }
            $col++;
        }
        
        $footer = $col+2;
        $spreadsheet->getActiveSheet()->getRowDimension($footer)->setRowHeight(25);        
        $spreadsheet->getActiveSheet()->mergeCells('A'.$footer.':F'.$footer.'');
        $spreadsheet->getActiveSheet()->setCellValue('A'.$footer, 'TOTAL');
        $spreadsheet->getActiveSheet()->getStyle('A'.$footer)->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A'.$footer)->applyFromArray($styleAlignmenValueCenter);
        $spreadsheet->getActiveSheet()->setCellValue('G'.$footer, $summary);
        $spreadsheet->getActiveSheet()->getStyle('G'.$footer)->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('G'.$footer)->applyFromArray($styleAlignmenValueRight);
        $spreadsheet->getActiveSheet()->getStyle('G'.$footer)->getNumberFormat()->setFormatCode('#,##0.00');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
        header('Cache-Control: max-age=1');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}