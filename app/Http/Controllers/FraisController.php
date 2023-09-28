<?php

namespace App\Http\Controllers;

use App\dao\ServiceFrais; // Assurez-vous d'importer ServiceFrais depuis le bon espace de noms
use Illuminate\Support\Facades\Session;
use App\Exceptions\MonException;
use Illuminate\Http\Request; // Importation de la classe Request depuis le bon espace de noms

class FraisController extends Controller
{
    public function getFraisVisiteur()
    {
        try {
            $monErreur = Session::get('monErreur');
            Session::forget('monErreur');

            $unServiceFrais = new ServiceFrais(); // Assurez-vous d'importer ServiceFrais depuis le bon espace de noms
            $id_visiteur = Session::get('id');
            $mesFrais = $unServiceFrais->getFrais($id_visiteur);

            return view('Vues/listeFrais', compact('mesFrais', 'monErreur')); // Correction : Utilisation de 'monErreur' au lieu de 'erreur'
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/formLogin', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }
}
