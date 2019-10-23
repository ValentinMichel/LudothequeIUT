<?php

namespace App\Http\Controllers;

use App\Models\Jeux;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeux::all();
        return view('jeux.index', ['jeux' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'title' => 'required',
                'year' => 'required',
                'age_min' => 'required',
                'categorie' => 'required',
                'description' => 'required',
            ]
        );
        // préparation de l'enregistrement à stocker dans la base de données
        $jeu = new Jeux();
        $jeu->title = $request->title;
        $jeu->annee_sortie = $request->year;
        $jeu->categorie = $request->categorie;
        $jeu->description = $request->description;
        $jeu->age_min = $request->age_min;
        $jeu->save();
        return redirect('/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        /*$jeu = Jeux::find($id);
        return view('jeux.show', ['jeu' => $jeu]);*/
        $action = $request->query('action', 'show');
        $jeu = Jeux::find($id);

        return view('jeux.show', ['jeu' => $jeu, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeux::find($id);
        return view('jeux.edit', ['jeu' => $jeu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jeu = Jeux::find($id);
        $this->validate(
            $request,
            [
                'title' => 'required',
                'year' => 'required',
                'age_min' => 'required',
                'categorie' => 'required',
                'description' => 'required',
            ]
        );
        // préparation de l'enregistrement à stocker dans la base de données
        $jeu->title = $request->title;
        $jeu->annee_sortie = $request->year;
        $jeu->categorie = $request->categorie;
        $jeu->description = $request->description;
        $jeu->age_min = $request->age_min;
        $jeu->save();
        return redirect('/jeux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $jeu = Jeux::find($id);
            $jeu->delete();
        }
        return redirect()->route('jeux.index');
    }
}
