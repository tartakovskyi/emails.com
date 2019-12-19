@extends('layouts.app')

@section('metaTitle', 'Recipient groups')
@section('title', 'Groups')
@section('subTitle', 'of the e-mail recipients')

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
                <fieldset id="statusSet" data-param="status" class="items-set">
                    <label>
                        <input type="checkbox" name="1" checked>
                        <span>Active</span>
                    </label>
                    <label>
                        <input type="checkbox" name="0" checked>
                        <span>Not active</span>
                    </label>
                </fieldset>
            </div>
        </form>
    </div>
    <div class="col-9">
        <div id="groupTableWrap"></div>
    </div>
</div>
@endsection


