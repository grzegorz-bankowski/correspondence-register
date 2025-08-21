<?php

namespace App\Http\Requests;

use App\Models\OutgoingLetter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreOutgoingLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (!Gate::allows('user-request', OutgoingLetter::class)) {
            abort(404);
        } else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'number' => 'required',
            'recipient' => 'required',
            'street' => 'required',
            'city' => 'required',
            'code' => 'required',
            'country' => 'required',
        ];
    }
}
