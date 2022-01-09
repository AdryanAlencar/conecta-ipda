<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile_image',
        'description',
        'address_id',
        'user_id',
        'category_id',
        'is_active',
        'is_verified'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function rating(){
        return $this->reviews()->avg('rating');
    }

}
