<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
           'question' =>'required',
           'choices.*' =>'required',
           'is_answer' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'question.required' => '問題を入力してください。',
            'choices.required' => '選択肢を入力してください。',
            'is_answer.required' => '正解の選択肢を選択してください。',
        ];
    }
    }

