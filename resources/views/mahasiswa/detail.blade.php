@extends('layouts.app')
@section('content')

<h3 class="mb-4 text-uppercase">
	<i class="fa fa-folder-open mr-1"></i> Detail Data Mahasiswa
	<a href="{{ url('/dashboard/mahasiswa') }}" class="btn btn-primary float-right">
		<i class="fa fa-arrow-left mr-2"></i> KEMBALI
	</a>
</h3>

<table class="table table-striped">
	<tr>
		<th style="width: 100px;">ID</th>
		<td>{{ $row->_id }}</td>
	</tr>
	<tr>
		<th>NIM</th>
		<td>{{ $row->mhsw_nim }}</td>
	</tr>
	<tr>
		<th>NAMA</th>
		<td>{{ $row->mhsw_nama }}</td>
	</tr>
	<tr>
		<th>ALAMAT</th>
		<td>{{ $row->mhsw_alamat }}</td>
	</tr>
	<tr>
		<th>PRODI</th>
		<td>{{ $row->mhsw_prodi }}</td>
	</tr>
	<tr>
		<th>DIBUAT</th>
		<td>{{ \Carbon\Carbon::parse($row->created_at)->formatLocalized('%d %B %Y %H:%M:%S') }}</td>
	</tr>
	<tr>
		<th>DIEDIT</th>
		<td>{{ $row->updated_at != "" ? \Carbon\Carbon::parse($row->updated_at)->formatLocalized('%d %B %Y %H:%M:%S') : "" }}</td>
	</tr>
</table>

@endsection