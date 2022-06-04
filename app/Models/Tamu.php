<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Password;


/**
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nama_tamu
 * @property string $email
 * @property string $no_hp
 * @property string $alamat
 * @property string $jk
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Resevarsi[] $resevarsis
 */
class Tamu extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tamu';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['username', 'password', 'nama_tamu', 'email', 'no_hp', 'alamat', 'jk', 'status', 'created_at', 'updated_at'];

    protected $guard = 'tamu';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resevarsis()
    {
      return $this->hasMany(Reservasi::class, 'tamu_id','id');
    }
}
