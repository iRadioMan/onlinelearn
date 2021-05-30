<?php

namespace App\Http\Controllers;

use App\Models\HelpPage;

class HelpController extends Controller
{
    /**
     * Отображает список разделов справочной системы
     */
    public function index()
    {
        return view('help.index', ['helpPages' => HelpPage::all()]);
    }

    /**
     * Отображает раздел справочной системы.
     */
    public function show(HelpPage $helpPage)
    {
        return view('help.show', ['helpPage' => $helpPage]);
    }
}
