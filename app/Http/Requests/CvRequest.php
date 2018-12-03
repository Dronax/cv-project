<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'cv_path' => 'required|max:10000|mimes:doc,docx,pdf',
            'email' => 'required|email',
            'message' => 'sometimes|string|nullable|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required on this form',
            'name.string' => 'Name must be string',
            'cv_path.required' => 'Cv document is required on this form',
            'cv_path.max:10000' => 'Cv document must have under 10000 kb',
            'cv_path.mimes:doc,docx,pdf' => 'Cv document must be .doc, .docx or pdf',
            'email.required' => 'Email is required on this form',
            'email.email' => 'Email field must be valid email address',
            'message.string' => 'Message must be string',
            'message.max:3000' => 'Message must have under 3000 chars'
        ];
    }
}
