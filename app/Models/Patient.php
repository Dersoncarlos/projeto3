<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'full_name',
        'mother_full_name',
        'birthday',
        'cpf',
        'cns'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
