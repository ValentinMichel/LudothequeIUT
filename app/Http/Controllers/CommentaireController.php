<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Commentaire::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
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
                'id' => 'required',
                'title' => ['required', 'max:70'],
                'auteur' => ['required', 'max:255'],
                'commentaire' => ['required', 'max:255'],
            ],
            [
                'title.required' => "Le titre du commentaire doit être indiqué.",
                'title.max' => "Le titre du commentaire ne doit pas excéder 70 caractères.",
                'auteur.required' => "L'auteur du commentaire doit être indiqué.",
                'auteur.max' => "L'auteur du commentaire ne doit pas excéder 255 caractères.",
                'commentaire.required' => "Le contenu du commentaire doit être indiqué.",
                'commentaire.max' => "Le contenu du commentaire ne doit pas excéder 255 caractères.",
            ]
        );
        $jeu = Jeux::findOrFail($request->id);
        $comment = new Commentaire();
        $comment->jeux_id = $request->id;
        $comment->titre = $request->title;
        $comment->auteur = $request->auteur;
        $comment->body = $request->commentaire;
        $comment->auteur_id = $request->auteur_id;
        $comment->save();
        return redirect('/jeux/'.$request->id)->with('success','Vous avez commenté le jeu '.$jeu->title.' !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $comments = Jeux::findOrFail($id)->comments()->get()->all();
        $jeu = Jeux::findOrFail($id);
        return view('comments.show', ['comments' => $comments, 'jeu' => $jeu, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Commentaire::findOrFail($id);
        $jeu = Jeux::findOrFail($comment->jeux_id);
        return view('comments.edit', ['comment' => $comment, 'jeu' => $jeu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => ['required', 'max:70'],
                'auteur' => ['required', 'max:255'],
                'commentaire' => ['required', 'max:255'],
            ],
            [
                'title.required' => "Le titre du commentaire doit être indiqué.",
                'title.max' => "Le titre du commentaire ne doit pas excéder 70 caractères.",
                'auteur.max' => "L'auteur du commentaire ne doit pas excéder 255 caractères.",
                'commentaire.required' => "Le contenu du commentaire doit être indiqué.",
                'commentaire.max' => "Le contenu du commentaire ne doit pas excéder 255 caractères.",
            ]
        );
        $comment = Commentaire::findOrFail($id);
        $jeu = Jeux::findOrFail($comment->jeux_id);
        $comment->titre = $request->title;
        $comment->body = $request->commentaire;
        $comment->save();
        return redirect('/jeux/'.$jeu->id)->with('success', 'Vous avez édité votre commentaire sur '.$jeu->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valideFromIndex') {
            $comment = Commentaire::findOrFail($id);
            $comment->delete();
            return redirect('/comments');
        }
        else if($request->delete == 'valideFromShow'){
            $comment = Commentaire::findOrFail($id);
            $comment->delete();
            return redirect()->back();
        }
    }

}
