<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'city_id',
        'is_businessperson',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The addresses that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Address>
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * The reviews that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Review>
     */
    public function reviews()
    {
        if($this->is_businessperson) {

            $reviews = DB::table('reviews')
            ->join('stores', 'stores.user_id', '=', $this->id)
            ->where('reviews.store_ir', '=', "stores.id")
            ->select('reviews.*')->avg('rating');

            return $reviews;
        }

        return $this->hasMany(Review::class);
    }

    /**
     * The stores that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Store>
     */

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
