@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <form class="form d-flex flex-column align-items-center" id="recipientForm">
            <label>
                <strong>ID</strong>
                <input type="text" class="form-control" name="id" value="{{$recipient['id']}}">
            </label>
            <label>
                <strong>E-mail</strong>
                <input type="email" class="form-control" name="email" value="{{$recipient['email']}}">
            </label>
            <label>
                <strong>First name</strong>
                <input type="text" class="form-control" name="first_name" value="{{$recipient['first_name']}}">
            </label>
            <label>
                <strong>Last name</strong>
                <input type="text" class="form-control" name="last_name" value="{{$recipient['last_name']}}">
            </label>
            <label>
            	<strong>Group</strong>
              <select name="group_id" class="form-control">	
                  @foreach ($groups as $group)
                  <option value="{{$group['id']}}" @if ($group['id'] === $recipient['group_id']) selected="selected" @endif>{{$group['group_name']}}</option>
                  @endforeach
              </select>
          </label>
          <label class="checkbox">
            <input type="checkbox" name="status" @if ($recipient['status'] === 1) checked @endif>
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


