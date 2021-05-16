<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppSettingsController extends Controller
{
    /**
     * Сохраняет настройки приложения
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'acceptable_percentage' => 'required|string',
        ]);

        DB::table('app_settings')->delete();
        
        DB::table('app_settings')->insert([
            'name' => 'acceptable_percentage', 
            'value' => $validated['acceptable_percentage']
        ]);

        return redirect()->back()->with('success', 'Настройки сохранены!');
    }
}
