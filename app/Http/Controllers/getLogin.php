<?php

namespace App\Http\Controllers;


class getLogin
{
    public function getLogin()
    {
        try {
            $erreur = "";
            return view('Vues/formLogin', compact('erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/formLogin', compact('erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/formLogin', compact('erreur'));
        }
    }

}
