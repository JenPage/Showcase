<?php

namespace Showcase\App\Http\Controllers;

use Illuminate\Http\Request;
use Showcase\App\Display;
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
        $default_view = request()->display !== null
            ? Display::find($display)->default_trophy_component_view
            : null;

        $displays = Display::all();

        $component_views = Storage::files(base_dir('resources/views/public/components/trophies'));

        return view('showcase::app.trophy.create', compact('default_view', 'displays', 'component_views'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trophy = Trophy::create($request->except('displays'));

        $trophy->displays()->detach();
        $trophy->displays()->attach($request->displays);

        return redirect()->route('trophies.show', compact('trophy'));
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
        $displays = Display::all();

        return view('showcase::app.trophy.edit', compact('trophy', 'displays'));
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
        $trophy->update($request->except('displays'));

        $trophy->displays()->detach();
        $trophy->displays()->attach($request->displays);

        return redirect()->route('trophies.show', compact('trophy'));
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

        return redirect()->route('trophies.index');
    }
}
