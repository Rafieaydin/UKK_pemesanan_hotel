<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $reservasi_id
 * @property string $tipe
 * @property string $kode_kamar
 * @property integer $harga
 * @property string $checkin
 * @property string $checkout
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property ReservasiLog $reservasiLog
 */
class ReservasiKamarLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservasikamar_log';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['reservasi_id', 'tipe', 'kode_kamar', 'harga', 'checkin', 'checkout', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservasiLog()
    {
        return $this->belongsTo('App\Models\ReservasiLog', 'reservasi_id', 'uuid');
    }

}
