<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    //
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nis'           => 'required|max:10',
            'nama_lengkap'  => 'required|string',
            'jenis_kelamin' => 'required|max:1',
            'alamat'        => 'required|string',
            'id_kelas'      => 'required|integer|max:1',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $siswa = Siswa::create($request->all());
        if ($siswa) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil ditambahkan',
                'result'  => $siswa
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal ditambahkan',
                'result'  => null
            ];
        }
    }

    public function read(Request $request)
    {
        $kelas = Kelas::first();
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();
        return [
            'status'  => 'success',
            'result'  => $siswa
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'nis'           => 'required|max:10',
            'nama_lengkap'  => 'required|string',
            'jenis_kelamin' => 'required|max:1',
            'alamat'        => 'required|string',
            'id_kelas'      => 'required|integer|max:1',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $data_siswa = Siswa::find($id);
        if (empty($data_siswa)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $siswa = $data_siswa->update($request->all());
        if ($siswa) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil diubah',
                'result'  => $siswa
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal diubah',
                'result'  => null
            ];
        }
    }

    public function delete(Request $request, $id)
    {
        $data_siswa = Siswa::find($id);
        if (empty($data_siswa)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $siswa = $data_siswa->delete($id);
        if ($siswa) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil dihapus',
                'result'  => $siswa
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal dihapus',
                'result'  => null
            ];
        }
    }
}
