<?php

namespace App\dao;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
/*
 * @param  type $id_Visiteur: Login du visiteur

 * @return  type collection frais
 */

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



    public function updateFrais($id_frais,$anneemois,$nbjustificatifs)
    {
        try {
            $dateJour = date("Y-m-d");
            DB::table(frais);
                ->where('id_frais', '=', $id_frais)
                ->update(['anneemois'=>$anneemois,'nbjustifi'])
                ->get();

            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
