<?php

namespace App\dao;
/*


 * @param  type $id_Visiteur: Login du visiteur

 * @return  type collection frais
 */

use App\Exceptions\MonException;
use Illuminate\Database\QueryException;

class ServiceFrais
{
    public function getFrais($id_visiteur)
    {
        try {
            $lesFrais = DB::table('frais')
                    ->Select()
                    ->where('frais.id_visiteur', '=', $id_visiteur)
                - get();
    return $lesFrais;

} catch
        (QueryException $e) {

            throw new MonException($e->getMessage(), 5);
        }
    }
}
