<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usr = Users::all();
        return view('user.user',['user' => $usr]);
    }

    public function add()
    {
        return view ('user.user-add');
    }
    public function store( Request $request)
    {
        $validated  = $request->validate([
            'name' => 'required|unique:users|max:100',
            
        ]);

        $usr = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            
        ]);;
        return redirect('user')->with('status','User berhasil ditambah');
    }
    public function edit($id)
    {
        $usr = Users::where('id',$id)->first();
        return view('user.user-edit',['user' => $usr]);
    }
    public function update(Request $request, $id)
    {
        $user = Users::where('id',$id)->firstOrFail();
        if($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        }
        
       
        return redirect()->route('users.index')->with('status','User berhasil diperbarui');
        
    }
    public function destroy($id)
    {
        $data = Users::where('id',$id)->first();
        $data->delete(); 
        return redirect('user')->with('status','User berhasil dihapus');
      
    }
    public function approve($id)
    {
        $user =  Users::where('id', $id)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user')->with('status','User Baru telah disetujui');
    }
}