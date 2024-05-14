<?php
namespace App\Models\IpTv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable= [
        'package_name',
        'original_package_id',
        'user_id',
        'original_official_credits',
        'official_credits',
        'bouquets'
    ];
}
