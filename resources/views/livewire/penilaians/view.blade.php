@section('title', __('Penilaian'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="feather-grid"></i>
                                Penilaian Tertinggi</h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                            {{ session('message') }} </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-white mb-3" style="color: white !important;">
                        <table class="table table-bordered table-sm text-white bg-dark "
                            style="border-color: white !important;">
                            <thead class="thead">
                                <tr>
                                    <th>Pembangunan</th>
                                    <th>Jumlah Penilai</th>
                                    <th>Nilai</th>
                                    <td>ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($nilaiTertinggi as $row)
                                <tr>
                                    <td>[{{ $row->id }}] {{ $row->nama_pembangunan }}
                                        <br>
                                        <small>({{ $row->pelaksana }})</small>
                                    </td>
                                    <td>{{ $row->penilaians->count('user_id') }} Orang</td>
                                    <td>{{ $row->penilaians->avg('rata_rata') }}</td>
                                    <td width="90">
                                        <a class="btn btn-sm btn-success" href="#" wire:click.prevent="realisasikan()"><i
                                                class="far fa-check-circle me-2"></i>Realisasikan</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="100%">No data Found </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="feather-grid"></i>
                                Penilaian Masyarakat</h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                            {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Search Penilaians">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.penilaians.modals')

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Pembangunan</th>
                                    <th>Masyarakat</th>
                                    <th>Rata Rata</th>
                                    <th>Komentar</th>
                                    <td>ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($penilaians as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>[{{ $row->pembid }}] {{ $row->nama_pembangunan }}
                                        <br>
                                        <small>({{ $row->pelaksanap }})</small>
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->rata_rata }}</td>
                                    <td>{{ $row->komentar }}</td>
                                    <td width="90">
                                        <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                            class="btn btn-sm btn-warning" wire:click="detail({{$row->id}})"><i
                                                class="fa fa-eye"></i> Detail </a>
                                        <!-- <a class="btn btn-sm btn-danger"
                                            onclick="confirm('Confirm Delete Penilaian id {{$row->id}}? \nDeleted Penilaians cannot be recovered!')||event.stopImmediatePropagation()"
                                            wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete
                                        </a> -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="100%">No data Found </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end">{{ $penilaians->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
