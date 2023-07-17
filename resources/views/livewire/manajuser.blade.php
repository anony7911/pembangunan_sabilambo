@section('title', 'Data User')
<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <h4><i class="feather-user"></i>
                                    Data User</h4>
                            </div>
                            @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                            @endif
                            <div wire:ignore>
                                <select wire:model="paginate" id="paginate" class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div>
                                <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                    placeholder="Search...">
                            </div>
                            <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                                <i class="fa fa-plus"></i> Tambah User
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Add Modal -->
                        <div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static"
                            tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createDataModalLabel">Tambah User Baru</h5>
                                        <button wire:click.prevent="cancel()" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input wire:model="name" type="text" class="form-control" id="name"
                                                    placeholder="Nama Lengkap">@error('name') <span
                                                    class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input wire:model="email" type="text" class="form-control" id="email"
                                                    placeholder="Email">@error('email') <span
                                                    class="error text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input wire:model="password" type="password" class="form-control"
                                                    id="password">@error('password') <span class="error text-danger">{{
                                                    $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select wire:model="role" class="form-control" id="role">
                                                    <option value="admin">Admin</option>
                                                    <option value="lurah">Lurah</option>
                                                </select>@error('role') <span class="error text-danger">{{ $message
                                                    }}</span> @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-btn"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" wire:click.prevent="store()"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static"
                            tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                                        <button wire:click.prevent="cancel()" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <input type="hidden" wire:model="selected_id">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input wire:model="name" type="text" class="form-control" id="name"
                                                    placeholder="Nama Lengkap">@error('name') <span
                                                    class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input wire:model="email" type="text" class="form-control" id="email"
                                                    placeholder="Email">@error('email') <span
                                                    class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password </label>
                                                <input wire:model="password" type="password" class="form-control"
                                                    id="password">@error('password') <span class="error text-danger">{{
                                                    $message }}</span> @enderror
                                                <small class="text-muted">*Kosongkan jika tidak ingin mengubah
                                                    password</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select wire:model="role" class="form-control" id="role">
                                                    <option value="admin">Admin</option>
                                                    <option value="masyarakat">Masyarakat</option>
                                                    <option value="lurah">Lurah</option>
                                                </select>@error('role') <span class="error text-danger">{{ $message
                                                    }}</span> @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" wire:click.prevent="update()"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>#</td>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <td>ACTIONS</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucwords($row->name) }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ ucwords($row->role) }}</td>
                                        <td width="90">
                                            <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                                class="btn btn-sm btn-warning" wire:click="edit({{$row->id}})"><i
                                                    class="fa fa-edit"></i> Edit </a>
                                            <a class="btn btn-sm btn-danger"
                                                onclick="confirm('Confirm Delete Pengembalian id {{$row->id}}? \nDeleted users cannot be recovered!')||event.stopImmediatePropagation()"
                                                wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">No data Found </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-end">{{ $users->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
