<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $admin_id
 * @property string $nomor_kamar
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
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
    protected $fillable = ['admin_id', 'nomor_kamar', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
