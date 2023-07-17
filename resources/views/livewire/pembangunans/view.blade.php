@section('title', __('Pembangunans'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="feather-grid"></i>
                                Data Pembangunan</h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                            {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Search...">
                        </div>
                        <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                            <i class="fa fa-plus"></i> Tambah Data
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.pembangunans.modals')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Jenis Pembangunan</th>
                                    <th>Nama Pembangunan</th>
                                    <th>Lokasi</th>
                                    <th>Total Biaya</th>
                                    <th>Sumber Dana</th>
                                    <th>Pelaksana</th>
                                    <th>Berkas</th>
                                    <th>Status</th>
                                    <td>ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembangunans as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->jenispembangunan_id }}</td>
                                    <td>{{ $row->nama_pembangunan }}</td>
                                    <td>{{ $row->lokasi }}</td>
                                    <td>{{ $row->total_biaya }}</td>
                                    <td>{{ $row->sumber_dana }}</td>
                                    <td>{{ $row->pelaksana }}</td>
                                    <td>{{ $row->berkas }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td width="90">
                                        <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                            class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i
                                                class="fa fa-edit"></i> Edit </a>
                                        <a class="btn btn-sm btn-danger"
                                            onclick="confirm('Confirm Delete Pembangunan id {{$row->id}}? \nDeleted Pembangunans cannot be recovered!')||event.stopImmediatePropagation()"
                                            wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="100%">No data Found </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end">{{ $pembangunans->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
