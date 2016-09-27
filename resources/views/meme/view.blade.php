@extends('layouts.app')

@section('title')
    Laravelsite | Your Meme
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Projects Row -->
        <div class="row centered">
            <div class="col-md-8 col-xs-12 col-lg-8 col-sm-8">
                <div class="row">
                    <div class="pull-left">
                        <img class="media-object" src="/uploads/profile_pic/{{$meme->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:10%; margin-right:25px; ">
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-8 ">
                        <p class="normal">
                        <h3><a href="#">
                                {{ ucfirst($meme->user->first_name) }} {{ ucfirst($meme->user->last_name) }}
                            </a><br />
                            <small>&nbsp; <span class="glyphicon glyphicon-time"></span>
                                {{ $meme->created_at }}
                            </small></h3></p>
                    </div>
                </div>
                <img class="img-responsive" height=1000px width=1000px atr="http://placehold.it/700x400" src="/uploads/meme/photo/{{ $meme->name }}">
            </div>

        </div>
        <!-- /.container -->
    </div>
@endsection
