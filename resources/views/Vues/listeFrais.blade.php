@extends('layouts/master')
@section('content')

    <br>
    <br>
    <br>
    <h1 style="text-align: center" >Liste des frais </h1>
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th style="width: 60%">Période</th>
            <th style="width: 60%">Modifier</th>
            <th style="width: 60%">Supprimer</th>
        </tr>
        </thead>
        @foreach($mesFrais as $unFrais)
            <tr>
                <td> {{$unFrais->anneemois}}</td>
                <td style="text-align: center">
                    <a href="{{ url('/modifierFrais') }}/{{ $unFrais->id_frais }}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="modifier"></span>
                    </a>
                </td>
                <td style="text-align: center">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="supprimer"
                       onclick="if (confirm('Suppression confirmée ?')) {
                window.location='{{ url('/supprimerFrais') }}/{{ $unFrais->id_frais }}';}">
                    </a>
                </td>

            </tr>
        @endforeach
    </table>
    @include('vues/error')
@stop



