<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $seancesa = Seance::latest()->where('type_seance', '=', 'séance_théorique')->paginate(5);
        $seancesb = Seance::latest()->where('type_seance', '=', 'séance_pratique')->paginate(5);
        $seancesc = Seance::latest()->where('type_seance', '=', 'séance_pratique_supplémentaire')->paginate(5);
       
        //$seancesa=Seance::join('moniteurs','moniteurs.id_moniteur','=','seances.id_moniteur')->where('type_seance', '=', 'séance_théorique')
        // ->get();
         //$seancesb=Seance::join('moniteurs','moniteurs.id_moniteur','=','seances.id_moniteur')->where('type_seance', '=', 'séance_pratique')
        // ->get();
        //$seancesb = Seance::latest()->where('type_seance', '=', 'séance_pratique')->paginate(5);
        //$seancesc=Seance::join('moniteurs','moniteurs.id_moniteur','=','seances.id_moniteur')->where('type_seance', '=', 'séance_pratique_supplémentaire')
        // ->get();
        //$seancesc = Seance::latest()->where('type_seance', '=', 'séance_pratique_supplémentaire')->paginate(5);
        
        // latest()->where('type_seance ', '=', 'séance_théorique')->paginate(5);
   
        

    
        return view('seances.create',compact('seancesa','seancesb','seancesc'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
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
        //dd($request->all());
        //\Debugbar::info($request);
        Seance::create($request->all());


    
        return redirect()->route('seances.index')
                        ->with('success','Seance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function edit(Seance $seance)
    {
        return view('seances.edit',compact('seance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seance $seance)
    {
        request()->validate([
            'type_seance' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'jour' => 'required',
            'id_moniteur' => 'required',

        ]);
    
        $seance->update($request->all());
    
        return redirect()->route('seances.index')
                        ->with('success','Seance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seance $seance)
    {
        //
    }
}