@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <form class="form d-flex flex-column align-items-center" id="recipientForm">
            @if (request()->is('*/edit'))
            <label>
                <strong>ID</strong>
                <input type="text" class="form-control" readonly name="id" value="{{$recipient['id']}}">
            </label>
            @endif
            <label>
                <strong>E-mail</strong>
                <input type="email" class="form-control" name="email" @if (request()->is('*/edit')) value="{{$recipient['email']}}" @else placeholder="example@example.com" @endif>
            </label>
            <label>
                <strong>First name</strong>
                <input type="text" class="form-control" name="first_name" @if (request()->is('*/edit')) value="{{$recipient['first_name']}}" @else placeholder="John" @endif>
            </label>
            <label>
                <strong>Last name</strong>
                <input type="text" class="form-control" name="last_name" @if (request()->is('*/edit')) value="{{$recipient['last_name']}}" @else placeholder="Doe" @endif>
            </label>
            <label>
            	<strong>Group</strong>
              <select name="group_id" class="form-control">
                @if (request()->is('add'))
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
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-toolbar">
            <button class="btn btn-light" id="backBtn">Back</button>
            <button class="btn btn-primary" id="saveRecipientBtn">Save</button>
        </div>
    </form>
</div>
</div>
@endsection


