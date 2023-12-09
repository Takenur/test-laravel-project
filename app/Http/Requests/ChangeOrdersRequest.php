<?php

namespace App\Http\Requests;
/**
 * @property array $data
 */
class ChangeOrdersRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'data' => 'required|array',
            'data.*' => 'required|exists:App\Models\ProjectTask,id',
        ];
    }
}
