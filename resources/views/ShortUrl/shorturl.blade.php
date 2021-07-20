<!DOCTYPE html>

<h1>SHORT URL TEST</h1>

<form action="{{ url('/smallUrl')}}" method="post">
    
    {{csrf_field()}}

    <input type="text" name="bigUrl" id="bigUrl">
    <input type="checkbox" name="NSFW" id="nsfw">
    <br>
    <button type="submit">Short your URL!</button>
</form>

@if(isset($compactUrl) && $compactUrl == 'NOT URL')
    <h1>ERROR: THIS IS NOT A VALID URL</h1>
@elseif(isset($compactUrl))
    <h1>{{$compactUrl}}</h1>
@endif

</html>