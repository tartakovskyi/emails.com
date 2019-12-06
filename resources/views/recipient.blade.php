@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <form class="form">
            <label>
                <span>ID</span>
                <input type="text" name="id" value="{{$recipient['id']}}">
            </label>
            <label>
                <span>E-mail</span>
                <input type="text" name="email" value="{{$recipient['email']}}">
            </label>
            <label>
                <span>First name</span>
                <input type="text" name="first_name" value="{{$recipient['first_name']}}">
            </label>
            <label>
                <span>Last name</span>
                <input type="text" name="last_name" value="{{$recipient['last_name']}}">
            </label>

        </form>
    </div>
</div>
@endsection


