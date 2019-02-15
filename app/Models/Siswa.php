<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Feb 2019 07:39:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Siswa
 * 
 * @property int $id
 * @property int $nis
 * @property string $nama_lengkap
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $id_kelas
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Kelas $kelas
 *
 * @package App\Models
 */
class Siswa extends Eloquent
{
	protected $table = 'siswa';

	protected $casts = [
		'nis' => 'int',
		'id_kelas' => 'int'
	];

	protected $fillable = [
		'nis',
		'nama_lengkap',
		'jenis_kelamin',
		'alamat',
		'id_kelas'
	];

	public function kelas()
	{
		return $this->belongsTo(\App\Models\Kelas::class, 'id_kelas');
	}
}
