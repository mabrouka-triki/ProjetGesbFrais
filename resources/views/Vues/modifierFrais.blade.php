@extends("layouts.master")
@section("content")

    <div>
        <br><br><br><br>
        <div class="blanc"></div>
        <h1>Modification</h1>
    </div>

    <div class="well">
        {!! Form::open(['route' => ['updateFrais', $unEmploye->numEmp], 'method' => 'post']) !!}
        <div class="col-md-12 col-sm-12 well well-md">
            <center><h1></h1></center>

            <div class="form-horizontal">
                <div class="form-group">
                </div>
            </div>
        </div>
    </div>
