<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSaleRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            "user_id" => Auth::id(),
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->isJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'value' => 'required|string|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'created' => 'required|date',
            'synced' => 'boolean',
            'user_id' => 'required|exists:App\Models\User,id',

        ];
    }
}
