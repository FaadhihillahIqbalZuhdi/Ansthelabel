<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailProdukModel extends Model
{
    use HasFactory;

    protected $table = 't_detail_produk';
    protected $primaryKey = 'detail_produk_id';
    
    protected $fillable = [
        'produk_id',
        'warna_produk_id',
        'bahan_produk_id',
        'ukuran_produk_id',
        'foto_produk_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function produk() :BelongsTo
    {
        return $this->belongsTo(ProdukModel::class, 'produk_id', 'produk_id');
    }

    public function warna() :BelongsTo
    {
        return $this->belongsTo(WarnaProdukModel::class, 'warna_produk_id', 'warna_produk_id');
    }

    public function bahan() :BelongsTo
    {
        return $this->belongsTo(BahanProdukModel::class, 'bahan_produk_id', 'bahan_produk_id');
    }

    public function ukuran() :BelongsTo
    {
        return $this->belongsTo(UkuranProdukModel::class, 'ukuran_produk_id', 'ukuran_produk_id');
    }

    public function foto() :BelongsTo
    {
        return $this->belongsTo(FotoProdukModel::class, 'foto_produk_id', 'foto_produk_id');
    }
}
