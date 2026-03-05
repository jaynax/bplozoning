<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_type',
        'owner_name',
        'address',
        'border_style',
        'day',
        'month',
        'year',
        'certificate_number',
        'file_path',
        'additional_data'
    ];

    protected $casts = [
        'additional_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateCertificateNumber()
    {
        $year = date('Y');
        $lastCertificate = self::where('certificate_number', 'like', "CERT-{$year}-%")
            ->orderBy('certificate_number', 'desc')
            ->first();

        if ($lastCertificate) {
            $lastNumber = intval(str_replace("CERT-{$year}-", '', $lastCertificate->certificate_number));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return "CERT-{$year}-" . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
    }
}
