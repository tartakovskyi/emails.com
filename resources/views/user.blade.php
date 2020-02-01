@extends('layouts.app')

@isset ($user)
@section('metaTitle', 'User information')
@section('title', 'User information')
@else
@section('metaTitle', 'Add new user')
@section('title', 'Add new user')
@section('subTitle', 'Please, fill all of the fields of the form')
@endisset

@section('content')
<a href="/user/list/" class="btn-link d-flex align-items-center return"><svg><use xlink:href="/img/icons.svg#back"></use></svg><span>Return to users list</span></a>
<div class="row justify-content-center">
    <div class="col-5">
        <span id="message"></span>
        <form class="form d-flex flex-column align-items-center" id="userForm">
            @isset ($user)
            <label>
                <strong>ID</strong>
                <input type="text" class="form-control" readonly name="id" value="{{$user->id}}">
            </label>
            @endisset
            <label>
                <strong>Name</strong>
                <input type="text" class="form-control" name="name" @isset ($user) value="{{$user->name}}" @else placeholder="john" @endisset>
            </label>
            <label>
                <strong>E-mail</strong>
                <input type="email" class="form-control" name="email" @isset ($user) value="{{$user->email}}" @else placeholder="example@example.com" @endisset>
            </label>
            <label>
                <strong>Type</strong>
                <select name="type_id" class="form-control">
                    @if (!$user)
                    <option disabled selected>Choose a type</option>
                    @endif
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" @if (isset($user->type_id) && $type->id === $user->type_id) selected @endif>{{$type->name}}</option>
                    @endforeach
                </select>
            </label>       
            <div class="btn-toolbar">
                @isset ($user) <button class="btn btn-outline-danger mr-3" id="deleteBtn">Delete user</button> 
                <button class="btn btn-primary" id="updateBtn">Save changes</button>
                @else
                <button class="btn btn-primary" id="saveBtn">Save user</button>
                @endisset
            </div>
        </form>
    </div>
</div>
@endsection


