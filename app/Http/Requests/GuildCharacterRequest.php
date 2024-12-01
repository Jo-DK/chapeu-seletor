<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuildCharacterRequest extends FormRequest
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
        $rules = [
            'guild_id' => 'required|exists:guilds,id'
        ];
        if(request()->isMethod('post'))
            $rules['character_id'] = 'required|exists:characters,id|unique:guild_characters,character_id';

        return $rules;
    }
}
