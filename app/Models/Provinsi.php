<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsis';
	protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama', 
    ];
    public function gbook(){
        return $this->hasMany(Guest::class,'province','kode');
    }
}
