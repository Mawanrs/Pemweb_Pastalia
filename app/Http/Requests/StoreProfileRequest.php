<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('profile_create');
    }

    public function rules()
    {
        return [
            // 'name' => [
            //     'string',
            //     'required',
            // ],
            // 'fullname' => [
            //     'string',
            //     'nullable',
            // ],
            // 'address' => [
            //     'string',
            //     'required',
            // ],
            // 'phone' => [
            //     'string',
            //     'required',
            // ],
            // 'email' => [
            //     'required',
            // ],
            // 'faximile' => [
            //     'string',
            //     'required',
            // ],
        ];
    }
}
