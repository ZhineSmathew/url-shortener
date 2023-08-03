<html>
<head>
    <title>Url Shortener</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   

<style>
    h1{
        text-align:center;
        padding-top:60px;
        color:#d92b5f;
        font-family:Times;
    }
    .container{
        padding-top:30px;
        padding-left:50px;
        padding-right:50px;
        background-color:Grey;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   <h1>Laravel - Create Your URL Shortener</h1>
<div class="container">
    
   
    <div class="card">
      <div class="card-header">
      <form id="urlShortenerForm">
            <div class="input-group mb-3">
              <input type="text" name="org_link" id="org_link_input" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <a href="#" id="fixurl" class="btn btn-success" data-target="#accounts_sbar_search">Generate Shorten Link</a>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm" id="urlTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($shortLinks as $row)
                        <tr>
                            <td id="one">{{ $row->id }}</td>
                            <td><a href="{{ url('shortlink', $row->short_link) }}" target="_blank">{{ url('shortlink', $row->short_link) }}</a></td>
                            <td>{{ $row->org_link }}</td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
      </div>
    </div>
   
</div>
<script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function () {
    $("#fixurl").click(function () {
      
    var orgLink = $("#org_link_input").val();
    $.ajax({
            url: "/store",
            type: "post",
            data:{ org_link: orgLink },
            success: function(response) {
            console.log(response);
            $("#org_link_input").val('');
            },
            error: function(response){
            //var errors = data.responseJSON;   
            console.log('Uff');
            }
    })
})
});
</script>
</body>
</html>