<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $admin_id
 * @property string $nama_tipe
 * @property integer $jumlah_kamar
 * @property string $gambar
 * @property string $created_at
 * @property string $updated_at
 * @property FasilitasKamar[] $fasilitasKamars
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
    protected $fillable = ['admin_id', 'nama_tipe', 'jumlah_kamar', 'gambar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitasKamars()
    {
        return $this->hasMany('App\Models\FasilitasKamar', 'fasilitas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function fasilitas(){
        return $this->hasMany(FasilitasKamar::class, 'tipe_id','id');
    }
}
