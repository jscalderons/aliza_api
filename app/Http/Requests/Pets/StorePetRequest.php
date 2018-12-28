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
            'age' => 'required',
            'sterilized' => 'required',
            'vaccinated' => 'required',
            'gender' => 'required',
            'description' => 'required',
            'location' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'images' => 'required',
        ];
    }
}
