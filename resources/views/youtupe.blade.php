@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">

            <div>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            </div>
            <div class="">
                <strong>
                    Video Viewer ({{$video ->viewer}})
                </strong>
            </div>

        </div>
    </div>
@endsection
