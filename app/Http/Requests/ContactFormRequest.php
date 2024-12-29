<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000|no_spam',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'message.no_spam' => 'Your message contains spam and cannot be sent.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        // Custom spam detection rule
        $validator->addExtension('no_spam', function ($attribute, $value, $parameters, $validator) {
            $spamKeywords = ['viagra', 'free money', 'click here','fuck','fuck you','sex']; // Add more keywords as needed
            foreach ($spamKeywords as $keyword) {
                if (stripos($value, $keyword) !== false) {
                    return false;
                }
            }
            return true;
        });
    }
}
