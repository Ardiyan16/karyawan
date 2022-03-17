@extends('layout')
@section('template')
 
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Table Karyawan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/karyawan/create" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Karyawan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>KTP</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp    

                    @foreach($karyawan as $k)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $k->nama_karyawan }}</td>
                        <td>{{ $k->nip }}</td>
                        <td>{{ $k->jabatan }}</td>
                        <td>{{ $k->departemen }}</td>
                        <td><img width="100px" src="{{ url('/storage/'. $k->foto_ktp) }}"></td>
                        <td> 
                            <a href="{{ route('karyawan.edit', $k->id) }}" style="color: white" class="badge bg-primary"><i style="color: white" class="fa fa-edit"></i> Edit</a>
                            <a href="/karyawan/{{$k->id}}" style="color: white" class="badge bg-success"><i style="color: white" class="fa fa-eye"></i> Detail</a>
                            <a href="" onclick="return confirm('Apakah Anda Ingin Mengubah Aktivasi  ?');" style="color: white" class="badge bg-info"> Update Status</a>
                            <form action="/karyawan/{{ $k->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" style="color: white" onclick="return confirm('Apakah anda yakin hapus karyawan?')"><i style="color: white" class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection