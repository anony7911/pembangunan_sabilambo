<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Tambah Data Realisasi Pembangunan</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="pembangunan_id">Pembangunan</label>
                        <select wire:model="pembangunan_id" class="form-control" id="pembangunan_id"
                            placeholder="Pembangunan Id">
                            <option value="">Pilih Pembangunan</option>
                            @foreach($pembangunans as $pembangunan)
                            <option value="{{ $pembangunan->id }}">{{ $pembangunan->nama_pembangunan }} - {{ $pembangunan->pelaksana }}</option>
                            @endforeach
                        </select>
                        @error('pembangunan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input wire:model="tanggal_mulai" type="date" class="form-control" id="tanggal_mulai"
                            placeholder="Tanggal Mulai">@error('tanggal_mulai') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input wire:model="tanggal_selesai" type="date" class="form-control" id="tanggal_selesai"
                            placeholder="Tanggal Selesai">@error('tanggal_selesai') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="persentase">Persentase (min:0, max:100)</label>
                        <input wire:model="persentase" type="number" class="form-control" id="persentase" min="0" max="100"
                            placeholder="Persentase">@error('persentase') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
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
                <h5 class="modal-title" id="updateModalLabel">Update Realisasipembangunan</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="pembangunan_id">Pembangunan</label>
                        <select wire:model="pembangunan_id" class="form-control" id="pembangunan_id"
                            placeholder="Pembangunan Id">
                            <option value="">Pilih Pembangunan</option>
                            @foreach($pembangunans as $pembangunan)
                            <option value="{{ $pembangunan->id }}">{{ $pembangunan->nama_pembangunan }} - {{ $pembangunan->pelaksana }}</option>
                            @endforeach
                        </select>
                        @error('pembangunan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input wire:model="tanggal_mulai" type="date" class="form-control" id="tanggal_mulai"
                            placeholder="Tanggal Mulai">@error('tanggal_mulai') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input wire:model="tanggal_selesai" type="date" class="form-control" id="tanggal_selesai"
                            placeholder="Tanggal Selesai">@error('tanggal_selesai') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="persentase">Persentase (min:0, max:100)</label>
                        <input wire:model="persentase" type="number" class="form-control" id="persentase" min="0" max="100"
                            placeholder="Persentase">@error('persentase') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
