<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Typically, you would put authorization logic here,
        // such as checking if the user is allowed to reset the password.
        // For example:
        // return auth()->user()->isAdmin();
        // In this case, anyone can access the reset password functionality,
        // but you may want to customize this according to your application's requirements.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Define the validation rules for your reset password form here.
        // For example:
        return [
            
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            // Add more rules as needed...
        ];
    }
}
