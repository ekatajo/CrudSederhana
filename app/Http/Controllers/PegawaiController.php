<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;

class PegawaiController extends Controller
// Untuk Mengolola Logic atau Proses CRUD
{
    //
    public function index(Request $request){
    	 //Ambil semua data di model Pegawai dan simpan di Variabel
    	if($request->has('search')){
    		$pegawai = Pegawai::where('nama', 'Like', '%'. $request->search.'%')
    		->orWhere('nip', 'Like', '%'.$request->search.'%')
    		->orWhere('tmplahir','Like','%'.$request->search.'%')
    		->orWhere('tgllahir','Like','%'.$request->search.'%')
    		->paginate(25);
    	}else{
    		$pegawai=Pegawai::paginate(25);
    	}
    	return view('pegawai.pegawai', ['pegawai' => $pegawai]);
    }

        public function delete($nip){
        $pegawai = Pegawai::where('nip',$nip);
        $pegawai->delete($pegawai);
        return redirect('/pegawai')->with('suskes', 'Success');
    }
        public function create(Request $request){
        Pegawai::create($request->all());
        return redirect('/pegawai');
    }

     public function edit($nip){
        $pegawai = pegawai::where('nip',$nip)->first();
        return view('pegawai.edit', compact('pegawai'));
    }

        public function update(Request $request, $nip){
        $pegawai = pegawai::where('nip',$nip);
        $pegawai->update($request->except(['_token']));
        return redirect('/pegawai');
    }
}
