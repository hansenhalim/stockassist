<?php

namespace App\Http\Requests;

use App\Enums\MeasurementUnit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIngredientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'barcode' => ['nullable', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'unit_of_measure' => ['required', Rule::enum(MeasurementUnit::class)],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
