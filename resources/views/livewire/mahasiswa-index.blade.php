<div>
	{{-- Livewire --}}
	
	<h3 class="mb-4 text-uppercase">
		<i class="fa fa-list mr-1"></i> Data Mahasiswa 
		<a class="btn btn-primary float-right" href="{{ url('/dashboard/mahasiswa/create') }}">
			<i class="fa fa-plus mr-2"></i> Tambah
		</a>
	</h3>

	<div class="row mb-3">
		<div class="col align-self-start form-inline">
			Per Page : &nbsp;
			<select wire:model="perPage" class="form-control">
				<option>10</option>
				<option>15</option>
				<option>25</option>
			</select>
		</div>

		<div class="col-lg-4 align-self-end">
			<div class="input-group">
				<input wire:model="search" class="form-control" type="text" placeholder="Search ...">
				<div class="input-group-append">
					<span class="input-group-text"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-sm table-hover" data-form="dataForm">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIM</th>
							<th>NAMA</th>
							<th>ALAMAT</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($rows as $row)
						<tr>
							<td>{{ $rows->perPage() * ($rows->currentPage()-1) + $loop->iteration }}</td>
							<td>{{ $row->mhsw_nim }}</td>
							<td>{{ $row->mhsw_nama }}</td>
							<td>{{ $row->mhsw_alamat}}</td>
							<td>
								<div class="d-flex float-right">
									<a href="{{ url('/dashboard/mahasiswa/' . $row->_id . '/edit') }}" class="btn btn-sm btn-warning">
										<i class="fa fa-edit"></i> EDIT
									</a>
									<a href="{{ url('/dashboard/mahasiswa/' . $row->_id) }}" class="btn btn-sm btn-info ml-2">
										<i class="fa fa-info-circle"></i> DETAIL
									</a>
									<form action="{{ url('/dashboard/mahasiswa/' . $row->_id . '/delete') }}" method="POST" class="delete-confirm">
										<input type="hidden" name="_method" value="DELETE">
										@csrf
										<button class="btn btn-danger btn-sm ml-2">
											<i class="fa fa-trash"></i> HAPUS
										</button>
									</form>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col align-self-start text-muted">
			Showing {{ $rows->firstItem() }} to {{ $rows->lastItem() }} out of {{ $rows->total() }} results
		</div>
		<div class="col-lg-6 align-self-end">
			<div class="d-flex float-right">
				{{ $rows->links() }}
			</div>
		</div>
	</div>

	<script>
		$('table[data-form="dataForm"]').on('click', '.delete-confirm', function(e){
			e.preventDefault();
			var form = $(this);
			Swal.fire({
				title: 'Are you sure?',
				text: 'This record and it`s details will be permanantly deleted!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					form.submit();
				}
			});
		});
	</script>

	{{-- Livewire --}}
</div>