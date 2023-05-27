<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PerformanceRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'zip11' => 'nullable|digits:7',
            'addr11' => 'required',
            'venue' => 'required',
            'web_site_url' => 'nullable|url',
            'dates' => 'required',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください。',
            'description.required' => '説明を入力してください。',
            'zip11.digits' => '郵便番号は7桁の数字で入力してください。',
            'addr11.required' => '住所を入力してください。',
            'venue.required' => '会場を入力してください。',
            'web_site_url.url' => '公式サイトURLは正しいURL形式で入力してください。',
            'dates.required' => '日付を入力してください。',
        ];
    }
}
