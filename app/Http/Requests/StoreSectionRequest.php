<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
        //'starts_at' => 'date_format:H:i',
        //'ends_at' => 'date_format:H:i|after:starts_at',
        'upper_gwa' => 'gt:lower_gwa',
        'lower_gwa' => 'lt:upper_gwa'

        ];
    }
}
