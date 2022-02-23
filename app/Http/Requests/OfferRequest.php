<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name of offer is empty',
            'name.unique' => 'name of offer is used',
            'price.required' => 'price of offer is empty',
            'price.numeric' => 'price of offer not numeric',
            'details.required' => 'details of offer is empty',
        ];
    }
}
