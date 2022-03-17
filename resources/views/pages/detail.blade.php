@extends('layout')
@section('template')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Karyawan</h1>
<div class="card" style="width: 25rem;">
    <img class="card-img-top" src="{{ url('/storage/'. $detail->foto_ktp) }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Detail Karyawan</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Nama : {{ $detail->nama_karyawan }}</li>
      <li class="list-group-item">NIP : {{ $detail->nip }}</li>
      <li class="list-group-item">Jabatan : {{ $detail->jabatan }}</li>
      <li class="list-group-item">Departemen : {{ $detail->departemen }}</li>
      <li class="list-group-item">tanggal lahir : {{ $detail->tgl_lahir }}</li>
      <li class="list-group-item">Tahun Lahir : {{ $detail->tahun_lahir }}</li>
      <li class="list-group-item">Alamat : {{ $detail->alamat }}</li>
      <li class="list-group-item">No Telepon : {{ $detail->no_telp }}</li>
      <li class="list-group-item">Agama : {{ $detail->agama }}</li>
      <li class="list-group-item">Status : @if ($detail->status == 1)
          {{ 'Aktif' }}
      @endif @if ($detail->status == 2)
      {{'Non Aktif'}}
          
      @endif</li>
    </ul>
  </div>


@endsection