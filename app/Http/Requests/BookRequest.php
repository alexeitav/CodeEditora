<?php

namespace CodePub\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookRequest extends FormRequest
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
        //$book = $this->route('book');

        return [
            'title' => 'required|min:3|max:255',
            'subtitle' => 'required|min:3|max:255',
            'price' => 'required|numeric'
        ];
    }


}
