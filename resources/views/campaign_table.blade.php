<table id="campaignTable" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th><input type="checkbox" name="all"></th>
            <th class="th-sm">Campaign</th>
            <th class="th-sm">Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($campArr as $campaign)
        <tr>
            <td><input type="checkbox" name="rec_{{$campaign['id']}}"></td>
            <td>{{$campaign['camp_name']}}</td>
            <td>{{$campaign['status_name']}}</td>
            <td><a href="/campaign/edit/{{$campaign['id']}}/">edit</a></td>        
        </tr>
        @endforeach
    </tbody>
</table>