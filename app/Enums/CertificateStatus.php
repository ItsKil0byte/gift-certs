<?php

namespace App\Enums;

enum CertificateStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case SCHEDULED = 'scheduled';
    case SENT = 'sent';
}
