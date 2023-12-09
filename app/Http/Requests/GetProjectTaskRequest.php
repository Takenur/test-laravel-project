<?php

namespace App\Http\Requests;
use Carbon\Carbon;

/**
 * @property integer|null $project_id
 */
class GetProjectTaskRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'project_id' => 'sometimes|exists:App\Models\Project,id'
        ];
    }
}
