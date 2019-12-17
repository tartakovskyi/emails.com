@extends('layouts.app')

@section('content')
<a href="/recipient/list/" class="btn-link d-flex align-items-center return"><svg><use xlink:href="/img/icons.svg#back"></use></svg><span>Return to recipients list</span></a>
<div class="row justify-content-center">
    <div class="col-5">
        <span id="message"></span>
        <form class="form d-flex flex-column align-items-center" id="recipientForm">
            @isset ($recipient)
            <label>
                <strong>ID</strong>
                <input type="text" class="form-control" readonly name="id" value="{{$recipient['id']}}">
            </label>
            @endisset
            <label>
                <strong>E-mail</strong>
                <input type="email" class="form-control" name="email" @isset ($recipient) value="{{$recipient['email']}}" @else placeholder="example@example.com" @endisset>
            </label>
            <label>
                <strong>First name</strong>
                <input type="text" class="form-control" name="first_name" @isset ($recipient) value="{{$recipient['first_name']}}" @else placeholder="John" @endisset>
            </label>
            <label>
                <strong>Last name</strong>
                <input type="text" class="form-control" name="last_name" @isset ($recipient) value="{{$recipient['last_name']}}" @else placeholder="Doe" @endisset>
            </label>
            <label>
            	<strong>Group</strong>
              <select name="group_id" class="form-control">
                @if (!$recipient)
                <option disabled selected>Choose a group</option>
                @endif
                @foreach ($groups as $group)
                <option value="{{$group['id']}}" @if (isset($recipient['group_id']) && $group['id'] === $recipient['group_id']) selected @endif>{{$group['group_name']}}</option>
                @endforeach
            </select>
        </label>
        <label class="checkbox">
            <input type="checkbox" name="status" @if (isset($recipient['status']) && $recipient['status'] === 1) checked @endif>
            <strong>Active</strong>
        </label>
        <div class="btn-toolbar">
            @isset ($recipient) <button class="btn btn-outline-danger mr-3" id="deleteBtn">Delete recipient</button> 
            <button class="btn btn-primary" id="updateBtn">Save changes</button>
            @else
            <button class="btn btn-primary" id="saveBtn">Save recipient</button>
            @endisset
        </div>
    </form>
</div>
</div>
@endsection


