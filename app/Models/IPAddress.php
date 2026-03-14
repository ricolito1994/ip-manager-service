<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IPAddress extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'ip_address',
        'ip_version',
        'label',
        'created_by'
    ];

    public function scopeFilter(Builder $query, Request $filters): Builder
    {
        return $query->when($filters->ip_address, function (Builder $q, mixed $ip_address) {
                $q->where("ip_address" , "like" , "%{$ip_address}%");
            })->when($filters->ip_version, function (Builder $q, mixed $ip_version) {
                $q->where("ip_version", $ip_version);
            });
    }
}
