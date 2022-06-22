<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class ApiController extends Controller
{
    public function province(){
        $client = new Client([
            'base_uri'=>'https://d.kapanlaginetwork.com/banner/test/province.json',
            'timeout'=>5,
        ]);
        $response =$client->request('GET','https://d.kapanlaginetwork.com/banner/test/province.json');
        $body=$response->getBody()->getContents();
        $body_array = json_decode($body,true);
        foreach($body_array as $item)
        {
            Provinsi::firstOrCreate(['kode'=>$item['kode'],
                'nama'=>$item['nama']]);
        }
        return redirect('/');
    }
    public function city(){
        $client = new Client([
            'base_uri'=>'https://d.kapanlaginetwork.com/banner/test/city.json',
            'timeout'=>5,
        ]);
        $response =$client->request('GET','https://d.kapanlaginetwork.com/banner/test/city.json');
        $body=$response->getBody()->getContents();
        $body_array = json_decode($body,true);
       
        foreach($body_array as $item)
        {
            Kota::firstOrCreate(['kode'=>$item['kode'],
                'nama'=>$item['nama']]);
        }
        return redirect('/');
    }
}
