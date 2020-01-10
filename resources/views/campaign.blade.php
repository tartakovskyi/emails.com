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
                <!-- <textarea name="camp_letter" rows="10" placeholder="Enter template of the letter wich will be sending to the campaign recipients">@isset ($campaign) {{$campaign['camp_letter']}}@endisset</textarea> -->
                <select name="camp_letter" class="form-control">
                    <option>Choose letter template</option>
                    @foreach ($templates as $template)
                    <option value="{{$template}}" @if (isset($campaign['camp_letter']) && $template === $campaign['camp_letter']) selected @endif >{{$template}}</option>
                    @endforeach
                </select>
            </label>
            <label>
                <strong>Autostart date</strong>
                <input type="text" class="form-control date-input" name="autostart_at" @isset ($campaign) value="{{$campaign['autostart_at']}}" @endisset placeholder="2020-01-01 11:11" >
            </label>
            <label>
                <strong>Recipients</strong>
                <a href="#campRecipients">@isset ($campaign) {{$recipients['count']}} @else 0 @endisset recipients</a>
            </label>
            <label>
                <strong>Status</strong>
                <span>@isset ($campaign) {{$campaign['status_name']}} @else New @endisset</span>
                <input type="hidden" name="camp_status" value="@isset ($campaign) {{$campaign['camp_status']}} @else 1 @endisset">
            </label>
            <div class="btn-toolbar">
                @isset ($campaign) <button class="btn btn-outline-danger mr-3" id="deleteBtn">Delete campaign</button>
                <a class="btn btn-outline-primary mr-3" href="/campaign/send/{{$campaign['id']}}/">Start right now</a>
                <button class="btn btn-primary" id="updateBtn">Save changes</button>
                @else
                <button class="btn btn-primary" id="saveBtn">Save campaign</button>
                @endisset
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex flex-column align-items-center">
        <h2>Select campaign recipients</h2>
        @isset ($campaign)
        <form id="campaignRecipients">
            @foreach ($recipients['list'] as $group => $groupRecipients)
            <div class="rec-group">
                <div class="rec-group__heading">
                    <input type="checkbox" name="{{$group}}">
                    <h4>{{$groups[$group]}}</h4>
                    <a href="#" data-target="{{$group}}">Show recipients list</a>
                </div>
                <ul class="rec-list" id="{{$group}}">
                    @foreach ($groupRecipients as $recipient)
                    <li class="rec-list__item">
                        <label class="d-flex align-items-center">
                            <input type="checkbox" name="{{$recipient['id']}}" @isset($recipient['camp_id']) checked @endisset><a href="/recipient/edit/{{$recipient['id']}}" target="_blank">{{$recipient['email']}}</a>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </form>
        @else
        <p>You should save the campaign before adding recipients!</p>
        @endisset 
    </div>
</div>
@endsection


