<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagFormRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|min:3',
                    'slug' => 'required|min:3|unique:tags'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'required|min:3',
                    'slug' => 'required|min:3|unique:tags,slug,'.$this->id,
                ];
                break;
            default:
                # code...
                break;
        }
    }
}
