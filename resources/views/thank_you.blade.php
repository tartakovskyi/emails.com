@extends('layouts.app')

@section('metaTitle', 'Campaign was completed!')
@section('title', 'Campaign was completed!')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 d-flex flex-column align-items-center">
        <p>Campaign '{{$campName}}' was successfully completed!</p>
        <a class="btn btn-outline-primary" href="/campaign/list/">Show the full campaigns list</a>      
    </div>
</div>
@endsection



