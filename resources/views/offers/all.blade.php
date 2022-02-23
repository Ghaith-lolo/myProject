@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col" class="px-3">id</th>
                    <th scope="col" class="px-3">Offer name </th>
                    <th scope="col" class="px-3"> Offer Price </th>
                    <th scope="col" class="px-3">Offer details</th>
                    {{-- <th scope="col" class="px-3">Offer picture</th> --}}
                    <th scope="col" class="px-3"> Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <th scope="row" class="px-3">{{ $offer->id }}</th>
                        <td class="px-3">{{ $offer->name }}</td>
                        <td class="px-3">{{ $offer->price }}</td>
                        <td class="px-3">{{ $offer->details }}</td>
                        {{-- <td class="px-3"> <img src="{{ asset('images/offers' . $offer->photo) }}" alt="" width="100px"></td> --}}
                        <td class="px-3"><a href="{{ Route('edit', $offer->id) }}" class="btn btn-success">
                                Edit</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
<style>

</style>
