<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
    //
    public function index()
    {
        // Jika return adalah ajax maka akan menjalankan fungsi datatable
        if (request()->ajax()) {
            // Mengambil data dari table jurusan
            $query = JurusanModel::query();

            return DataTables::of($query)
                // Menambahkan kolom index row
                ->addIndexColumn()
                // Menambahkan kolom untuk aksi edit dan delete
                ->addColumn('action', function ($item) {
                    return view ('jurusan.dt-action', compact('item'));
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('jurusan.index');
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store()
    {
        // Validasi data
        $data = $this->validate(request(), [
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required'
        ]);

        // Menyimpan data ke table jurusan
        JurusanModel::create($data);

        // Jika data berhasil disimpan maka akan mengirim response success, dan jika salah akan mengirim response error
        if ($data) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal disimpan'
            ]);
        }
    }
}
