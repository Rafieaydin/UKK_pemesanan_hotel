<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property FasilitasHotel[] $fasilitasHotels
 * @property FasilitasKamar[] $fasilitasKamars
 * @property Kamar[] $kamars
 */
class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'created_at', 'updated_at'];

    protected $guard = 'admin';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitasHotels()
    {
        return $this->hasMany('App\Models\FasilitasHotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitasKamars()
    {
        return $this->hasMany('App\Models\FasilitasKamar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kamars()
    {
        return $this->hasMany('App\Models\Kamar');
    }
}
