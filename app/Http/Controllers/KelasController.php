<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kelas;

class KelasController extends Controller
{
        public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_kelas'  => 'required|string',
            'jurusan'     => 'required|string',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $kelas = Kelas::create($request->all());
        if ($kelas) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil ditambahkan',
                'result'  => $kelas
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
        $kelas = Kelas::all();
        return [
            'status'  => 'success',
            // 'message' => 'data berhasil ditambahkan',
            'result'  => $kelas
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'nama_kelas'  => 'required|string',
            'jurusan'     => 'required|string',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $data_kelas = Kelas::find($id);
        if (empty($data_kelas)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $kelas = $data_kelas->update($request->all());
        if ($kelas) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil diubah',
                'result'  => $kelas
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
        $data_kelas = Kelas::find($id);
        if (empty($data_kelas)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $kelas = $data_kelas->delete($id);
        if ($kelas) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil dihapus',
                'result'  => $kelas
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
