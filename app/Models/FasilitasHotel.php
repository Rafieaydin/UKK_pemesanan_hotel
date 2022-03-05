<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $admin_id
 * @property string $nama_fasilitas
 * @property string $gambar
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
 */
class FasilitasHotel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fasilitas_hotel';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['admin_id', 'nama_fasilitas', 'gambar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
