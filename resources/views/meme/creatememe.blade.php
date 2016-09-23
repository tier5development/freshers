@extends('layouts.app')

@section('title')
    Laravelsite | Create Meme
@endsection

@section('style')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="/js/spectrum.js"></script>
    <script type="text/javascript" src="/js/jquery.memegenerator.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.memegenerator.min.css">
    <link rel="stylesheet" type="text/css" href="/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        h2 {
            display: block;
            text-align: center;
        }

        .example {
            margin: 0 0 10% 0;
        }

        .bootstrap {
            width: 600px;
            margin-right: auto;
            margin-left: auto;
        }

        .save button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            font-size: 24px;
        }

        #preview {
            min-height: 200px;
            background-color: #EFEFEF;
        }
        #preview img {
            max-width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="example save">
        <h2>Create Your own Meme</h2>

        <img src="/uploads/meme/{{ $photo }}" id="example-save">

        <div id="toolbar"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-6" id="preview"></div>

                <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
                    <button class="btn btn-success" id="save">Preview</button>
                    <button class="btn btn-danger" id="download">Download</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example with saving
        $("#example-save").memeGenerator({
            useBootstrap: false,
            layout: "horizontal",
            previewMode: "css",
            defaultTextStyle: {
                font: "'Comic Sans', Arial",
            },
            captions: [
                "PREDEFINED text on top"
            ]

        });

        $("#save").click(function(e){
            e.preventDefault();

            var imageDataUrl = $("#example-save").memeGenerator("save");

            $("#preview").html(
                    $("<img>").attr("src", imageDataUrl)
            );
        });

        $("#download").click(function(e){
            e.preventDefault();

            $("#example-save").memeGenerator("download");
        });
        //
    </script>
@endsection
