<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Tambah Data Masyarakat</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input wire:model="nik" type="text" class="form-control" id="nik" placeholder="Nik">@error('nik') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input wire:model="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">@error('tempat_lahir') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input wire:model="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">@error('tanggal_lahir') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select wire:model="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Jenis Kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea wire:model="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>@error('alamat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input wire:model="rt" type="text" class="form-control" id="rt" placeholder="Ex. 001">@error('rt') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input wire:model="rw" type="text" class="form-control" id="rw" placeholder="Ex. 001">@error('rw') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- email dan password for login-->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model="email" type="email" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input wire:model="password" type="password" class="form-control" id="password" placeholder="Password">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Masyarakat</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input wire:model="nik" type="text" class="form-control" id="nik" placeholder="Nik">@error('nik') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input wire:model="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">@error('tempat_lahir') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input wire:model="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">@error('tanggal_lahir') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select wire:model="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Jenis Kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea wire:model="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>@error('alamat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input wire:model="rt" type="text" class="form-control" id="rt" placeholder="Ex. 001">@error('rt') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input wire:model="rw" type="text" class="form-control" id="rw" placeholder="Ex. 001">@error('rw') <span class="error text-danger">{{ $message }}</span> @enderror
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
