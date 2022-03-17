@extends('layout')
@section('template')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Karyawan</h1>
<div class="card shadow py-2">
    <div class="card-body">
        <a href="/" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Kembali</a>
        <hr>

        <form action="{{ url('karyawan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label>Nama Karyawan</label>
            <input name="nama_karyawan" type="text" value="{{ old('nama_karyawan') }}" placeholder="Nama Karyawan" class="form-control @error('nama_karyawan') is-invalid @enderror" >
            @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>NIP</label>
            <input name="nip" type="text" value="{{ old('nip') }}" placeholder="NIP" class="form-control @error('nip') is-invalid @enderror" >
            @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Jabatan</label>
            <input name="jabatan" type="text" value="{{ old('jabatan') }}" placeholder="Jabatan" class="form-control @error('jabatan') is-invalid @enderror" >
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Departemen</label>
            <input name="departemen" type="text" value="{{ old('departemen') }}" placeholder="Departemen" class="form-control @error('departemen') is-invalid @enderror" >
            @error('departemen')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Tanggal Lahir</label>
            <input name="tgl_lahir" type="date" value="{{ old('tgl_lahir') }}" placeholder="Modal" class="form-control @error('tgl_lahir') is-invalid @enderror" >
            @error('tgl_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Tahun Lahir</label>
            <select name="tahun_lahir" class="form-control">
                    @for($a=1980;$a<=date('Y');$a++)
                        <option value="{{ $a }}">{{ $a }}</option>
                    @endfor
                    {{-- <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option> --}}
            </select>
            </div>
            <br>
            <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" placeholder="Alamat" value="{{ old('alamat') }}"  class="form-control @error('alamat') is-invalid @enderror" >
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>No Telepon</label>
            <input name="no_telp" type="number" placeholder="No Telepon" value="{{ old('no_telp') }}"  class="form-control @error('no_telp') is-invalid @enderror" >
            @error('no_telp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="agama">Agama :</label> <br>
            <div class="form-check form-check-inline">
                <label for="agama">
                    <input type="radio" name="agama" value="islam" id="agama">Islam
                    <input type="radio" name="agama" value="katolik" id="agama">Katolik
                    <input type="radio" name="agama" value="protestan" id="agama">Protestan
                    <input type="radio" name="agama" value="hindu" id="agama">Hindu
                    <input type="radio" name="agama" value="budha" id="agama">Budha
                    <input type="radio" name="agama" value="konghucu" id="agama">Konghucu
                </label>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Aktif</option>
                <option value="2">Non Aktif</option>
            </select>
            </div>      
            <br>
            <div class="form-group">
            <label>Foto KTP</label>
            <input name="foto_ktp" type="file" placeholder="" class="form-control @error('foto_ktp') is-invalid @enderror">
            @error('foto_ktp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <button type="reset" class="btn btn-danger"> <span class="fa fa-times"></span> Reset</button>
            <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save</button>
        </form>
    </div>
</div>
@endsection