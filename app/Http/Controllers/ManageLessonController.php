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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("manage/lessons/index", ['lessons' => Lesson::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("manage/lessons/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view("manage/lessons/edit", ['lesson' => $lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
