<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'address' => ['nullable', 'max:255'],
            'zip_code' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
