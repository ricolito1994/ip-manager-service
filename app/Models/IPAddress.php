<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IPAddress extends Model
{
    use SoftDeletes;

    protected $table = "ip_address";

    protected $primaryKey = 'id';

    //
    protected $fillable = [
        'ip_address',
        'ip_version',
        'label',
        'created_by'
    ];

    public function scopeFilter(Builder $query, Request $filters): Builder
    {
        return $query->when($filters->ip_address, function (Builder $q) use ($filters) {
                $q->where("ip_address" , "like" , "%{$filters->ip_address}%");
            })->when($filters->ip_version, function (Builder $q) use ($filters) {
                $q->where("ip_version", $filters->ip_version);
            });
    }
}
