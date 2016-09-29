@extends('layouts.app')@section('title')    Laravelsite | Your Meme@endsection@section('content')    <!-- Page Content -->    <div class="container">        <!-- Projects Row -->        <div class="row centered">            <div class="col-md-8 col-xs-12 col-lg-8 col-sm-8">                <div class="row">                    <div class="pull-left">                        <img class="media-object" src="/uploads/profile_pic/{{$meme->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:10%; margin-right:25px; ">                    </div>                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-8 ">                        <p class="normal">                        <h3><a href="#">                                {{ ucfirst($meme->user->first_name) }} {{ ucfirst($meme->user->last_name) }}                            </a><br />                            <small>&nbsp; <span class="glyphicon glyphicon-time"></span>                                {{ $meme->created_at }}                            </small></h3></p>                    </div>                </div>                <img class="img-responsive" height=1000px width=1000px atr="http://placehold.it/700x400" src="/uploads/meme/photo/{{ $meme->name }}"><br>                <div class="list-inline" id="likecommentshare">                    {{ count(App\MemeLike::all()) }}                    @if($meme->like->where('user_id',Session::get('id'))->first() == null)                        <div id="count"></div> <div id="like" class="list-inline"><button type="submit" id="likeThisMeme" class="list-inline"><i class="fa fa-heart-o" aria-hidden="true"></i></button> Like </div> &nbsp; &nbsp; &nbsp; &nbsp;                        <div id="count"></div><div id="dislike" class="list-inline" style="display: none;"><button type="submit" id="dislikeThisMeme" class="list-inline"><i id="2" class="fa fa-heart" aria-hidden="true"></i></button> Liked  </div>&nbsp;  &nbsp; &nbsp; &nbsp;                        @else                        <div id="count"></div><div id="like" class="list-inline" style="display: none;"><button type="submit" id="likeThisMeme" class="list-inline"><i class="fa fa-heart-o" aria-hidden="true"></i></button> Like </div> &nbsp; &nbsp; &nbsp; &nbsp;                        <div id="count"></div><div id="dislike" class="list-inline"><button type="submit" id="dislikeThisMeme" class="list-inline"><i id="2" class="fa fa-heart" aria-hidden="true"></i></button> Liked  </div>&nbsp;  &nbsp; &nbsp; &nbsp;                        @endif                    <button type="button"><i class="fa fa-comment"></i> </button> Comment &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;                    <button type="button"><i class="fa fa-share" aria-hidden="true"></i></button> Share &nbsp; &nbsp; &nbsp;                </div>            </div>        </div>        <!-- /.container -->    </div>@endsection@section('script')    <script type="text/javascript">        $(document).ready(function () {           $('#likeThisMeme').on('click', function() {               $.ajax({                   type: 'POST',                   url: "{{ route('meme.like') }}",                   data: {                       meme_id:"{{ $meme->id }}",                       user_id:"{{ Session::get('id')}}",                       _token:"{{ csrf_token() }}",                   }, success: function (response) {                       if(response.status == 'like') {                           $('#like').hide();                           $('#dislike').show();                           alert(response.count);                       }                   }, error: function (response) {                       console.log(response);                   }               });           });           $('#dislikeThisMeme').on('click', function () {               $.ajax({                   type: 'POST',                   url: "{{ route('meme.dislike') }}",                   data: {                       meme_id:"{{ $meme->id }}",                       user_id:"{{ Session::get('id')}}",                       _token:"{{ csrf_token() }}",                   }, success: function (response) {                       if(response.status == 'dislike') {                           $('#like').show();                           $('#dislike').hide();                           alert(response.count);                       }                   }, error: function (response) {                       console.log(response);                   }               });           });        });    </script>@endsection