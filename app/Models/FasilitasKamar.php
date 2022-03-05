<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $admin_id
 * @property string $nama_fasilitas
 * @property string $detail_fasilitas
 * @property string $gambar
 * @property string $jumlah_kamar
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
 * @property Resevarsi[] $resevarsis
 */
class FasilitasKamar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fasilitas_kamar';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['admin_id', 'nama_fasilitas', 'detail_fasilitas', 'gambar', 'jumlah_kamar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resevarsis()
    {
        return $this->hasMany('App\Models\Resevarsi');
    }
}
