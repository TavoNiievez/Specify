<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelParser
{
    public function excelToArray(string $filename): array
    {
        $spreadsheet = IOFactory::load($filename);
        return $spreadsheet->getActiveSheet()
            ->toArray(null,
                true, true,
                true
            );
    }

    public function validateExtension(string $fileName): bool
    {
        $pathInfo = pathinfo($fileName);
        if (!isset($pathInfo['extension'])) {
            return false;
        }
        switch (strtolower($pathInfo['extension'])) {
            case 'xlsx':
            case 'ods':
            case 'csv':
                return true;
            default:
                return false;
        }
    }
}
