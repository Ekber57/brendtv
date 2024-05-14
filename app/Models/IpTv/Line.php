<?php
namespace App\Models\IpTV;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "owner_id",
        "package_id",
        "bouquets",
        "username",
        "password",
        "package_name",
        "status"
    ];
}
