<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function getOffers()
    {
        return Offer::get();
    }

    // public function store()
    // {
    //     Offer::create([
    //         'name' => 'ghaith',
    //         'price' => '333',
    //         'details' => 'details offer'
    //     ]);
    // }
    public function setCreate()
    {
        return view('offers.create');
    }
    public function getAllOffers()
    {
        $offers = Offer::select('id', 'name', 'price', 'details', 'photo')->get();
        return view('offers.all', compact('offers'));
    }




    public function editOffer($offer_id)
    {
        // Offer::findOrFail($offer_id);

        $offer = Offer::find($offer_id);

        if (!$offer) {
            return redirect()->back();
        }

        $offer = Offer::select('id', 'name', 'details', 'price', 'photo')->find($offer_id);
        return view('offers.edit', compact('offer'));
    }




    public function updateOffer(OfferRequest $request, $offer_id)
    {
        $offer = Offer::find($offer_id);
        if (!$offer) {
            return redirect()->back();
        }
        $offer->update($request->all());
        return redirect()->back()->with(['edited' => 'chnged data']);
    }
    public function store(OfferRequest $request)

    {

        $file_extension = $request->photo-> getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $path = 'images/offers';
        $request->photo->move($path, $file_name);

        offer::create([
            'photo' => $file_name,
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);
        return redirect()->back()->with(['success' => 'saved data']);
    }
}
