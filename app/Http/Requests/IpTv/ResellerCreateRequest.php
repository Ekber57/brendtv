<?php
namespace App\Http\Requests\IpTv;



use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResellerCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mail' => 'required|unique:users,email|string|email|min:5|max:50',
            'name' => 'required|string',
            'phone' => 'required|unique:users|max:10|min:10',
            'username' => 'required|string|', 
            'password' => 'required|min:5|max:50',
            'balance' => ['required','numeric',function($attr,$value,$fail){
                if(Auth::user()->balance < $value) {
                    $fail("Balans yetersizdir");
                }
            }]
        ];
    }
}