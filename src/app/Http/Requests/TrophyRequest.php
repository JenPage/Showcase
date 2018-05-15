<?php

namespace Showcase\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrophyRequest extends FormRequest
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
        $name = $this->method() === 'PUT'
            ? 'nullable|string|max:255'
            : 'nullable|string|unique:'.config('showcase.table_prefix', 'showcase_').'trophies,name|max:255';

        return [
            'name' => $name,
            'component_view' => 'string|trophy_exists',
            'link' => 'nullable|url',
            'image_url' => 'nullable|url',
            'description' => 'nullable|string|max:'.config('showcase.description_length', 55)
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            collect($validator->errors()->all())->each(function ($message) {
                flash()->error($message);
            });
        });
    }

    /**
     * Add custom error messages.
     */
    public function messages()
    {
        return [
            'trophy_exists' => 'The trophy component file ":value.php" does not exist.'
        ];
    }
}
