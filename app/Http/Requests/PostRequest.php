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

        // $rule_user_unique = Rule::unique('users','email');
        // $rule_id_unique = Rule::unique('tempat_pelayanan','id');
        // if($this->method() !== 'POST'){
        //     $rule_user_unique->ignore($this->route()->parameter('id'));
        //     $rule_id_unique->ignore($this->route()->parameter('id'));
        // }

        $rules =[
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
            'name'=>'required'

        ];

        if($this->getMethod()=="PATCH"){
            $rules +=[
                'email'=>[
                    'required',
                    'email',
                    'max:200',
                    Rule::unique('users')->ignore($user->id)
                ],
                'id'=>[
                    'required',
                    Rule::unique('tempat_pelayanan')->ignore($this->id)
                ],
            ];
        }
        if($this->getMethod()=="POST"){
            $rules +=[
                'email'=>[
                    'required',
                    'email',
                    'max:200',
                    'unique:users,email',
                    'regex:/(.+)@(.+)\.(.+)/i',
                ],
                'id'=>[
                    'required',
                    'unique:tempat_pelayanan,id'],
            ];
        }
        return $rules;
    }
}
