<?php

namespace App\Http\Controllers;

use App\Models\Jeux;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->query('categorie', 'All');
        $value = $request->cookie('categorie');
        if ($type == 'All' || (empty($type) && empty($value))) {
            if (empty($type))
                $type = 'All';
            else
                Cookie::queue('categorie', '', 0, '/jeux');
            $jeux = Jeux::all();
        }
        elseif(!empty($type) || !empty($value)) {
            if(empty($type)) $type = $value;
            $jeux = Jeux::where('categorie', $type)->get();
            Cookie::queue('categorie', $type, 10, '/jeux');
        }
        /*
        if($type != 'All'){
            $jeux = Jeux::where('categorie', $type)->get();
        }
        else{
            $jeux = Jeux::all();
        }*/
        $categories = Jeux::distinct('categorie')->pluck('categorie');
        return view('jeux.index', ['jeux' => $jeux, 'type' => $type, 'categories' => $categories]);
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
                'title' => ['required', 'max:255'],
                'year' => ['required', 'integer'],
                'age_min' => ['required', 'max:3',],
                'categorie' => ['required', 'max:255'],
                'description' => ['required', 'max:255'],
                'image' => 'image'
            ],
            [
                'title.required' => "Le titre indiqué ne convient pas ou n'a pas été spécifié.",
                'title.max' => "La taille du titre ne peut excéder 255 caractères.",
                'year.required' => "L'année de sortie doit être indiqué.",
                'year.integer' => "L'année doit être un entier numérique.",
                'age_min.required' => "L'âge minimal requis doit être indiqué.",
                'age_min.max' => "L'âge minimal ne doit pas dépasser 3 caractères, ex : 18, 18+.",
                'categorie.required' => "La catégorie indiquée ne convient pas ou n'a pas été spécifié.",
                'categorie.max' => "La catégorie ne peut excéder 255 caractères.",
                'description.required' => "La description indiquée ne convient pas ou n'a pas été spécifié.",
                'description.max' => "La description ne peut excéder 255 caractères.",
                'image.image' => "Le fichier doit obligatoirement être une image !"
            ]
        );
        $image = $this->upload($request);
        // préparation de l'enregistrement à stocker dans la base de données
        $jeu = new Jeux();
        $jeu->title = $request->title;
        $jeu->annee_sortie = $request->year;
        $jeu->categorie = $request->categorie;
        $jeu->description = $request->description;
        $jeu->age_min = $request->age_min;
        if($image !== null) $jeu->image = $image;
        $jeu->save();
        foreach ($request->tags as $tag){
            $jeu->tags()->attach($tag);
        }
        return redirect(route('jeux.index'))->with('success','Création du jeu effectuée avec succès !');
    }
    public function upload(Request $request) {
        if ($request->hasFile('image')  && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $base = 'image';
            $now = time();
            $nom = sprintf("%s_%d.%s",$base,$now,$file->extension());
            $file->storeAs('images',$nom);
            return $nom;
        }
        return null;
    }
    /*
    public function upload(Request $request) {
        if ($request->hasFile('image')  && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->extension();
            if($extension === "png" || $extension === "jpeg"){
                $base = 'image';
                $now = time();
                $nom = sprintf("%s_%d.%s",$base,$now,$file->extension());
                $file->storeAs('images',$nom);
                return redirect('/jeux/create?img='.$nom)->with('success', "L'image a été sauvegardé avec succès ! Vous pouvez continuer la création.");
            }
            else redirect('/jeux/create')->with('error', 'Erreur lors du téléchargement du fichier, format accepté : png, jpeg (jpg) !');
        }
        else{
            return redirect('/jeux/create')->with('error', 'Aucun fichier n\'a été indiqué pour envoi !');
        }
    }*/
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
        $tags = Jeux::findOrFail($id)->tags()->get();
        $comments = Jeux::findOrFail($id)->comments()->get()->all();
        return view('jeux.show', ['jeu' => $jeu, 'action' => $action, 'tags' => $tags, 'comments' => $comments]);
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
        $jeu = Jeux::findOrFail($id);
        $this->validate(
            $request,
            [
                'title' => ['required', 'max:255'],
                'year' => ['required', 'integer'],
                'age_min' => ['required', 'max:3',],
                'categorie' => ['required', 'max:255'],
                'description' => ['required', 'max:255'],
                'image' => 'image'
            ],
            [
                'title.required' => "Le titre indiqué ne convient pas ou n'a pas été spécifié.",
                'title.max' => "La taille du titre ne peut excéder 255 caractères.",
                'year.required' => "L'année de sortie doit être indiqué.",
                'year.integer' => "L'année doit être un entier numérique.",
                'age_min.required' => "L'âge minimal requis doit être indiqué.",
                'age_min.max' => "L'âge minimal ne doit pas dépasser 3 caractères, ex : 18, 18+.",
                'categorie.required' => "La catégorie indiquée ne convient pas ou n'a pas été spécifié.",
                'categorie.max' => "La catégorie ne peut excéder 255 caractères.",
                'description.required' => "La description indiquée ne convient pas ou n'a pas été spécifié.",
                'description.max' => "La description ne peut excéder 255 caractères.",
                'image.image' => "Le fichier doit obligatoirement être une image !"
            ]
        );
        $image = $this->upload($request);
        // préparation de l'enregistrement à stocker dans la base de données
        $jeu->title = $request->title;
        $jeu->annee_sortie = $request->year;
        $jeu->categorie = $request->categorie;
        $jeu->description = $request->description;
        $jeu->age_min = $request->age_min;
        if($jeu->image !== null && $image !== null) Storage::delete('images/'.$jeu->image);
        if($image !== null) $jeu->image = $image;
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
        return redirect(route('jeux.show', $id))->with('success','Edition du jeu '.$jeu->title.' effectuée avec succès !');
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
            $jeu = Jeux::findOrFail($id);
            $jeu->delete();
        }
        return redirect(route('jeux.index'))->with('info', 'Jeu supprimé avec succès.');
    }

}
