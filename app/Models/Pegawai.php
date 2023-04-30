<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
// Untuk menghubungkan Tabel di Database
{
	use HasFactory;
    protected $table = 'pegawai'; // Memberitahu menggunakan tabel Pegawai
    public $timestamps = false;
    protected $fillable = ['nama', 'nip', 'tgllahir', 'tmplahir', 'nik', 'bagian', 'nikah', 'kelamin'];

}
