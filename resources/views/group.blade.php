@extends('layouts.app')

@section('content')
<a href="/group/list/" class="btn-link d-flex align-items-center return"><svg><use xlink:href="/img/icons.svg#back"></use></svg><span>Return to group list</span></a>
<div class="row justify-content-center">
    <div class="col-5">
        <span id="message"></span>
        <form class="form d-flex flex-column align-items-center" id="groupForm">
            @isset ($group)
            <label>
                <strong>ID</strong>
                <input type="text" class="form-control" readonly name="id" value="{{$group['id']}}">
            </label>
            @endisset
            <label>
                <strong>Group name</strong>
                <input type="text" class="form-control" name="group_name" @isset ($group) value="{{$group['group_name']}}" @else placeholder="Motor-car enthusiasts" @endisset>
            </label>
            <label>
                <strong>Group description</strong>
                <textarea name="group_description" class="form-control" rows="10" placeholder="Enter short description of the group">@isset ($group) {{$group['group_description']}}"@endisset</textarea>
            </label>
            @isset ($group)
            <label>
                <strong>Group recipients</strong>
                <a href="/recipient/list/?id={{$group['id']}}">{{$recipients}} recipients</a>
            </label>
            @endisset
        <label class="checkbox">
            <input type="checkbox" name="group_status" @if (isset($group['group_status']) && $group['group_status'] === 1) checked @endif>
            <strong>Active</strong>
        </label>
        <div class="btn-toolbar">
            @isset ($group) <button class="btn btn-outline-danger mr-3" id="deleteBtn">Delete group</button> 
            <button class="btn btn-primary" id="updateBtn">Save changes</button>
            @else
            <button class="btn btn-primary" id="saveBtn">Save group</button>
            @endisset
        </div>
    </form>
</div>
</div>
@endsection


