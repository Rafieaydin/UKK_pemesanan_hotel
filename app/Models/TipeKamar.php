<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $admin_id
 * @property string $nama_tipe
 * @property string $keterangan
 * @property integer $total_jumlah_kamar_tersedia
 * @property integer $total_jumlah_kamar_booking
 * @property string $gambar
 * @property string $harga
 * @property string $created_at
 * @property string $updated_at
 * @property FasilitasKamar[] $fasilitasKamars
 * @property Kamar[] $kamars
 * @property Reservasi[] $reservasis
 * @property Admin $admin
 */
class TipeKamar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipe_kamar';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['admin_id', 'nama_tipe', 'keterangan', 'total_jumlah_kamar_tersedia', 'total_jumlah_kamar_booking', 'gambar', 'harga', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitas(){
        return $this->hasMany(FasilitasKamar::class, 'tipe_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kamars()
    {
        return $this->hasMany('App\Models\Kamar', 'tipe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservasis()
    {
        return $this->hasMany('App\Models\Reservasi', 'tipe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
