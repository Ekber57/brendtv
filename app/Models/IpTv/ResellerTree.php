<?php
namespace App\Models\IpTv;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerTree extends Model
{
    use HasFactory;
    protected $fillable = [
     'parent',
     'child'
    ];

}
