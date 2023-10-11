@extends('layouts.app')
@section('content')
    <div class="container">

        <h2>Ajout d'une fiche de frais</h2>
        <form method="POST" action="{{ route('postFrais') }}">
            @csrf

            <div class="form-group">
                <label for="anneemois">Année et mois</label>
                <input type="text" name="anneemois" class="form-control" placeholder="Ex: 202310">
            </div>

            <div class="form-group">
                <label for="nbjustificatifs">Nombre de justificatifs</label>
                <input type="number" name="nbjustificatifs" class="form-control">
            </div>

            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" name="montant" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

@endsection
@include('Vues/error')