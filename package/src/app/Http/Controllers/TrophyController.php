<?php

namespace Showcase\App\Http\Controllers;

use Illuminate\Http\Request;
use Showcase\App\Display;
use Showcase\App\Trophy;

class TrophyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Display $display)
    {
        return view('showcase::app.trophy.create', compact('display'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Display $display)
    {
        Trophy::create($request->all());

        return redirect()->route('displays.show', compact('display'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Showcase\App\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function edit(Display $display, Trophy $trophy)
    {
        return view('showcase::app.trophy.edit', compact('trophy', 'display'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Showcase\App\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Display $display, Trophy $trophy)
    {
        $trophy->fill($request->all());

        return redirect()->route('displays.show', compact('display'));
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

        return redirect()->route('display.index');
    }
}
