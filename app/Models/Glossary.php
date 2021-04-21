<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    use HasFactory;

    protected $table = "glossary";

    public static function getAllLetters() { // получение алфавита для всех существующих терминов в глоссарии
        $letters = []; // алфавит для терминов
        $allTerms = Glossary::orderBy('term')->get(); // получаем все термины из глоссария

        foreach ($allTerms as $item) { // для каждого термина из глоссария
            $firstLetter = mb_substr($item->term, 0, 1); // берем первый символ

            if (!in_array($firstLetter, $letters)) { // если символа нет в алфавите
                array_push($letters, $firstLetter); // то добавляем его
            }
        }

        return $letters; // возвращаем алфавит для терминов
    }

    public static function getAllTerms($letter) {
        return Glossary::where('term', 'LIKE', $letter . '%')->orderBy('term')->get(); // получаем все термины по первой букве, сортируем по алфавиту
    }
}
