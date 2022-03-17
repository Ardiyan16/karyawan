<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var['title'] = 'Table Karyawan';
        $var['karyawan'] = Karyawan::all();
        return view('pages.index', $var);
    }

    public function create()
    {
        $var['title'] = 'Add Karyawan';
        return view('pages.add', $var);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_karyawan' => 'required|string',
            'nip' => 'required|unique:karyawans,nip',
            'jabatan' => 'required',
            'departemen' => 'required',
            'tgl_lahir' => 'required',
            'tahun_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'foto_ktp' => 'image|file|max:3024'
        ]);

        if ($request->file('foto_ktp')) {
            $validateData['foto_ktp'] = $request->file('foto_ktp')->store('foto_ktp');
        }

        Karyawan::create($validateData);

        // $file = $request->file('foto_ktp');

        // $nama_file = time() . "_" . $file->getClientOriginalName();

        // // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'ktp';
        // $file->move($tujuan_upload, $nama_file);

        // Karyawan::create([
        //     'nama_karyawan' => $request->nama_karyawan,
        //     'nip' => $request->nip,
        //     'jabatan' => $request->jabatan,
        //     'departemen' => $request->departemen,
        //     'tgl_lahir' => $request->tgl_lahir,
        //     'tahun_lahir' => $request->tahun_lahir,
        //     'alamat' => $request->alamat,
        //     'no_telp' => $request->no_telp,
        //     'agama' => $request->agama,
        //     'status' => $request->status,
        //     'foto_ktp' => $nama_file
        // ]);
        Alert::success('Berhasil', 'Data Karyawan Berhasil di Simpan');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $var['title'] = 'Detail';
        $var['detail'] = Karyawan::findOrFail($id);
        return view('pages.detail', $var);
    }


    public function edit($id)
    {
        $var['title'] = 'Edit';
        $var['edit'] = Karyawan::FindOrFail($id);
        return view('pages.edit', $var);
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $validateData = $request->validate([
            'nama_karyawan' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'tgl_lahir' => 'required',
            'tahun_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'foto_ktp' => 'image|file|max:3024'
        ]);

        if ($request->file('foto_ktp')) {
            $validateData['foto_ktp'] = $request->file('foto_ktp')->store('foto_ktp');
        }

        Karyawan::find($id)->update($validateData);
        Alert::success('Berhasil', 'Data Karyawan di Update');
        return redirect('/');
    }

    public function update2(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_karyawan' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'tgl_lahir' => 'required',
            'tahun_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'foto_ktp' => 'image|file|max:3024'
        ]);

        Karyawan::update([
            'nama_karyawan' => $request->nama_karyawan,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'departemen' => $request->departemen,
            'tgl_lahir' => $request->tgl_lahir,
            'tahun_lahir' => $request->tahun_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'agama' => $request->agama,
            'status' => $request->status
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        if ($karyawan->foto_ktp) {
            Storage::delete($karyawan->foto_ktp);
        }
        Karyawan::destroy($karyawan->id);
        Alert::success('Berhasil', 'Data Karyawan Berhasil di Hapus');
        return redirect('/');
    }

    public function status($id)
    {
        DB::table('pegawais')
              ->where('id', $id)
              ->update(['status' => 1]);
    }
}
