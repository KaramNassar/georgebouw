<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreQuoteRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'scope' => ['required', 'array', 'min:1'],
            'scope.*' => ['string'],
            'property_type' => ['required', 'string', Rule::in(['apartment', 'house', 'villa', 'commercial'])],
            'size_m2' => ['required', 'integer', 'min:1', 'max:1000'],
            'urgency' => ['required', 'string', Rule::in(['flexible', 'soon', 'urgent'])],
            'material' => ['required', 'string', Rule::in(['standard', 'premium', 'luxury'])],
            'budget_bracket' => ['required', 'string', Rule::in(['a', 'b', 'c'])],
            'estimate_low' => ['nullable', 'integer', 'min:0'],
            'estimate_high' => ['nullable', 'integer', 'min:0'],
            'locale' => ['nullable', 'string', 'max:5'],
            'photos' => ['nullable', 'array', 'max:8'],
            'photos.*' => ['image', 'max:5120'],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $validator->errors(),
        ], 422));
    }
}
