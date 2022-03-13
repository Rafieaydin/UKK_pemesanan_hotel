<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $admin_id
 * @property integer $tipe_id
 * @property string $kode_kamar
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property TipeKamar $tipeKamar
 * @property Admin $admin
 * @property ReservarsiKamar[] $reservarsiKamars
 */
class Kamar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kamar';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['admin_id', 'tipe_id', 'kode_kamar', 'status', 'created_at', 'updated_at','reservasi_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipeKamar()
    {
        return $this->belongsTo('App\Models\TipeKamar', 'tipe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class,'reservasi_id','uuid');
    }
}
