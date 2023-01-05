<?php

namespace App\Http\Requests\Admin\Subscription;

use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddBookingRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->check()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from_language_id' => 'required|numeric',
            'immediate' => 'required|in:yes,no',
            'due_date' => 'required_if:immediate,no|date|date_format:d-m-Y',
            'due_time' => 'required_if:immediate,no|date|date_format:H:i',
            'customer_phone_type' => 'required_if:immediate,no|numeric',
            'duration' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'from_language_id.required' => 'Du måste fylla in alla fält',
            'immediate.required' => 'Du måste fylla in alla fält',
            'due_date.required_if' => 'Du måste fylla in alla fält',
            'due_time.required_if' => 'Du måste fylla in alla fält',
            'customer_phone_type.required_if' => 'Du måste fylla in alla fält',
            'duration.required' => 'Du måste fylla in alla fält',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failureResponse($validator->errors()->first(), null));
    }
}
