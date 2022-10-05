<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class UserController extends Controller
{


    public function index() {
        $client = new Client([
            'host' => '17.17.11.1',
            'user' => 'admin',
            'pass' => '7659872'
        ]);
        
        $data = $client->query('/ip/firewall/address-list/print')->read();
        // $data = $client->query('/ip/arp/print')->read();
        // $user = collect($data)->except(['0'])->toArray(); 
        // $aktif = $client->query('/ip/hotspot/active/print')->read();

        return response()->json($data);

        // return view('user', compact('user', 'aktif'));
        
    }

    public function add() {
        $client = new Client([
            'host' => '17.17.11.1',
            'user' => 'admin',
            'pass' => '7659872'
        ]);
        $profile = $client->query('/ip/hotspot/user/profile/print')->read();
        // dd($profle);
        return view('addUser', compact('profile'));
    }

    public function store(Request $request) {
        $client = new Client([
            'host' => '17.17.11.1',
            'user' => 'admin',
            'pass' => '7659872'
                ]);

        $client->query([
        '/ip/hotspot/user/add',  
        '=name='.$request->username,
        '=password='.$request->$password
        ])->read();
       
        return redirect('/user');
    }

    public function quick() {
        $client = new Client([
            'host' => '17.17.11.1',
            'user' => 'admin',
            'pass' => '7659872'
        ]);

        for($i = 0; $i <= 200; $i++) {
            $password = Str::random(5);
            $username = Str::random(2) . "-lugaru";
            $client->query(['/ip/hotspot/user/add',  '=name='.$username, '=password='.$password])->read();
        }

        return redirect('/user');
    }

    public function destroy($id){
        $client = new Client([
            'host' => '17.17.11.1',
            'user' => 'admin',
            'pass' => '7659872'
        ]);
        $client->query(['/ip/hotspot/user/remove', '=.id='.$id])->read();

        return redirect('/user');
    }
}


