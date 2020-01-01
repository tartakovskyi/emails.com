@extends('layouts.app')

@section('metaTitle', 'Campaigns')
@section('title', 'Campaigns')

@section('content')
<div class="row">
    <div class="col-3">
        <form id="filter">
            <div class="filter-heading">
                <h3>Filter</h3>
            </div>
            <div class="filter-block">
                <h6>Statuses</h6>
                <label>
                    <input type="checkbox" name="allStatuses" class="all" data-target="statusSet" checked>
                    <strong>All statuses</strong>
                </label>
                <fieldset id="statusSet" data-param="status_id" class="items-set">
                    @foreach ($statuses as $status)
                    <label>
                        <input type="checkbox" name="{{$status->id}}" checked>
                        <span>{{$status->status_name}}</span>
                    </label>
                    @endforeach
                </fieldset>
            </div>
        </form>
    </div>
    <div class="col-9">
        <div id="campaignTableWrap"></div>
    </div>
</div>
@endsection


