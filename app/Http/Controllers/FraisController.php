<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\dao\ServiceFrais;
use Illuminate\Support\Facades\Session;
use App\Exceptions\MonException;
use Illuminate\Http\Request;

class FraisController extends Controller
{
    public function getFraisVisiteur()
    {
        try {
            $monErreur = Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceFrais = new ServiceFrais();
            $id_visiteur = Session::get('id');
            echo $id_visiteur;
            $mesFrais = $unServiceFrais->getFrais($id_visiteur);
            echo $mesFrais;
            $erreur = $monErreur;
            return view('Vues/listeFrais', compact('mesFrais', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('erreur'));
        }
    }


    public function validateFrais(Request $request)
    {
        try {
            $id_frais = request:: input('id_frais');
            $anneemois = request:: input('anneemois');
            $nbjustificatifs = request:: input('nbjustificatifs');
            $unServiceFrais = new ServiceFrais();

            if ($id_frais > 0) {
                $this->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $montant = request:: input('montant');
                $id_visiteur = session::get('id');
                $unServiceFrais->insertFrais($anneemois, $nbjustificatifs, $id_visiteur, $montant);
            }
            return redirect('/getListeFrais');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        }
    }



    public function addFrais()
    {
        try {

            $monErreur = "";
            $titreVue = "Ajout d'une fiche de frais";
            $unFrais="";

            return view('Vues/formFrais', compact('unFrais', 'titreVue', 'monErreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        } catch (Exception $e) {

            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        }
    }



    public function updateFrais($id_frais)
    {
        try {
            $monErreur = "";
            $unServiceFrais = new ServiceFrais();
            $unFrais = $unServiceFrais->getFrais($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            return view('Vues/fromFrais', compact('unFrais', 'titreVue', 'monErreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }


        public function ValideFraisHorsForfait()
    {
        try {
            $id_frais = request:: input('id_frais');
            $anneemois = request:: input('anneemois');
            $nbjustificatifs = request::input('nbjustificatifs');
            $unServiceFrais = new ServiceFrais();

            if ($id_frais > 0) {
                $this->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $montant = request::input('montant');
                $id_visiteur = session::get('id');
                $unServiceFrais->insertFrais($anneemois, $nbjustificatifs, $id_visiteur, $montant);
            }
            return redirect('/getListeFrais');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));

        }
    }



    public function supprimerFrais($id_frais)
    {
        try {
            $unServiceFrais = new ServiceFrais();
            $unServiceFrais->deleteFrais($id_frais);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            Session::put('erreur', 'Impossible de supprimer une fiche ayant des Frais Hors Forfait');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            Session::put('erreur', 'Impossible de supprimer une fiche');
        } finally {
            return redirect('/getlisteFrais');
        }
    }



}
