<?php

namespace App\Http\Controllers;

use App\Models\HelpPage;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('help.index', ['helpPages' => HelpPage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HelpPage  $helpPage
     * @return \Illuminate\Http\Response
     */
    public function show(HelpPage $helpPage)
    {
        return view('help.show', ['helpPage' => $helpPage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpPage  $helpPage
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpPage $helpPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HelpPage  $helpPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelpPage $helpPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpPage  $helpPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpPage $helpPage)
    {
        //
    }
}
