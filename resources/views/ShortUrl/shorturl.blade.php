<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ShortURL</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
  </head>
  <body>

    <div class="container">
      <div class="shortner-div">
        <ul class="nav nav-pills nav-fill" id="nav">
          <li class="nav-item">
            <a class="nav-link active" href="/smallUrl">URL Shortner</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="/topUrl">Top 100</a>
          </li>
        </ul>
        <div class="form-container">

        <form action="{{ url('/smallUrl')}}" method="post">
            {{csrf_field()}}
            <h1>Shorten your URL</h1>
            <div class="form-group form-content">
                <input type="text" class="form-control" name="bigUrl" id="bigUrl"/>
                <div class="custom-control custom-switch switch">
                <input
                    type="checkbox"
                    class="custom-control-input"
                    name="nsfw"
                    id="nsfw"
                />
                <label class="custom-control-label" for="nsfw">NSFW</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-short">Make it smaller!</button>
            
        </form>


          <div class="result">
            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
              <div class="card-header">This is your shortened link</div>
              <div class="card-body">
                
                @if(isset($compactUrl) && $compactUrl == 'NOT URL')
                    <h5 class="card-title">ERROR: THIS IS NOT A VALID URL</h5>
                @elseif(isset($compactUrl))
                    <a class="card-title" href="{{url('/smallUrl/'. str_replace('https://smallUrl.com/','',$compactUrl))}}">{{$compactUrl}}</a>
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="{{ asset('js/script.js')}}"></script>

    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
