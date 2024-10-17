<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function loginAuth(Request $request)
    {
        //email:dns -> validasi email dan @nya
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // menyimpan isi form email dan password di variabel user
        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            //jika berhasil kembali ke halaman landing-page
            return redirect()->route('landing-page');
        } else {
            //jika gagal kembali ke halaman login
            return redirect()->back()->with('failed', 'Email atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout');

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = user::where('name', 'like', '%'.$request->search.'%')->orderBy('name', 'asc')->simplePaginate(5);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $proses = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(value: $request->password),
            'role' => $request->role,
        ]);
        if ($proses) {
            return redirect()->route('user')->with('success', 'Berhasil menambahkan data pengguna');
        } else {
            return redirect()->route('user.add')->with('failed', 'Gagal menambahkan data pengguna');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = user::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'role'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ], [
                'role.required'=>'Jenis akun harus diisi!',
                'name.required'=>'Nama akun harus diisi!',
                'email.required'=>'email akun harus diisi!',
                'password.required'=>'Password akun harus diisi!',
        ]);
        $userBefore = user::where('id', $id)->first();
            $proses = $userBefore->update([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(value: $request->password),
            ]);


            // jika bioskop::create berhasil (if), jika gagal (else)
            if ($proses) {
                return redirect()->route('user')->with('success', 'Data akun berhasil Diubah');
            } else {
                return redirect()->route('user.add')->with('failed', 'Data akun gagal Diubah');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // mencari data yang akan di hapus dengan where, lalu hapus dengan delete()
        $proses = user::where('id', $id)->delete();
        if ($proses) {
            // redirect() : kembali ke halaman sebelum destory dijalanin (halaman button delete berada)
            return redirect()->back()->with('success', 'Data user berhasil dihapus');
        } else {
            return redirect()->back()->with('failed', 'Data user gagal dihapus');
        }
    }
}
