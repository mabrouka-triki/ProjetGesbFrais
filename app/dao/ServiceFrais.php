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
                // Correction 2 : Passage des valeurs à update
                ->update(['anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs]);


            return "Mise à jour des frais réussie.";
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
