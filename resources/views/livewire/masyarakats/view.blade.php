@section('title', __('Masyarakat'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="feather-users"></i>
							Data Masyarakat </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search...">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Tambah Data
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.masyarakats.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nik</th>
								<th>Nama</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>Alamat</th>
								<th>RT / RW</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($masyarakats as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nik }}</td>
								<td>{{ ucwords(strtolower($row->nama)) }}</td>
								<td>{{ ucwords(strtolower($row->tempat_lahir)) }}</td>
								<td>{{ Carbon\Carbon::parse($row->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
								<td>
                                    @if ($row->jenis_kelamin == 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
								<td>{{ ucwords(strtolower($row->alamat)) }}</td>
								<td>{{ $row->rt }} / {{ $row->rw }}</td>
								<td width="90">
											<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
											<a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Masyarakat id {{$row->id}}? \nDeleted Masyarakats cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>

									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $masyarakats->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
