@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 d-flex align-items-center flex-column">
            <a class="btn btn-primary btn-lg btn-block" href="/recipient/list/">Recipients</a>
            <a class="btn btn-primary btn-lg btn-block" href="/group/list/">Groups</a>
            <a class="btn btn-primary btn-lg btn-block" href="/campaign/list/">Campaigns</a>
        </div>
    </div>
</div>
@endsection
