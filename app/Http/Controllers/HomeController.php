<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class HomeController extends Controller
{
    public function index() {
        
        $client = new Client([
            'host' => 'api.infacomediateknologi.net',
            'user' => 'admin',
            'pass' => '7659872'
        ]);


        $cpu = $client->query('/system/resource/print')->read();

        foreach($cpu as $value){
            $data = $value['uptime'];
            $free_memory = $value['free-memory'];
            $total_memory = $value['total-memory'];
        }


        // return response()->json($cpu);

        
        // $user = $client->query('/ip/hotspot/user/print')->read();
        // $aktif = $client->query('/ip/hotspot/active/print')->read();
        // $resource = $client->query('/system/resource/print')->read();
        // $totalUser = count($user);
        // $totalAktif = count($aktif);
        // dd($resource);
        return view('home', compact(['data','free_memory','total_memory']));
    }

        // CPU Load
    public function load() {
        
        $client = new Client([
            'host' => 'api.infacomediateknologi.net',
            'user' => 'admin',
            'pass' => '7659872'
        ]);


        $data = $client->query('/system/resource/print')->read();

        foreach($data as $value){
            $server = $value['cpu-load'];
        }

        return response()->json($server);
    }

    // Server Resourse
    public function uptime() {
        
        $client = new Client([
            'host' => 'api.infacomediateknologi.net',
            'user' => 'admin',
            'pass' => '7659872'
        ]);


        $data = $client->query('/system/resource/print')->read();

        foreach($data as $value){
            $server = $value['uptime'];
        }

        // $cpu_load = $data['cpu-load'];
        // $free_memory = $data['free-memory'];
        // $total_memory = $data['total-memory'];

        return response()->json($server);
    }

    public function free_memory() {
        
        $client = new Client([
            'host' => 'api.infacomediateknologi.net',
            'user' => 'admin',
            'pass' => '7659872'
        ]);


        $data = $client->query('/system/resource/print')->read();

        foreach($data as $value){
            $server = $value['free-memory'];
        }

        $memori = number_format($server/1000000);

        // $cpu_load = $data['cpu-load'];
        // $free_memory = $data['free-memory'];
        // $total_memory = $data['total-memory'];

        return response()->json($memori);
    }
}
