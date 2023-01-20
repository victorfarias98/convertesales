<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            "user_id" => $this->headers->get("user_id"),
        ]);
    }
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'value' => 'required|string|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'created' => 'required|date',
            'user_id' => 'required|exists:App\Models\User,id',
        ];
    }
}
