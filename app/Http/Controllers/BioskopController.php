<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import model
use App\Models\bioskop;

class bioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Request $request : mengambil data dari form yang dikirim ke action terhubung dengan func ini
    public function index(Request $request)
    {
        // mengambil data bioskop
        // mengambil semua data : NamaModel::all()
        // NamaModel sesuaikan dengan data apa yang mau dimunculin
        // simplepaginate() : membuat pagination dengan jumlah data 5 per halaman
        // where('nama_field_migration', 'operator', 'value') : mencari
        // operator -> =, <, >, <=, >=, !=, like
        // % depan : belakang
        // % belakang : depan
        // % belakang & atas ; depan/bwlakang/tenagh
        // OrderBy : mengurutkan berdasarkan field/ column migration tertentu
        // ASC : ascending (kecil ke besar)
        // DESC : descending (besar ke kecil)
        $bioskop = bioskop::where('name', 'like', '%'.$request->search.'%')->orderBy('name', 'asc')->simplePaginate(5);
        // compact : mengirimkan data ke blade compact('namavariable')
        return view('bioskop.index', compact('bioskop'));
        // dd($bioskop);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bioskop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data agar pengguna mengisi input form ga asal asalan
        // required : wajib diisi input yang namenya itu
        $request->validate([
            'type'=>'required',
            'name'=>'required',
            'price'=>'required | numeric',
            'stock'=>'required | numeric',
        ], [
                'type.required'=>'Jenis film harus diisi!',
                'name.required'=>'Nama film harus diisi!',
                'price.required'=>'Harga film harus diisi!',
                'stock.required'=>'Stock film harus diisi!',
        ]);
            // menambahkan data ke database
            // name_field_migration => $request->name_input_form
            $proses = bioskop::create([
                'type' => $request->type,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
            // jika bioskop::create berhasil (if), jika gagal (else)
            if ($proses) {
                return redirect()->route('bioskop')->with('success', 'Data film berhasil ditambahkan');
            } else {
                return redirect()->route('bioskop.add')->with('failed', 'Data film gagal ditambahkan');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // ambil data yang mau di edit sesuai dengan id {id}
        // where () : mencari berdasarkan id
        // first () : mengambil data pertama (satu data yang diambil)
        $bioskop = bioskop::where('id', $id)->first();
        return view('bioskop.edit', compact('bioskop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data agar pengguna mengisi input form ga asal asalan
        // required : wajib diisi input yang namenya itu
        $request->validate([
            'type'=>'required',
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
        ], [
                'type.required'=>'Jenis film harus diisi!',
                'name.required'=>'Nama film harus diisi!',
                'price.required'=>'Harga film harus diisi!',
                'stock.required'=>'Stock film harus diisi!',
        ]);
        $bioskopBefore = bioskop::where('id', $id)->first();
        if ((int)$request->stock < (int)$bioskopBefore->stock) {
            return redirect()->back()->with('failed', 'Stock Baru Tidak Boleh Kurang Dari Stok Sebelumnya!');
        }
            $proses = $bioskopBefore->update([
                'type' => $request->type,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock
            ]);


            // jika bioskop::create berhasil (if), jika gagal (else)
            if ($proses) {
                return redirect()->route('bioskop')->with('success', 'Data film berhasil ditambahkan');
            } else {
                return redirect()->route('bioskop.add')->with('failed', 'Data film gagal ditambahkan');
            }
    }

    public function stockEdit(Request $request, $id)
    {
        if(!isset($request->stock)) {
            return response()->json(['failed' => 'Stock Tidak Boleh Kosong!!'], 400);
        }

        $bioskop = bioskop::findOrFail($id);
        if($request->stock < $bioskop['stock']) {
            return response()->json(['failed' => 'Stock Baru Tidak Boleh Kurang Dari Stok Sebelumnya!'], 400);
        }
        $bioskop->update(['stock' => $request->stock]);

        return response()->json(['success' => 'Stock Berhasil Diupdate.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // mencari data yang akan di hapus dengan where, lalu hapus dengan delete()
        $proses = bioskop::where('id', $id)->delete();
        if ($proses) {
            // redirect() : kembali ke halaman sebelum destory dijalanin (halaman button delete berada)
            return redirect()->back()->with('success', 'Data film berhasil dihapus');
        } else {
            return redirect()->back()->with('failed', 'Data film gagal dihapus');
        }
    }
}
