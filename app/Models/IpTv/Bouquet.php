<?php
namespace App\Models\IpTv;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    use HasFactory;
    protected $fillable = [
        'bouquet_id',
        'name',
        'channels',
        'movies',
        'radios',
        'series',
        'order',
    ];
}
