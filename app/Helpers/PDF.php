<?php

namespace App\Helpers;

class PDF extends \Mpdf\Mpdf
{
    public $mpdf;
    public function __construct()
    {
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $this->mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path('fonts/'),
            ]),
            'fontdata' => $fontData + [
                'muol' => [
                    'R' => 'Moul-Regular.ttf',
                    'useOTL' => 0xFF
                ]
            ],
            'default_font' => 'KhmerOS'
        ]);

        $stylesheet = file_get_contents(public_path('css' . DIRECTORY_SEPARATOR . 'pdf.css'));
        $this->mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    }
    public function generate($doc)
    {
        $this->mpdf->WriteHTML($doc, \Mpdf\HTMLParserMode::HTML_BODY);
        return $this->mpdf->output();
    }
}
