<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
           'name'=>'required',
           'email'=>'required | email',
           'email_verified_at'=> 'required',
           'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Aree Bhaiyaa naam daalo isme..',
            'email.required' => 'Email pn nakhvu padse',
            'email.email' => 'doba email na format ma nakhne',
            'email_verified_at.required' => 'tarik pe tarik , tarik pe tarik',
            'password.required' => 'password naakho nai kai ame koine :) '
        ];
    }

    

    // public function passedValidation(){
    //     $this->merge([
    //         'name'=>strtoupper($this->name)
    //     ]);
    // }
}
