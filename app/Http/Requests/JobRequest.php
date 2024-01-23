<?php

namespace App\Http\Requests;

use App\Enums\EducationLevel;
use App\Enums\JobSchedule;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'position'=>'required|string|min:3|max:200',
            'linkedIn'=>'required|regex:/^https?:\/\/((www|\w\w)\.)?linkedin\.com\/((in\/[^\/]+\/?)|(pub\/[^\/]+\/(([\w|\d-&#?=])+\/?){1,}))))$/',
            'resume'=>'required|file|mimes:doc,docx,pdf,txt|max:20480',
            'job_type'=>['required', new EnumValue(JobSchedule::class)],
            'fieldOfStudy'=>'nullable|string',
            'educationLevel'=>['required', new EnumValue(EducationLevel::class)],
            'is_visible'=>'nullable|boolean',

        ];
    }
}
