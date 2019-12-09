@extends('layouts.app')

@section('content')
<table>
	<tr>
		<th><input type="checkbox" name="all"></th>
		<th>Email</th>
		<th>Name</th>
		<th>Recipients group</th>
		<th>Status</th>
		<th></th>
	</tr>
    @foreach ($recArr as $recipient)
    <tr>
    	<td><input type="checkbox" name="rec_{{$recipient['id']}}"></td>
        <td>{{$recipient['email']}}</td>
        <td>{{$recipient['last_name']}}, {{$recipient['first_name']}}</td>
        <td>{{$recipient['group_name']}}</td>
        <td>{{$recipient['status']}}</td>
        <td><a href="/recipient/{{$recipient['id']}}/edit/">edit</a></td>        
    </tr>
    @endforeach 
</table>
@endsection


