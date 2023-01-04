<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimentacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movimentacoes_financeiras';

    protected $fillable = [
        'user_id',
        'conta_id',
        'amigo_id',
        'data',
        'tipo',
        'forma_pagamento',
        'descricao',
        'parcelado',
        'valor_total',
        'recorrencia',
        'observacao',
    ];

    protected $dates = [
        'data',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function amigo(): BelongsTo
    {
        return $this->belongsTo(Amigo::class);
    }

    public function conta(): BelongsTo
    {
        return $this->belongsTo(Conta::class);
    }

    public function parcelas_recorrencias(): HasMany
    {
        return $this->hasMany(ParcelaRecorrencia::class);
    }
}