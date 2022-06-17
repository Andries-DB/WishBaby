<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WishListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [

            'name' => 'required|max:255',
            'babyname' => 'required|max:255',
            'address' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'city' => 'required|max:255',
            'county' => 'required|max:255',
            'user_id' => [
                'required', auth()->id()
            ],
        ];
    }


}
