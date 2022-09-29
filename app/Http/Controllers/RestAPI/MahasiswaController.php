<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatter;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index(MahasiswaModel $mahasiswa)
    {
        $data = $mahasiswa->all();

        if ($data) {
            return ResponseFormatter::createResponse(200, 'Data mahasiswa berhasil diambil', $data);
        } else {
            return ResponseFormatter::createResponse(404, 'Data mahasiswa tidak ditemukan', null);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'jurusan_id' => 'required',
                'nim' => 'required',
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'status' => 'required',
            ]);

            $mahasiswa = MahasiswaModel::create([
                'jurusan_id' => $request->jurusan_id,
                'nim' => $request->nim,
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'status' => $request->status,
            ]);

            $data = MahasiswaModel::where('id', $mahasiswa->id)->get();

            if ($data) {
                return ResponseFormatter::createResponse(200, 'Data mahasiswa berhasil ditambah', $data);
            } else {
                return ResponseFormatter::createResponse(404, 'Data mahasiswa tidak ditemukan', null);
            }
        } catch (\Throwable $th) {
            return ResponseFormatter::createResponse(500, 'Data mahasiswa gagal ditambah', null);
        }
    }

    public function show($id)
    {
        $data = MahasiswaModel::where('id', $id)->first();

        if ($data) {
            return ResponseFormatter::createResponse(200, 'Data mahasiswa berhasil diambil', $data);
        } else {
            return ResponseFormatter::createResponse(404, 'Data mahasiswa tidak ditemukan', null);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'jurusan_id' => 'required',
                'nim' => 'required',
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'status' => 'required',
            ]);

            $mahasiswa = MahasiswaModel::where('id', $id)->first();

            if ($mahasiswa) {
                $mahasiswa->update([
                    'jurusan_id' => $request->jurusan_id,
                    'nim' => $request->nim,
                    'nama_lengkap' => $request->nama_lengkap,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'status' => $request->status,
                ]);

                $data = MahasiswaModel::where('id', $id)->get();

                if ($data) {
                    return ResponseFormatter::createResponse(200, 'Data mahasiswa berhasil diubah', $data);
                } else {
                    return ResponseFormatter::createResponse(404, 'Data mahasiswa tidak ditemukan', null);
                }
            } else {
                return ResponseFormatter::createResponse(404, 'Data mahasiswa tidak ditemukan', null);
            }
        } catch (\Throwable $th) {
            return ResponseFormatter::createResponse(500, 'Data mahasiswa gagal diubah', null);
        }
    }
    
    public function destroy($id)
    {
        try {
            $mahasiswa = MahasiswaModel::where('id', $id)->first();

            if ($mahasiswa) {
                $mahasiswa->delete();

                return ResponseFormatter::createResponse(200, 'Data mahasiswa berhasil dihapus', null);
            } else {
                return ResponseFormatter::createResponse(404, 'Data mahasiswa tidak ditemukan', null);
            }
        } catch (\Throwable $th) {
            return ResponseFormatter::createResponse(500, 'Data mahasiswa gagal dihapus', null);
        }
    }
}
