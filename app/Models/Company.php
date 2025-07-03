<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'address',
        'city',
        'region',
        'country',
        'year_established',
        'website',
        'brochure_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
