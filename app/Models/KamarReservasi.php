<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $reservasi_id
 * @property integer $kamar_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Kamar $kamar
 * @property Reservasi $reservasi
 */
class KamarReservasi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservasi_kamar';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['reservasi_id', 'kamar_id','checkin','checkout', 'status', 'created_at', 'updated_at'];
    protected $dates =['checkin','checkout'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class ,'kamar_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservasi()
    {
        return $this->belongsTo('App\Models\Reservasi', null, 'uuid');
    }
}
