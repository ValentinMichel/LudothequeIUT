<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeux;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $nbJeux = Jeux::all()->count();
        $nbComments = Commentaire::all()->count();
        $nbTags = Tag::all()->count();
        $nbUsers = User::all()->count();
        return view('admin.index', ['nbJeux' => $nbJeux, 'nbComments' => $nbComments, 'nbTags' => $nbTags, 'nbUsers' => $nbUsers]);
    }
    public function members()
    {
        $members = User::all();
        return view('admin.members', ['members' => $members]);
    }

    public function update(Request $request){
        $user = User::findOrFail($request->id);
        if($user->type === 'admin')
            $user->type = User::DEFAULT_TYPE;
        else
            $user->type = User::ADMIN_TYPE;
        $user->save();
        return redirect(route('admin.members'))->with('success',"Vous avez changé le rang d'accès d'un utilisateur !");
    }
}
