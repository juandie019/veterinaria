<?php

namespace App;

use App\Mail\WelcomeEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens ,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_empleado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empleado()
    {
       return $this->hasOne(Empleado::class, 'id_empleado', 'id_empleado');
    }

    public function file(){
        return $this->belongsTo(File::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
          Mail::to($user->email)->send(new WelcomeEmail());

          DB::table('usuario_disponibles')->where('id_empleado', 'LIKE', $user->id_empleado)->delete();
        });

    }
}
