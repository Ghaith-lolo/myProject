@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>

        @endif
        <table class="table table-dark ">
            <thead>
                <tr>
                    <th scope="col" class="px-3">id</th>
                    <th scope="col" class="px-3">Offer name </th>
                    <th scope="col" class="px-3"> Offer Price </th>
                    <th scope="col" class="px-3">Offer details</th>
                    <th scope="col" class="px-3">Offer picture</th>
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
                        <td class="px-3"> <img src="{{ asset('images/offers' . $offer->photo) }}" alt=""
                                width="40px"></td>
                        <td class="px-3"><a href="{{ Route('edit', $offer->id) }}" class="btn btn-success "
                                style="margin-right: 4px">
                                Edit</a><a href="{{ Route('offers.delete', $offer->id) }}" class="btn btn-danger ">
                                Delete</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
<style>

</style>
