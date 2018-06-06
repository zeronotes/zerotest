<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
                    'title' => 'required|min:5|unique:pages',
                    'content' => 'required|min:10'
                ];
                break;
            case 'PATCH':
                return [
                    'title' => 'required|min:10|unique:pages,title,'.$this->id,
                    'content' => 'required|min:10'
                ];
                break;
            default:
                # code...
                break;
        }
    }
}
