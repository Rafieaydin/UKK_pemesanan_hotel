<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama_pemesan
 * @property string $nama_tamu
 * @property string $email_pemesan
 * @property string $nomor_hp_pemesan
 * @property string $tanggal_checkin
 * @property string $tanggal_checkout
 * @property integer $jumlah_kamar
 * @property string $total_harga
 * @property string $created_at
 * @property string $updated_at
 */
class ReservasiLog extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reservasi_log';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nama_pemesan', 'nama_tamu', 'email_pemesan', 'nomor_hp_pemesan', 'tanggal_checkin', 'tanggal_checkout', 'jumlah_kamar', 'total_harga', 'created_at', 'updated_at'];
    protected $dates = ['tanggal_checkin', 'tanggal_checkout'];
}
