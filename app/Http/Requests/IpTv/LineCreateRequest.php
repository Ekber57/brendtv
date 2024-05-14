<?php

namespace App\Http\Requests\IpTv;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Http\FormRequest;

class LineCreateRequest extends FormRequest
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
            'enc_price' => ['required', 'string', function ($attr, $value, $fail) {
                try {
                    //code..
                    $decodedPrice =  Crypt::decryptString($value);
                    $value = $decodedPrice;
                    if (Auth::user()->balance < $decodedPrice) {
                        $fail("Balans yetersizdir");
                    }
                    else {
                        return $decodedPrice;
                    }
                } catch (\Throwable $th) {
                    $fail("Paket secilmeyib");
                }
            }],
            'package_name' => 'string|required',
            'phone' => 'required|string|unique:users,phone|max:10|min:10',
            'password' => 'required',
            'username' => 'required|unique:lines,username|string|min:5|max:50',
            'package_id' => 'required|numeric|min:1|max:10000',
            'bouquets_selected.*' => 'required'
        ];
    }
}
