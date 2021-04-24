<?php

namespace App\Exports;

use App\Models\QuizResult;
use App\Models\Lesson;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResultsExport implements FromCollection, WithHeadings, WithColumnWidths, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QuizResult::all();
    }

    public function map($result): array
    {
        return [
            $result->id,
            User::where('id', $result->user_id)->first()->fullname,
            Lesson::where('id', $result->lesson_id)->first()->name,
            $result->correct_percentage,
            $result->updated_at
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Студент',
            'Тема',
            'Результат, %',
            'Дата и время обновления',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 45,  
            'C' => 100,
            'D' => 13,
            'E' => 26         
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
    }
}
