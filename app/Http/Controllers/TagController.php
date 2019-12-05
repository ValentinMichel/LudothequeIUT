<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => ['required','max:255']
            ],
            [
                'title.required' => "Le label doit être indiqué pour créer le tag.",
                'title.max' => "Le tag ne peut pas excéder 30 caractères."
            ]
        );
        $tag = new Tag();
        $tag->label = $request->title;
        $tag->save();
        return redirect('/tags')->with('success','Vous avez ajouté le tag '.$request->title.' avec succès à la liste !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $tag = Tag::find($id);
            $tag->delete();
        }
        return redirect('/tags');
    }

}
