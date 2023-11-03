<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use HasFactory, SoftDeletes;

    public const COMISSION_PERCENT = 8.5;

    protected $fillable = [
        'name',
        'email',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getComissionAttribute()
    {
        return self::COMISSION_PERCENT;
    }
}
