<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string|null $jenis_surat
 * @property string|null $nik
 * @property string|null $alamat
 * @property string|null $nomor_hp
 * @property string|null $keperluan
 * @property string|null $file_ktp
 * @property string|null $file_kk
 * @property string|null $file_surat
 * @property string|null $status
 * @property string|null $catatan_admin
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder query()
 * @method static \Illuminate\Database\Eloquent\Builder where(string $column, mixed $operator = null, mixed $value = null)
 */
#[Fillable(['user_id', 'jenis_surat', 'nik', 'alamat', 'nomor_hp', 'keperluan', 'file_ktp', 'file_kk', 'file_surat', 'status', 'catatan_admin'])]
class PengajuanSurat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'jenis_surat',
        'nik',
        'alamat',
        'nomor_hp',
        'keperluan',
        'file_ktp',
        'file_kk',
        'file_surat',
        'status',
        'catatan_admin',
    ];

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return parent::__get($key);
    }


    /**
     * Get the user that owns this pengajuan surat.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get status badge color.
     */
    public function getStatusBadgeColor(): string
    {
        return match ($this->status) {
            'diproses' => 'warning',
            'ditolak' => 'danger',
            'selesai' => 'success',
            default => 'secondary',
        };
    }

    /**
     * Get jenis surat display name.
     */
    public function getJenisSuratLabel(): string
    {
        return match ($this->jenis_surat) {
            'domisili' => 'Surat Domisili',
            'usaha' => 'Surat Usaha',
            'pengantar' => 'Surat Pengantar',
            'tidak_mampu' => 'Surat Tidak Mampu',
            default => 'Unknown',
        };
    }
}
