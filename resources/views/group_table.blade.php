<table id="recTable" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th><input type="checkbox" name="all"></th>
            <th class="th-sm">Group</th>
            <th class="th-sm">Description</th>
            <th class="th-sm">Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groupArr as $group)
        <tr>
            <td><input type="checkbox" name="rec_{{$group['id']}}"></td>
            <td>{{$group['group_name']}}</td>
            <td style="max-width: 30%">{{$group['group_description']}}</td>
            <td>@if ($group['group_status'] === 1) Active @else Not active @endif</td>
            <td><a href="/group/edit/{{$group['id']}}/">edit</a></td>        
        </tr>
        @endforeach
    </tbody>
</table>