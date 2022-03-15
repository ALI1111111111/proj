<?php

namespace App\Http\Controllers;

use App\water;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\water  $water
     * @return \Illuminate\Http\Response
     */
    public function show(water $water)
    {
        //
        return 50;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\water  $water
     * @return \Illuminate\Http\Response
     */
    public function edit(water $water)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, water $water)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\water  $water
     * @return \Illuminate\Http\Response
     */
    public function destroy(water $water)
    {
        //
    }
}
