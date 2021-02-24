<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $create = $request->query('create','');
        $delete = $request->query('delete','');
        $update = $request->query('update','');

        $karyawans = Karyawan::paginate(50);

        return view('karyawan.index',['delete'=>$delete,'create'=>$create,'update'=>$update,'karyawans'=>$karyawans]);
    }

        public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'no_ktp'=>'required',
            'nama_sekolah'=>'required',
            'jurusan'=>'required',
            'tahun_masuk'=>'required',
            'tahun_lulus'=>'required',
            'perusahaan'=>'required',
            'jabatan'=>'required',
            'tahun'=>'required',
            
            ]);
            
        // return response()->json($request->all());
        
        $newKaryawan = new Karyawan();
        $newKaryawan->nama = $request->nama;
        $newKaryawan->alamat = $request->alamat;
        $newKaryawan->no_ktp = $request->no_ktp;
        $newKaryawan->nama_sekolah = json_encode($request->nama_sekolah);
        $newKaryawan->jurusan = json_encode($request->jurusan);
        $newKaryawan->tahun_masuk = json_encode($request->tahun_masuk);
        $newKaryawan->tahun_lulus = json_encode($request->tahun_lulus);
        $newKaryawan->perusahaan = json_encode($request->perusahaan);
        $newKaryawan->jabatan = json_encode($request->jabatan);
        $newKaryawan->tahun = json_encode($request->tahun);
        $newKaryawan->keterangan = json_encode($request->keterangan);
        

        $isSaved = $newKaryawan->save();


        return redirect(route('karyawan.index',['create'=>$isSaved?'done':'fail']));
    }

    public function update(Request $request, $id)
    {
        $newKaryawan = Karyawan::find($id);
        if(isset($request->nama)){
            $newKaryawan->nama = $request->nama;
        }
        if(isset($request->alamat)){
            $newKaryawan->alamat = $request->alamat;
        }
        if(isset($request->no_ktp)){
            $newKaryawan->no_ktp = $request->no_ktp;
        }
        if(isset($request->nama_sekolah)){
            $newKaryawan->nama_sekolah = json_encode($request->nama_sekolah);
        }
        if(isset($request->jurusan)){
            $newKaryawan->jurusan = json_encode($request->jurusan);
        }
        if(isset($request->tahun_masuk)){
            $newKaryawan->tahun_masuk = json_encode($request->tahun_masuk);
        }
        if(isset($request->tahun_lulus)){
            $newKaryawan->tahun_lulus = json_encode($request->tahun_lulus);
        }
        if(isset($request->perusahaan)){
            $newKaryawan->perusahaan = json_encode($request->perusahaan);
        }
        if(isset($request->jabatan)){
            $newKaryawan->jabatan = json_encode($request->jabatan);
        }
        if(isset($request->tahun)){
            $newKaryawan->tahun = json_encode($request->tahun);
        }
        if(isset($request->keterangan)){
            $newKaryawan->keterangan = json_encode($request->keterangan);
        }

        $isSaved = $newKaryawan->save();

        return redirect(route('karyawan.index',['update'=>$isSaved?'done':'fail']));
    }



    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $isRemoved = $karyawan->delete();
        
         return redirect(route('karyawan.index',['delete'=>$isRemoved?'done':'fail']));
    }
}
