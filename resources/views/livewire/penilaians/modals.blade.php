<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Tambah Data Penilaian</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="pembangunan_id">Pembangunan</label>
                        <select wire:model="pembangunan_id" class="form-control" id="pembangunan_id"
                            placeholder="Pembangunan Id">
                            <option value="">--Pilih Pembangunan--</option>
                            @foreach($pembangunans as $pembangunan)
                            <option value="{{ $pembangunan->id }}">{{ $pembangunan->nama_pembangunan }}</option>
                            @endforeach
                        </select>
                        @error('pembangunan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <input wire:model="user_id" type="text" class="form-control" id="user_id"
                            placeholder="User Id">@error('user_id') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rata_rata"></label>
                        <input wire:model="rata_rata" type="text" class="form-control" id="rata_rata"
                            placeholder="Rata Rata">@error('rata_rata') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="komentar"></label>
                        <input wire:model="komentar" type="text" class="form-control" id="komentar"
                            placeholder="Komentar">@error('komentar') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">1212
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Detail Penilaian</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <!-- pelurangan nilai dalam tabel -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($nilaidetail as $nd)
                                    <tr>
                                        <td>{{ $nd->nama_kategori }}</td>
                                        <td>{{ $nd->nilai }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
