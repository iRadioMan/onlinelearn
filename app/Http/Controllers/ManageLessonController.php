<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ZipArchive;

class ManageLessonController extends Controller
{
    /**
     * Отображает список уроков.
     */
    public function index()
    {
        return view("manage/lessons/index", ['lessons' => Lesson::all()]);
    }

    /**
     * Отображает форму создания нового урока.
     */
    public function create()
    {
        return view("manage/lessons/create");
    }

    /**
     * Сохраняет урок в БД.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'main_file' => ['required', 'string', 'regex:/^.*\.(html|htm)$/i'],
            'archive' => 'required|file|mimes:zip'
        ]);
        $lesson = Lesson::create($validated);
        $attachedFile = $request->file('archive');
        if($attachedFile){
            $zip = new ZipArchive;
            $zip->open($attachedFile->getRealPath());
            $path = getcwd()."/storage/lessons/".$lesson->id;
            $zip->extractTo($path);
        }
        
        return redirect(route('managelessons.index'))->with('success', 'Тема успешно добавлена!');
    }

    /**
     * Отображает форму редактирования урока.
     */
    public function edit(Lesson $lesson)
    {
        return view("manage/lessons/edit", ['lesson' => $lesson]);
    }

    /**
     * Обновляет данные урока.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'main_file' => ['required', 'string', 'regex:/^.*\.(html|htm)$/i'],
            'archive' => 'file|mimes:zip'
        ]);
        $lesson->update($validated);
        $attachedFile = $request->file('archive');
        if($attachedFile){
            $zip = new ZipArchive;
            $zip->open($attachedFile->getRealPath());
            $path = getcwd()."/storage/lessons/".$lesson->id;
            $zip->extractTo($path);
        }
        return redirect(route('managelessons.index'))->with('success', 'Тема успешно обновлена!');
    }

    /**
     * Удаляет урок из БД и файловой системы.
     */
    public function destroy(Lesson $lesson)
    {
        $path = getcwd()."/storage/lessons/".$lesson->id;
        $lesson->delete();
        if (is_dir($path)) {
            File::deleteDirectory($path);
        }        
        return redirect(route('managelessons.index'))->with('success', 'Тема успешно удалена!');
    }
}
