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
      <!-- Button trigger modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">WARNING</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This is a NSFW link!!! Close this if you do not want to be redirected IN 10 SECONDS!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    <div class="container">
      <div class="shortner-div">
        <ul class="nav nav-pills nav-fill" id="nav">
          <li class="nav-item">
            <a class="nav-link" href="/smallUrl">URL Shortner</a>
          </li>
          <li class="nav-item">
                <a class="nav-link active" href="/topUrl">Top 100</a>
          </li>
        </ul>
        <div class="form-container">

      </div>

      <div class="top-div">

        <h1>Top 100 added links</h1>

        <span class="text-bold">

        @php
            $topUrls = new App\Http\Controllers\ShortUrlController();
            
        @endphp

        @foreach ($topUrls->index() as $url)
            
            <div class="card card-top shadow-sm p-3 mb-5 bg-white rounded">
                @if ($url->nsfw)
                    <span class="btn btn-danger">This link is marked as not safe for work!!</span>
                @endif

                <div class="card-header">{{$loop->index +1}}</div>
                <div class="card-body">
                    <a class="link-button">{{$url->smallUrl}}</a>
                    <!-- <button id=urlButton name=urlButton  class="link-button" >{{$url->smallUrl}}</button> -->
                    <p class="card-text">Previous url: {{$url->bigUrl}}</p>
                </div>
                <div class="card-footer text-muted">Amount of time entered: {{$url->addCount}}</div>
            </div>
        @endforeach

        
    </div>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
