<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recipients</title>   
    </head>
    
    <body>
        <h1><?php echo 'Recipients'; ?></h1>
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
    </body>

</html>