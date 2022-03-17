@extends('layout')
@section('template')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Karyawan</h1>
<div class="card shadow py-2">
    <div class="card-body">
        <a href="/" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Kembali</a>
        <hr>

        <form action="{{ url('karyawan', $edit->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
            <label>Nama Karyawan</label>
            <input name="nama_karyawan" type="text" value="{{ old('nama_karyawan', $edit->nama_karyawan) }}" placeholder="Nama Karyawan" class="form-control @error('nama_karyawan') is-invalid @enderror" >
            @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>NIP</label>
            <input name="nip" type="text" value="{{ old('nip', $edit->nip) }}" placeholder="NIP" class="form-control @error('nip') is-invalid @enderror" >
            @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Jabatan</label>
            <input name="jabatan" type="text" value="{{ old('jabatan', $edit->jabatan) }}" placeholder="Jabatan" class="form-control @error('jabatan') is-invalid @enderror" >
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Departemen</label>
            <input name="departemen" type="text" value="{{ old('departemen', $edit->departemen) }}" placeholder="Departemen" class="form-control @error('departemen') is-invalid @enderror" >
            @error('departemen')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Tanggal Lahir</label>
            <input name="tgl_lahir" type="date" value="{{ old('tgl_lahir', $edit->tgl_lahir) }}" placeholder="Modal" class="form-control @error('tgl_lahir') is-invalid @enderror" >
            @error('tgl_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>Tahun Lahir</label>
            <select name="tahun_lahir" class="form-control">
                    @for($a=1980;$a<=date('Y');$a++)
                    @if (old('tahun_lahir', $edit->tahun_lahir) == $a)
                    <option value="{{ $a }}" selected>{{ $a }}</option>
                    @else
                    <option value="{{ $a }}">{{ $a }}</option>
                    @endif
                    @endfor
            </select>
            </div>
            <br>
            <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" placeholder="Alamat" value="{{ old('alamat', $edit->alamat) }}"  class="form-control @error('alamat') is-invalid @enderror" >
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
            <label>No Telepon</label>
            <input name="no_telp" type="number" placeholder="No Telepon" value="{{ old('no_telp', $edit->no_telp) }}"  class="form-control @error('no_telp') is-invalid @enderror" >
            @error('no_telp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="agama">Agama :</label> <br>
            <div class="form-check form-check-inline">
                <label for="agama">
                    <input type="radio" name="agama" value="islam" id="agama" {{$edit->agama == 'islam'? 'checked' : ''}}>Islam
                    <input type="radio" name="agama" value="katolik" id="agama" {{$edit->agama == 'katolik'? 'checked' : ''}}>Katolik
                    <input type="radio" name="agama" value="protestan" id="agama" {{$edit->agama == 'protestan'? 'checked' : ''}}>Protestan
                    <input type="radio" name="agama" value="hindu" id="agama" {{$edit->agama == 'hindu'? 'checked' : ''}}>Hindu
                    <input type="radio" name="agama" value="budha" id="agama" {{$edit->agama == 'budha'? 'checked' : ''}}>Budha
                    <input type="radio" name="agama" value="konghucu" id="agama" {{$edit->agama == 'konghucu'? 'checked' : ''}}>Konghucu
                </label>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label>Foto KTP</label>
            <input type="hidden" value="{{ $edit->foto_ktp }}" name="old_image">
            <input name="foto_ktp" type="file" placeholder="" class="form-control @error('foto_ktp') is-invalid @enderror">
            @error('foto_ktp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <img src="{{ url('/storage/'. $edit->foto_ktp) }}" width="100" height="100">
            <br>
            <button type="reset" class="btn btn-danger"> <span class="fa fa-times"></span> Reset</button>
            <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save</button>
        </form>
    </div>
</div>
@endsection