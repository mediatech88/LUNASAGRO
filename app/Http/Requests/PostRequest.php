<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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

        $rule_user_unique = Rule::unique('users','email');
        $rule_id_unique = Rule::unique('tempat_pelayanan','id');
        if($this->method() !== 'POST'){
            $rule_user_unique->ignore($this->route()->parameter('id'));
            $rule_id_unique->ignore($this->route()->parameter('id'));
        }
        return [
            'id'=>['required',$rule_id_unique],
            'email'=>['required', $rule_user_unique,'max:50','regex:/(.+)@(.+)\.(.+)/i'],
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
            'name'=>'required'
        ];
    }
}
