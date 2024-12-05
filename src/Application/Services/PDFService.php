<?php

namespace Src\Application\Services;

use Dompdf\Dompdf;

class PDFService
{
    public static function render(string $template): void
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($template);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('invoice.pdf', ['Attachment' => false]);
    }
}
