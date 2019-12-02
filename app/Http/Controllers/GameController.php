<?php

namespace App\Http\Controllers;

use App\Models\Jeux;
use App\Models\Tag;
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
        $tags = Tag::all();
        return view('jeux.create', ['tags' => $tags]);
    }


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
        foreach ($request->tags as $tag){
            $jeu->tags()->attach($tag);
        }
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
        $jeu = Jeux::findOrFail($id); // findOrFail : si non trouvé, renvoi une erreur 404 Not Found.
        $tags = Jeux::find($id)->tags()->get();

        return view('jeux.show', ['jeu' => $jeu, 'action' => $action, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeux::findOrFail($id);
        //$currentTags = $jeu->tags()->get()->toArray();
        $currentTags = $jeu->tags()->pluck('label')->toArray();
        $tags = Tag::all();
        return view('jeux.edit', ['jeu' => $jeu, 'currentTags' => $currentTags, 'tags' => $tags]);
    }


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
        $tags = $jeu->tags()->pluck('id')->toArray();
        foreach ($request->tags as $tag){
            if(!in_array($tag, $tags)){
                $jeu->tags()->attach($tag);
            }
        }
        foreach ($tags as $tag){
            if(!in_array($tag, $request->tags)){
                $jeu->tags()->detach($tag);
            }
        }
        return redirect('/jeux/'.$id);
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
