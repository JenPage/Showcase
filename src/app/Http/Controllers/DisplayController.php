<?php

namespace Showcase\App\Http\Controllers;

use Showcase\App\Display;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displays = Display::all();
        return view('showcase::app.display.index', compact('displays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('showcase::app.display.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Display::create($request->all());

        return redirect()->route('showcase.display.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Showcase\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function show(Display $display)
    {
        return view('showcase::app.display.show', compact('display'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Showcase\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function edit(Display $display)
    {
        return view('showcase::app.display.edit', compact('display'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Showcase\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Display $display)
    {
        $display->fill($request->all());

        return redirect()->route('showcase.display.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Showcase\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function destroy(Display $display)
    {
        $display->delete();

        return redirect()->route('showcase.display.index');
    }
}
