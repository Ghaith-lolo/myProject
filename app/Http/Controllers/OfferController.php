<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)

    {

        $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required'
        ];
        $messages = [
            'name.required' => 'name of offer is empty',
            'name.unique' => 'name of offer is used',
            'price.required' => 'price of offer is empty',
            'price.numeric' => 'price of offer not numeric',
            'details.required' => 'details of offer is empty',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect() ->back()->withInput($request->all())->withErrors($validator);
        }


        offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);
        return redirect()->back()->with( ['success'=> 'saved data']);
    }
}
