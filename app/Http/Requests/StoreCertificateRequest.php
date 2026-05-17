<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Дизайн
            'design_id' => ['required_without:custom_design', 'prohibits:custom_design', 'exists:designs,id', 'integer'],
            'custom_design' => ['required_without:design_id', 'prohibits:design_id', 'image', 'max:5120'],

            // Номинал
            'nominal_id' => ['required_without:custom_nominal', 'prohibits:custom_nominal', 'exists:nominals,id', 'integer'],
            'custom_nominal' => ['required_without:nominal_id', 'prohibits:nominal_id', 'numeric', 'min:0'],
            
            // Контакты
            'sender_name' => ['required', 'string', 'max:255'],
            'sender_email' => ['required', 'email', 'max:255'],
            'sender_phone' => ['nullable', 'string', 'max:255'],
            'receiver_email' => ['required', 'email', 'max:255'],

            // Сообщение
            'message' => ['nullable', 'string', 'max:1000'],

            // Дата и время
            'send_now' => ['required', 'boolean'],
            'send_at' => ['required_if:send_now,false', 'date', 'after:now'],
        ];
    }
}
