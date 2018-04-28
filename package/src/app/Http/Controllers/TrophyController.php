<?php

namespace Showcase\App\Http\Controllers;

use Illuminate\Http\Request;
use Showcase\App\Trophy;

class TrophyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trophies = Trophy::all();

        return view('showcase::app.trophy.index', compact('trophies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('showcase::app.trophies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Trophy::create($request->all());

        return redirect()->route('showcase.trophies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Showcase\App\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function show(Trophy $trophy)
    {
        return view('showcase::app.trophy.show', compact('trophy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Showcase\App\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function edit(Trophy $trophy)
    {
        return view('showcase::app.trophy.edit', compact('trophy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Showcase\App\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trophy $trophy)
    {
        $trophy->fill($request->all());

        return redirect()->route('showcase.trophies.show', compact('trophy'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Showcase\App\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trophy $trophy)
    {
        $trophy->delete();

        return redirect()->route('showcase.display.index');
    }
}
