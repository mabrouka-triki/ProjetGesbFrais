<?php

namespace App\Http\Controllers;

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


public function validateFrais(){
        try{
            $id_frais=Request::input('id_frais');
            $anneemois=Request::input('anneemois');
            $nbjustificatifs=Request::input('nbjustificatifs');
            $unServicefrais=new ServiceFrais();
            if($id_frais>0){
                $unServicefrais=updateFrais($id_frais,$anneemois,$nbjustificatifs);
            }else{
                $montant=Request::input('montant');
                $id_visiteur=session::get('id');
                $unServicefrais->insertFrais($anneemois,$nbjustificatifs,$id_visiteur,$montant);
            }
            return redirect('/getListeFrais');
        }catch(MonException $e){
            $monErreur=$e->getMessage();
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
            $unServiceFrais = new ServiceFrais();
            $unFrais = $unServiceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            $erreur = null;

            return view('Vues/modifFrais', compact('unFrais', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        }
    }

}
