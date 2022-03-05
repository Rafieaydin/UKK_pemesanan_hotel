<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Tamu extends Model
{
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resevarsis()
    {
        return $this->hasMany('App\Models\Resevarsi');
    }
}
