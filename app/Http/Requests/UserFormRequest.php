<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        // echo $this->id;
        // exit();
        switch ($this->method()) {
            case 'POST':
                return [
                    'username' => 'required|min:3|unique:users',
                    'password' => 'required|min:3',
                    'email' => 'required|unique:users',
                    'name' => 'required|min:3'
                ];
                break;
            case 'PATCH':
                if(!empty($this->password)){
                    return [
                        'password' => 'required|min:3',
                        'name' => 'required|min:3'
                    ];
                }
                else{
                    return [
                        'name' => 'required|min:3'
                    ];
                }
                break;
            default:
                # code...
                break;
        }
    }
}
