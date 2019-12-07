@extends('layouts.app')

@section('content')
<table>
    @foreach ($recArr as $recipient)
    <tr>
        <td>{{$recipient['email']}}</td>
        <td>{{$recipient['last_name']}}, {{$recipient['first_name']}}</td>
        <td>{{$recipient['group_name']}}</td>
        <td>{{$recipient['status']}}</td>
        <td><a href="/recipient/{{$recipient['id']}}/edit/">edit</a></td>        
    </tr>
    @endforeach 
</table>
@endsection


