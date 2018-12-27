<?php

namespace App\Http\Requests\Pets;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            'process_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'months' => 'required',
            'sterilized' => 'required',
            'vaccinated' => 'required',
            'sex' => 'required',
            'description' => 'required',
            'city' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'images' => 'required',
        ];
    }
}
