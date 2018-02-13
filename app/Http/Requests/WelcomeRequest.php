<?php

namespace Tionvel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WelcomeRequest extends FormRequest
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
            'fecha1'=>'date',
            'fecha1n'=>'integer|min:0',
            'fecha2'=>'date|after:fecha1',
            'fecha2n'=>'integer|min:0',
            'fecha3'=>'date|after:fecha2',
            'fecha3n'=>'integer|min:0',
            'fecha4'=>'date|after:fecha3',
            'fecha4n'=>'integer|min:0'
        ];
    }
}
