<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kota;
use App\Models\Provinsi;
class Guest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'guests';
	protected $primaryKey = 'id';
    protected $fillable = [
        'f_name',
        'l_name', 
        'organization',
        'address',
        'province',
        'city',
        'phone',
    ];
    protected $dates = ['deleted_at'];
    public function kota(){
        return $this->belongsTo(Kota::class, 'city','kode');
    }
    public function prov(){
        return $this->belongsTo(Provinsi::class, 'province','kode');
    }
}
