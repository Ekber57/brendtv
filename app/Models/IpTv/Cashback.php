<?php
namespace App\Models\IpTv;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashback extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount'
    ];
}
