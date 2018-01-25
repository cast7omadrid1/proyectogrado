@extends('layouts.app')

@section('content')

<h1>Bienvenid@ {{Auth::user()->name}} a su Panel de usuario logueado</h1>
@stop

