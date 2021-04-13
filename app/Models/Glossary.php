<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    use HasFactory;

    protected $table = "glossary";

    public static function getAllLetters() {
        $letters = [];
        $allTerms = Glossary::orderBy('term')->get();

        foreach ($allTerms as $item) {
            $firstLetter = substr($item->term, 0, 2);

            if (!in_array($firstLetter, $letters)) {
                array_push($letters, $firstLetter); 
            }
        }

        return $letters;   
    }

    public static function getAllTerms($letter) {
        return Glossary::where('term', 'LIKE', $letter . '%')->orderBy('term')->get();
    }
}
