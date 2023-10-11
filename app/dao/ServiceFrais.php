<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;

class ServiceFrais
{
    public function getFrais($id_visiteur)
    {
        try {
            $lesFrais = DB::table('frais')
                ->select()
                ->where('frais.id_visiteur', '=', $id_visiteur)
                ->get();

            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }



    public function updateFrais($id_frais, $anneemois, $nbjustificatifs)
    {
        try {
            $dateJour = date("Y-m-d");

            DB::table('frais')
                ->where('id_frais', '=', $id_frais)

                ->update(['anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs]);


            return "Mise à jour des frais réussie.";
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }



    public function insertFrais($anneemois, $nbjustificatifs, $id_visiteur)
    {
        try {


            DB::table('frais')->insert(
                ['anneemois' => $anneemois,
                    'nbjustificatifs' => $nbjustificatifs,
                    'id_etat' => 2,
                    'id_visiteur' => $id_visiteur,
                    'montantvalide' => 0]
            );
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function deleteFrais($id_frais)
    {
        try {
            DB::table('fraishorsforfait')->where('id_frais', '=', $id_frais)->delete();
            DB::table('frais')->where('id_frais', '=', $id_frais)->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
    }
    }
}