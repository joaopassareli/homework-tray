<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'vendor_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('name');
        });
    }
}
