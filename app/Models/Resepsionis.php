<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nama_resepsionis
 * @property string $email
 * @property string $no_hp
 * @property string $alamat
 * @property string $jk
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Resepsionis extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['username', 'password', 'nama_resepsionis', 'email', 'no_hp', 'alamat', 'jk', 'status', 'created_at', 'updated_at'];
}
