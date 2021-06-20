<?php

namespace App\Http\Controllers;

use App\Models\Moniteur;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:seance-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:seance-create', ['only' => ['create','store']]);
         $this->middleware('permission:seance-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:seance-delete', ['only' => ['destroy']]);
    }
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
        $moniteurs = Moniteur::all();
        //dd($seancesa[0]->moniteur->nom);
    
       
        //$seancesa=Seance::join('moniteurs','moniteurs.id_moniteur','=','seances.id_moniteur')->where('type_seance', '=', 'séance_théorique')
        // ->get();
         //$seancesb=Seance::join('moniteurs','moniteurs.id_moniteur','=','seances.id_moniteur')->where('type_seance', '=', 'séance_pratique')
        // ->get();
        //$seancesb = Seance::latest()->where('type_seance', '=', 'séance_pratique')->paginate(5);
        //$seancesc=Seance::join('moniteurs','moniteurs.id_moniteur','=','seances.id_moniteur')->where('type_seance', '=', 'séance_pratique_supplémentaire')
        // ->get();
        //$seancesc = Seance::latest()->where('type_seance', '=', 'séance_pratique_supplémentaire')->paginate(5);
        
        // latest()->where('type_seance ', '=', 'séance_théorique')->paginate(5);
   
        

    
        return view('seances.create',compact('seancesa','seancesb','seancesc','moniteurs'))
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

        //Seance::create($request->all());
        
        $query=Seance::insert([
            'jour'=>$request->input('jour'),
            'heure_debut' =>$request->input('heure_debut'),
            'heure_fin'=>$request->input('heure_fin'),
            'moniteur_id'=>$request->input('moniteur_id'),
            'type_seance'=>$request->input('type_seance'),

            
          ] );

        if($query)
        {
            return redirect()->route('seances.index')
            ->with('success','Seance created successfully.');
        }
        return redirect()->route('seances.index')
            ->with('failADDM','error!');
        
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
        $moniteurs = Moniteur::all();
        return view('seances.edit',compact('seance','moniteurs'));
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
        $seance->delete();
    
        return redirect()->route('seances.index')
                        ->with('success','Product deleted successfully');
    }
}