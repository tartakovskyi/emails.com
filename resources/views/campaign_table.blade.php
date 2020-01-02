<table id="campaignTable" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th class="th-sm">Campaign</th>
            <th class="th-sm">Status</th>
            <th class="th-sm">Autostart date and time</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($campArr as $campaign)
        <tr>
            <td>{{$campaign['camp_name']}}</td>
            <td>{{$campaign['status_name']}}</td>
            <td>{{$campaign['autostart_at']}}</td>
            <td><button class="btn btn-primary">Start right now</button></td>
            <td><a href="/campaign/edit/{{$campaign['id']}}/">edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>