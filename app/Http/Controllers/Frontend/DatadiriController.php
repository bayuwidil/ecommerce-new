<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatadiriController extends Controller
{
    public function index(){
        $data = User::where('id', Auth::id())->get();
        return view('frontend.datadiri', compact('data'));
    }
    public function update(Request $request){
        $validateData = $request->validate([
            'name' => ['required','min:5','max:30'],
            'email' => ['required', 'email:rfc,dns'],
            'telepon' => ['required'],
            'alamat' => ['required']
        ]);

        $name = $validateData['name'];
        $email = $validateData['email'];
        $telepon = $validateData['telepon'];
        $alamat = $validateData['alamat'];
        

        $data = User::where('id', Auth::id())->first();
        $data->$name = $request->input('name');
        $data->$email = $request->input('email');
        $data->$telepon = $request->input('telepon');
        $data->$alamat = $request->input('alamat');
        $data->update();
        return redirect('/data-diri');
    }

}
 