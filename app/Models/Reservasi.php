<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $tipe_id
 * @property string $uuid
 * @property string $nama_pemesan
 * @property string $nama_tamu
 * @property string $email_pemesan
 * @property string $nomor_hp_pemesan
 * @property string $tanggal_checkin
 * @property string $tanggal_checkout
 * @property integer $jumlah_kamar
 * @property string $created_at
 * @property string $updated_at
 * @property TipeKamar $tipeKamar
 */
class Reservasi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservasi';

    /**
     * @var array
     */
    protected $fillable = ['tipe_id', 'uuid', 'nama_pemesan', 'nama_tamu', 'email_pemesan', 'nomor_hp_pemesan', 'tanggal_checkin', 'tanggal_checkout', 'jumlah_kamar', 'created_at', 'updated_at','total_harga'];
    protected $dates = ['tanggal_checkin', 'tanggal_checkout'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipekamar()
    {
        return $this->belongsTo(TipeKamar::class, 'tipe_id');
    }
    public function KamarBooking()
    {
        return $this->hasMany(Kamar::class,'reservasi_id','uuid');
    }
}
