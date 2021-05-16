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
    * Экспорт в Excel.
    */
    public function collection()
    {
        $users = User::all();
        $lessons = Lesson::all();

        $results = collect();

        foreach($users as $user) {
            foreach($lessons as $lesson) {
                if ($user->lastQuizResult($lesson->id)) {
                    $results = $results->add($user->lastQuizResult($lesson->id));
                }
            }
        }

        $results = $results->map(function($item){
            $item['user_fullname'] = $item->user->fullname;
            return $item;
        });

        $results = $results->sortBy('user_fullname');
        
        return $results;
    }

    public function map($result): array
    {
        return [
            $result->id,
            $result->user->fullname,
            $result->lesson->name,
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
