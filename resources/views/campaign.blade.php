@extends('layouts.app')

@isset ($campaign)
@section('metaTitle', 'Campaign information')
@section('title', 'Campaign information')
@else
@section('metaTitle', 'Add new campaign')
@section('title', 'Add new campaign')
@endisset


@section('content')
<a href="/campaign/list/" class="btn-link d-flex align-items-center return"><svg><use xlink:href="/img/icons.svg#back"></use></svg><span>Return to campaign list</span></a>
<div class="row justify-content-center">
    <div class="col-5">
        <span id="message"></span>
        <form class="form d-flex flex-column align-items-center" id="campaignForm">
            @isset ($campaign)
            <label>
                <strong>ID</strong>
                <input type="text" class="form-control" readonly name="id" value="{{$campaign['id']}}">
            </label>
            @endisset
            <label>
                <strong>Campaign name</strong>
                <input type="text" class="form-control" name="camp_name" @isset ($campaign) value="{{$campaign['camp_name']}}" @else placeholder="Motor-car enthusiasts" @endisset>
            </label>
            <label>
                <strong>Letter template</strong>
                <textarea name="camp_letter" rows="10" placeholder="Enter template of the letter wich will be sending to the campaign recipients">@isset ($campaign) {{$campaign['camp_letter']}}@endisset</textarea>
            </label>
            <label>
                <strong>Status</strong>
                <span>@isset ($campaign) {{$campaign['status_name']}} @else New @endisset</span>
                <input type="hidden" name="camp_status" value="@isset ($campaign) {{$campaign['camp_status']}} @else 1 @endisset">
            </label>
            <div class="btn-toolbar">
                @isset ($campaign) <button class="btn btn-outline-danger mr-3" id="deleteBtn">Delete campaign</button> 
                <button class="btn btn-primary" id="updateBtn">Save changes</button>
                @else
                <button class="btn btn-primary" id="saveBtn">Save campaign</button>
                @endisset
            </div>
        </form>
    </div>
</div>
@endsection


