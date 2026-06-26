<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'nomor_pesanan',
        'nama_pelanggan',
        'meja_id',
        'user_id',
        'total_harga',
        'status', // menunggu, proses, selesai, batal
        'status_pembayaran', // belum_bayar, lunas, refund
        'metode_pembayaran', // tunai, debit, kredit, qris
        'jumlah_bayar',
        'kembalian',
        'catatan',
        'tanggal_pesanan',
        'selesai_pada',
        'bayar_pada',
    ];

    protected $casts = [
        'tanggal_pesanan' => 'datetime',
        'selesai_pada' => 'datetime',
        'bayar_pada' => 'datetime',
        'total_harga' => 'decimal:2',
        'jumlah_bayar' => 'decimal:2',
        'kembalian' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    public function items()
    {
        return $this->hasMany(ItemPesanan::class);
    }
}