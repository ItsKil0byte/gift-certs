<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Certificate;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CertificateService
{
    private function store(UploadedFile $file): string
    {
        return Storage::disk('public')->putFile('designs', $file);
    }

    public function create(array $data): Certificate
    {
        return DB::transaction(function () use ($data) {
            if (isset($data['custom_design']) && $data['custom_design'] instanceof UploadedFile) {
                $file = $data['custom_design'];
                $path = $this->store($file);
            }

            // Создаем сертификат
            $certificate = Certificate::create([
                'promo_code' => random_int(100000, 999999),
                'hash' => str()->uuid(),
                'design_id' => $data['design_id'] ?? null,
                'custom_image_path' => $path ?? null,
                'nominal_id' => $data['nominal_id'] ?? null,
                'custom_nominal_value' => $data['custom_nominal'] ?? null,
                'sender_name' => $data['sender_name'],
                'sender_email' => $data['sender_email'],
                'sender_phone' => $data['sender_phone'],
                'receiver_email' => $data['receiver_email'],
                'message' => $data['message'] ?? null
            ]);

            if (isset($data['send_now']) && !$data['send_now']) {
                // Создаём задачу на отправку сертификата
                $certificate->sendSchedule()->create([
                    'send_at' => $data['send_at']
                ]);
            }
            
            return $certificate;
        });
    }
}
