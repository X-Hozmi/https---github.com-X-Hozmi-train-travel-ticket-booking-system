<?php

namespace Src\Application\Services;

header('Content-Type: application/pdf');

use Dompdf\Dompdf;

class PDFService
{
    public static function render(string $template): void
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($template);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        ob_end_clean();
        $dompdf->stream('invoice.pdf', ['Attachment' => false]);
    }
}
