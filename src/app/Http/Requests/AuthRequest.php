<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function authenticate()
    {
        $creds = $this->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
            $user = Auth::user();
            $token = $user->createToken('user-token')->plainTextToken;

            return ['token' => $token];
        }

        return response()->json([
            'message' => 'Invalid credentials.'
        ], 401);
    }
}
