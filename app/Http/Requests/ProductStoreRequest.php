<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'store_id' => 'required',
            'brand_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required|string|min:2|max:191',
            'qty' => 'required|number|min:0|max:10000',
            'price' => 'required|number|min:0|max:10000000',
            'ofert' => 'required|number|min:0|max:100',
            'description' => 'required|string|min:0|max:64000'
        ];
    }
}
