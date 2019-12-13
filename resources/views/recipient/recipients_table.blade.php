<table id="recTable" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th><input type="checkbox" name="all"></th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Recipients group</th>
            <th class="th-sm">Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recArr as $recipient)
        <tr>
            <td><input type="checkbox" name="rec_{{$recipient['id']}}"></td>
            <td>{{$recipient['email']}}</td>
            <td>{{$recipient['last_name']}}, {{$recipient['first_name']}}</td>
            <td>{{$recipient['group_name']}}</td>
            <td>@if ($recipient['status'] === 1) Active @else Not active @endif</td>
            <td><a href="/recipient/{{$recipient['id']}}/edit/">edit</a></td>        
        </tr>
        @endforeach
    </tbody>
</table>