@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('validateFrais') }}">
        @csrf
        <input type="hidden" name="id_frais" value="{{ $unFrais->id_frais ?? 0 }}">
        <div class="form-group">
            <label for="anneemois">Année-Mois</label>
            <input type="text" class="form-control" id="anneemois" name="anneemois" value="{{ $unFrais->anneemois ?? '' }}">
        </div>
        <div class="form-group">
            <label for="nbjustificatifs">Nombre de justificatifs</label>
            <input type="text" class="form-control" id="nbjustificatifs" name="nbjustificatifs" value="{{ $unFrais->nbjustificatifs ?? '' }}">
        </div>
        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="text" class="form-control" id="montant" name="montant" value="{{ $unFrais->montant ?? '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
        <a href="{{ route('getListeFrais') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
