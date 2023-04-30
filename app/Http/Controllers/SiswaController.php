<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    //
    public function index(Request $request){
    	 //Ambil semua data di model Pegawai dan simpan di Variabel
    	if($request->has('search')){
    		$siswa = Siswa::where('nama', 'Like', '%'. $request->search.'%')
    		->orWhere('nis', 'Like', '%'.$request->search.'%')
    		->orWhere('tmplahir','Like','%'.$request->search.'%')
    		->orWhere('tgllahir','Like','%'.$request->search.'%')
    		->paginate(25);
    	}else{
    		$siswa=Siswa::paginate(25);
    	}
    	return view('siswa.siswa', ['siswa' => $siswa]);
    }

    public function delete($nis){
    	$siswa = Siswa::where('nis',$nis);
    	$siswa->delete($siswa);
    	return redirect('/siswa/')->with('suskes', 'Success');
    }
    public function create(Request $request){
    	Siswa::create($request->all());
    	return redirect('/siswa');
    }
    public function edit($nis){
    	$siswa = Siswa::where('nis',$nis)->first();
    	return view('siswa.edit', compact('siswa'));
    }

        public function update(Request $request, $nis){
    	$siswa = Siswa::where('nis',$nis);
    	$siswa->update($request->except(['_token']));
    	return redirect('/siswa');
    }
}
