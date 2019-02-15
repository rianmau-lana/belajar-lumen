<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Feb 2019 07:39:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Kelas
 * 
 * @property int $id
 * @property string $nama_kelas
 * @property string $jurusan
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $siswa
 *
 * @package App\Models
 */
class Kelas extends Eloquent
{
	protected $fillable = [
		'nama_kelas',
		'jurusan'
	];

	public function siswa()
	{
		return $this->hasMany(\App\Models\Siswa::class, 'id_kelas');
	}
}
