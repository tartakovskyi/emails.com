@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <form class="form d-flex flex-column align-items-center">
            <label>
                <span>ID</span>
                <input type="text" class="form-control" name="id" value="{{$recipient['id']}}">
            </label>
            <label>
                <span>E-mail</span>
                <input type="text" class="form-control" name="email" value="{{$recipient['email']}}">
            </label>
            <label>
                <span>First name</span>
                <input type="text" class="form-control" name="first_name" value="{{$recipient['first_name']}}">
            </label>
            <label>
                <span>Last name</span>
                <input type="text" class="form-control" name="last_name" value="{{$recipient['last_name']}}">
            </label>
            <label>
            	<span>Group</span>
            	 <select name="group_id" class="form-control">
            		
            		@foreach ($groups as $group)
            		<option value="{{$group['id']}}" @if ($group['id'] === $recipient['group_id']) selected="selected" @endif>{{$group['group_name']}}</option>
            		@endforeach
            		

            	</select>
            </label>

        </form>
    </div>
</div>
@endsection


