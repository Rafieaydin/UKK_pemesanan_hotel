<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * @property integer $id
 * @property integer $fasilitas_kamar_id
 * @property integer $tamu_id
 * @property string $nama_pemesan
 * @property string $email_pemesan
 * @property string $nomor_hp_pemesan
 * @property string $tanggal_checkin
 * @property string $tanggal_checkout
 * @property integer $jumlah_kamar
 * @property string $created_at
 * @property string $updated_at
 * @property FasilitasKamar $fasilitasKamar
 * @property Tamu $tamu
 */
class Resevarsi extends Model
{
    // use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resevarsi';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['fasilitas_kamar_id', 'tamu_id', 'nama_pemesan', 'email_pemesan', 'nomor_hp_pemesan', 'tanggal_checkin', 'tanggal_checkout', 'jumlah_kamar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fasilitasKamar()
    {
        return $this->belongsTo('App\Models\FasilitasKamar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tamu()
    {
        return $this->belongsTo('App\Models\Tamu');
    }
}
