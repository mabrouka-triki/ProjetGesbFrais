<?php
namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Visiteur extends Model {

//On déclare la table visiteur
protected Stable = 'visiteur';
public $timestamps = false;
protected $fillable = [

'id visiteur',

'id laboratoire',

tid secteur',

‘nom visiteur',

‘prenom visiteur',

‘adresse visiteur',

‘cp visiteur',

‘ville visiteur',

‘date_embauche',

‘login visiteur",

‘pud visiteur",

‘type visiteur"

