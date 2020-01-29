<table id="campaignTable" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th class="th-sm">Campaign</th>
            <th class="th-sm">Status</th>
            <th class="th-sm">Autostart date</th>
            <th class="th-sm">Complete date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($campArr as $campaign)
        <tr>
            <td>{{$campaign->camp_name}}</td>
            <td>{{$campaign->campaignStatus->status_name}}</td>
            <td>{{$campaign->autostart_at}}</td>
            <td>{{$campaign->completed_at}}</td>
            <td>@if ($campaign->campaignStatus->status_name !== 'Completed') <a class="btn btn-primary" href="/campaign/send/{{$campaign->id}}/">Start right now</a> @endif</td>
            <td><a href="/campaign/edit/{{$campaign->id}}/">edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>