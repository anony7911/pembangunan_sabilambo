@section('title', __('Realisasi Pembangunan'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="feather-grid"></i>
                                Realisasi Pembangunan </h4>
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
                    @include('livewire.realisasipembangunans.modals')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Pembangunan</th>
                                    <th>Pelaksana</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Persentase</th>
                                    <td>ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($realisasipembangunans as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $row->nama_pembangunan }}
                                    </td>
                                    <td>{{ $row->pelaksana }}</td>
                                    <td>{{ $row->tanggal_mulai }}</td>
                                    <td>{{ $row->tanggal_selesai }}</td>
                                    <td>{{ $row->persentase }} %</td>
                                    <td width="90">
                                        <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                            class=" btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i
                                                class="fa fa-edit"></i> Edit </a>
                                        <a class=" btn btn-sm btn-danger"
                                            onclick="confirm('Confirm Delete Realisasi pembangunan id {{$row->id}}? \nDeleted Realisasi pembangunan  cannot be recovered!')||event.stopImmediatePropagation()"
                                            wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i>
                                            Delete </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="100%">No data Found </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end">{{ $realisasipembangunans->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
