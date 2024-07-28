<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Computer;
use LVR\IP\PublicAddress;

class PC_IP_Controller extends Controller
{
    public function index(){

        $some_data = Computer::all();
        return $some_data;

        // return response()->json([
        //     "error" => 'some text'
        // ]);
    }

    public function update(Request $request){

        $request->validate([
            'pc_no' => 'required|min:6|max:8',
            'pc_ip' => 'required|new PublicAddress'

        ]);

        $PC = Coputer::WherePcIp($request->get('pc_no'))->first();
        dd($PC);




    }


//     $this->validate($request, [
//         'pass' => 'required|min:6|max:12',
//         'pass2' => 'required|same:pass'
//     ]);
//     $update = User::where('id', Auth::id())->update(['password'=> bcrypt($request['pass'])]);
//     $args = array('info'=> 'Password Updated Successfully!!!');
//     return redirect()->back()->with($args);
// }


// public function monitoring(){
//     if($this->accoutChecker()){
//         return $this->accoutChecker();
//     }


}
