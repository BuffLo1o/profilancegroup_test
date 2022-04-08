<?php

namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;

class GenerateLinkRequest extends FormRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'link' => [
                'string',
                'required',
            ]
        ];
    }

}
