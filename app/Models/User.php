<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','user_id','company_name','country','trial_until'
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
    public function childuser()
    {
        return $this->hasMany(User::class,"user_id","id");
    }
    public function subscription()
    {
        return $this->hasMany(Subscription::class,"user_id","id")->latest();
    }

    public function getFreeTrialDaysLeftAttribute()
    {
        // Future field that will be implemented after payments
        if ($this->plan_until) { 
                return 0;
        }

    return now()->diffInDays($this->trial_until, false);
    }
    public function getDaysLeftAttribute()
    {
       return now()->diffInDays($this->plan_until, false);
    }
    protected $dates = [
    'trial_until',
    'plan_until',
];
}