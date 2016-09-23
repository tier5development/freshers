
@extends('layouts.app')

@section('title')
    Laravelsite | View Photo For meme
@endsection

@section('style')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/vicons-font.css" />
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/snap.svg-min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endsection

@section('content')

<div id="morph-shape" class="morph-shape" data-morph-next="M301,301c0,0-83.8-21-151-21C71.8,280-1,301-1,301s21-65.7,21-151C20,79.936-1-1-1-1s73,11,151,11c85,0,151-11,151-11
	s-21,66.43-21,151C280,229.646,301,301,301,301z">
    <svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
        <path d="M301,301c0,0-83.8,0-151,0c-78.2,0-151,0-151,0s0-65.7,0-151C-1,79.936-1-1-1-1s73,0,151,0c85,0,151,0,151,0s0,66.43,0,151
C301,229.646,301,301,301,301z" />
    </svg>
</div>
<hr />
<hr />
<div class="main">
    <div class="container">
        <header class="codrops-header">
            <div class="centered">
                <a href="{{ route('photo.upload') }}"> <i class="fa fa-upload fa-4x" aria-hidden="true">Upload new Photo</i></a>
            </div>
            <div><h2>OR</h2></div>
            <h1>Select a Photo</h1>
        </header>
        <div class="stack">
            <ul id="elasticstack" class="stack__images">
                @foreach($photos as $photo)
                    <li><a href="{{ route('create.meme', [$photo->id]) }}"><img src="/uploads/meme/{{ $photo->name }}" height=300 width=300 /></a></li>
                @endforeach
            </ul>
        </div>
        <button id="stack-next" class="stack__next"><i class="icon icon-down"></i><span>Next</span></button>

    </div>
</div>
<script src="js/draggabilly.pkgd.min.js"></script>
<script src="js/elastiStack.js"></script>
<script>
    (function() {
        var body = document.body,
                titles = [].slice.call( document.querySelectorAll( '#stack-titles > li' ) ),
                totalTitles = titles.length,
                stack = new ElastiStack( document.getElementById( 'elasticstack' ), {
                    onUpdateStack : function( idx ) {
                        classie.remove( titles[idx === 0 ? totalTitles - 1 : idx - 1], 'current' );
                        classie.add( titles[idx], 'current' );
                    }
                } ),
                shapeEl = document.getElementById( 'morph-shape' ),
                s = Snap( shapeEl.querySelector( 'svg' ) ),
                pathEl = s.select( 'path' ),
                paths = {
                    reset : pathEl.attr( 'd' ),
                    next  : shapeEl.getAttribute( 'data-morph-next' )
                };

        document.getElementById( 'stack-next' ).addEventListener( 'mousedown', nextItem );

        function nextItem() {
            classie.add( body, 'animating' );
            classie.add( body, 'navigate-next' );
            pathEl.stop().animate( { 'path' : paths.next }, 450, mina.easeinout, function() {
                classie.remove( body, 'navigate-next' );
                stack.nextItem( { transform : 'rotate3d(0,0,1,3deg) translate3d(0,-40px,300px)' } );
                pathEl.stop().animate( { 'path' : paths.reset }, 100, mina.easeout, function() {
                    classie.remove( body, 'animating' );
                } );
            } );
        }
    })();
</script>

@endsection