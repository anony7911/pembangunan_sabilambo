<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <h4><i class="feather-printer"></i>
                                    Laporan </h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form>
                            <div class="col-md-12 mb-3">
                                <select wire:model="tahun" class="form-control">
                                    <!-- tahun 2022 - 2050 -->
                                    <option value="">Pilih Tahun</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                </select>
                                @error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 mt-1">
                                <button class="btn btn-block btn-md btn-success"
                                    wire:click.prevent="cetak()">Cetak</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
