@extends('layouts.app')

@section('metaTitle', 'Users')
@section('title', 'Users')

@section('content')
<div class="row">
    <div class="col-3">
        <form id="filter">
            <div class="filter-heading">
                <h3>Filter</h3>
            </div>
            <div class="filter-block">
                <h6>Types</h6>
                <label>
                    <input type="checkbox" name="allTypes" class="all" data-target="typeSet" checked>
                    <strong>All types</strong>
                </label>
                <fieldset id="typeSet" data-param="type_id" class="items-set">
                    @foreach ($types as $type)
                    <label>
                        <input type="checkbox" name="{{$type->id}}" checked>
                        <span>{{$type->name}}</span>
                    </label>
                    @endforeach
                </fieldset>
            </div>
        </form>
    </div>
    <div class="col-9">
        <div id="userTableWrap"></div>
    </div>
</div>
@endsection


