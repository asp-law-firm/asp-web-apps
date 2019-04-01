<?php

class mpdf
{
    public static function print_pdf( $html = '', $orientation = 'P', $title = '') {
        ini_set("pcre.backtrack_limit", "1000000000");
        ini_set("memory_limit", "-1");
        set_time_limit(0);

        $mpdf = new \Mpdf\Mpdf(array('orientation' => $orientation, 'format' => 'A4'));
        $mpdf->writeHTMLHeaders('E-Data - v1');        
        $mpdf->WriteHTML($html);
        $mpdf->allow_charset_conversion = true;
        $mpdf->charset_in='UTF-8';
        $mpdf->Output($title.'.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }
}
