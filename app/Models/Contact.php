<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'link',
        'store_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
