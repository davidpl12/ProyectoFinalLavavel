<?php

namespace App\Models;

 use App\Models\Cart;
use Dompdf\Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Summary of User
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apell',
        'address',
        'email',
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
     * Summary of cart
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|bool
     */
    public function cart(){
        $res = false;
        try {
            $res = $this->hasMany(Cart::class);
        } catch (Exception $th) {
        }
        return $res;
    }

    /**
     * Summary of getCartAttribute
     * @return Cart|\Illuminate\Database\Concerns\BuildsQueries|\Illuminate\Database\Eloquent\Model|object
     */
    public function getCartAttribute(){
        $cart = $this->cart()->where('status', 'Active')->first();
        if($cart)
            return $cart;

            $cart = new Cart();
            $cart->status = 'Active';
            $cart->user_id = $this->id;
            $cart->save();

            return $cart;


    }
}
