<?php

namespace App\Http\Requests;

use App\Models\IncomingLetter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreIncomingLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('user-request', IncomingLetter::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'date' => 'required',
            'number' => 'required',
            'sender' => 'required',
            'street' => 'required',
            'city' => 'required',
            'code' => 'required',
            'country' => 'required',
        ];
    }
}
