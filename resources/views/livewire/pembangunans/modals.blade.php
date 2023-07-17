<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Tambah Data Pembangunan</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="jenispembangunan_id">Jenis Pembangunan</label>
                        <select wire:model="jenispembangunan_id" class="form-control" id="jenispembangunan_id" placeholder="Jenis Pembangunan">
                            <option value="">--Pilih Jenis Pembangunan--</option>
                            @foreach ($jenispembangunans as $jenispembangunan)
                            <option value="{{ $jenispembangunan->id }}">{{ $jenispembangunan->nama_jenis }}</option>
                            @endforeach
                        </select>
                        @error('jenispembangunan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pembangunan">Nama Pembangunan</label>
                        <input wire:model="nama_pembangunan" type="text" class="form-control" id="nama_pembangunan" placeholder="Nama Pembangunan">@error('nama_pembangunan') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <textarea wire:model="lokasi" type="text" class="form-control" id="lokasi" placeholder="Lokasi"></textarea>@error('lokasi') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya</label>
                        <input wire:model="total_biaya" type="number" class="form-control" id="total_biaya" placeholder="Total Biaya">@error('total_biaya') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <select wire:model="sumber_dana" class="form-control" id="sumber_dana" placeholder="Sumber Dana">
                            <option value="">--Pilih Sumber Dana--</option>
                            @foreach ($sumberdanas as $sumber_dana)
                            <option value="{{ $sumber_dana->id }}">{{ $sumber_dana->nama_sumber }} ({{ $sumber_dana->keterangan }})</option>
                            @endforeach
                        </select>
                        @error('sumber_dana') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pelaksana">Pelaksana</label>
                        <input wire:model="pelaksana" type="text" class="form-control" id="pelaksana" placeholder="Ex. CV. INI ITU">@error('pelaksana') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea wire:model="deskripsi" type="text" class="form-control" id="deskripsi" placeholder="deskripsi"></textarea>@error('deskripsi') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="berkas">Berkas (Jika ada)</label>
                        <input wire:model="berkas" type="file" class="form-control" id="berkas" placeholder="Berkas">@error('berkas') <span class="error text-danger">{{ $message }}</span> @enderror
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
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pembangunan</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="jenispembangunan_id">Jenis Pembangunan</label>
                        <select wire:model="jenispembangunan_id" class="form-control" id="jenispembangunan_id" placeholder="Jenis Pembangunan">
                            <option value="">--Pilih Jenis Pembangunan--</option>
                            @foreach ($jenispembangunans as $jenispembangunan)
                            <option value="{{ $jenispembangunan->id }}">{{ $jenispembangunan->nama_jenis }} ({{ $sumber_dana->keterangan }})</option>
                            @endforeach
                        </select>
                        @error('jenispembangunan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pembangunan">Nama Pembangunan</label>
                        <input wire:model="nama_pembangunan" type="text" class="form-control" id="nama_pembangunan" placeholder="Nama Pembangunan">@error('nama_pembangunan') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <textarea wire:model="lokasi" type="text" class="form-control" id="lokasi" placeholder="Lokasi"></textarea>@error('lokasi') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya</label>
                        <input wire:model="total_biaya" type="number" class="form-control" id="total_biaya" placeholder="Total Biaya">@error('total_biaya') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <select wire:model="sumber_dana" class="form-control" id="sumber_dana" placeholder="Sumber Dana">
                            <option value="">--Pilih Sumber Dana--</option>
                            @foreach ($sumberdanas as $sumber_dana)
                            <option value="{{ $sumber_dana->id }}">{{ $sumber_dana->nama_sumber }}</option>
                            @endforeach
                        </select>
                        @error('sumber_dana') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pelaksana">Pelaksana</label>
                        <input wire:model="pelaksana" type="text" class="form-control" id="pelaksana" placeholder="Ex. CV. INI ITU">@error('pelaksana') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea wire:model="deskripsi" type="text" class="form-control" id="deskripsi" placeholder="deskripsi"></textarea>@error('deskripsi') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="berkas">Berkas (Jika ada)</label>
                        <input wire:model="berkas" type="file" class="form-control" id="berkas" placeholder="Berkas">@error('berkas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
