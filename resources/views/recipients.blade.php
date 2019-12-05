@extends('layouts.app')

@section('content')
<table>
    @foreach ($recArr as $recipient)
    <tr>
        @foreach ($recipient as $prop)
        <td>
            {{$prop}}
        </td>
        @endforeach 
    </tr>
    @endforeach 
</table>
@endsection


