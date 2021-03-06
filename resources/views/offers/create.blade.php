@extends('layouts.app')
@section('content')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0
        }

        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

    </style>

    <body class="antialiased">
        <div class="container">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
               {{Session::get('success')}}
            </div>
            @endif

            <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="styleForm">
                    <div class=" m-4">
                        <label for="offerPhoto">Choose Name </label>
                        <input type="file" class="form-control" id="offerPhoto" name="photo">
                        @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class=" m-4">
                        <label for="offerName">Offer Name </label>
                        <input type="text" class="form-control" id="offerName" name="name" placeholder="offer name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="  m-4">
                        <label for="offerPrice">Offer Price</label>
                        <input type="text" class="form-control" id="offerPrice" name="price" placeholder="offer price">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="  m-4">
                        <label for="offerDetails">Offer Details</label>
                        <input type="text" class="form-control" id="offerDetails" name="details"
                            placeholder="offer details">
                        @error('details')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary m-4">Save Offer</button>
            </form>
            <a href="{{route('all')}}" class="btn bg-dark m-4 text-white">Show All Offer</a>


        </div>
        </div>



    </body>

    <style>
        .btn {
            background: rgb(156, 212, 156);
            color: white;
            border-radius: 10px;
            padding: 5px 5px;
            margin: 10px
        }

    </style>
@endsection
