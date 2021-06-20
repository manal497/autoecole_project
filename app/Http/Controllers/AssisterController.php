<?php

namespace App\Http\Controllers;
use App\Models\Assister;
use App\Models\Seance;
use App\Models\Candidat;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AssisterController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $condidats= Candidat::latest()->paginate(5);
        $seances= Seance::latest()->paginate(5);
        return view('assisters.create',compact('seances','condidats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Assister::create($request->all());
    
        return redirect()->route('seances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assister  $assister
     * @return \Illuminate\Http\Response
     */
    public function show(Assister $assister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assister  $assister
     * @return \Illuminate\Http\Response
     */
    public function edit(Assister $assister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assister  $assister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assister $assister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assister  $assister
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assister $assister)
    {
        //
    }
}
