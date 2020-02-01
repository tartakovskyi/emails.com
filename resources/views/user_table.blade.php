<table id="recipientTable" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th class="th-sm">ID</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Type</th>
            <th class="th-sm">Registration datet</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type->name}}</td>
            <td>{{$user->created_at}}</td>
            <td><a href="/user/edit/{{$user->id}}/">edit</a></td>        
        </tr>
        @endforeach
    </tbody>
</table>