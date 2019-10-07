<?php

namespace App\Http\Controllers;

use App\Http\Models\Jeux;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index() {
        /*
        $jeux = array (
            0 =>
                array (
                    'id' => 1,
                    'nom' => 'Call Of Duty : Modern Warfare',
                    'annee_sortie' => '2019',
                    'age_min' => '14+',
                    'categorie' => 'FPS',
                    'description' => 'Jeu de tirs.',
                ),
            1 =>
                array (
                    'id' => 2,
                    'nom' => 'Borderlands 3',
                    'annee_sortie' => '2019',
                    'age_min' => '16+',
                    'categorie' => 'FPS',
                    'description' => 'Jeu de tirs.',
                ),
            2 =>
                array (
                    'id' => 3,
                    'nom' => 'Watch Dogs Legion',
                    'annee_sortie' => '2020',
                    'age_min' => '16+',
                    'categorie' => 'TPS',
                    'description' => 'Jeu immersif dans un Open World.',
                ),
            3 =>
                array (
                    'id' => 4,
                    'nom' => 'Star Wars : Fallen Order',
                    'annee_sortie' => '2019',
                    'age_min' => '14+',
                    'categorie' => 'Open World',
                    'description' => 'Jeu Star Wars.',
                ),
            4 =>
                array (
                    'id' => 5,
                    'nom' => 'Red Dead Redemption 2',
                    'annee_sortie' => '2018',
                    'age_min' => '18+',
                    'categorie' => 'GTA Like',
                    'description' => 'Jeu Far Wast immersif avec un Online et un mode histoire complet.',
                ),
        );
        */
        $jeux = Jeux::all();
        return view('jeux.index', ['jeux' => $jeux]);
    }
}
