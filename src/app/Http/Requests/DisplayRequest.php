<?php

namespace Showcase\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisplayRequest extends FormRequest
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
            ? 'required|string|max:255'
            : 'required|string|unique:'.config('showcase.table_prefix', 'showcase_').'displays,name|max:255';

        return [
            'name' => $name,
            'component_view' => 'required|string|display_exists',
            'default_trophy_component_view' => 'required|string|trophy_exists',
            'force_trophy_default' => 'nullable|boolean'
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
            'display_exists' => 'The display component file ":value.php" does not exist.',
            'trophy_exists' => 'The trophy component file ":value.php" does not exist.'
        ];
    }
}
