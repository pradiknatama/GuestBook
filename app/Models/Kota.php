<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
class Kota extends Model
{
    protected $table = 'kotas';
	protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama', 
    ];
    public $timestamps = false;
    public function gbook(){
        return $this->hasMany(Guest::class,'city','kode');
    }
}
