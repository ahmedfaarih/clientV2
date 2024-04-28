<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseUpdate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clientCase()
    {
        return $this->belongsTo(ClientCase::class, 'client_case_id');
    }
}
