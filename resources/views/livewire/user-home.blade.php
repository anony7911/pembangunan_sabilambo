@section('title', 'Home')
<div>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last text-center">
                            <img class="img-fluid" src="{{ url('/') }}/assets/img/kolaka.png" alt=""
                                style="width: 75% !important;">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success" style="text-align: justify !important;"><b>SI-PKP</b>
                                    SABILAMBO</h1>
                                <h3 class="h3" style="text-align: justify !important;">SISTEM INFORMASI PENILAIAN
                                    KELAYAKAN PEMBANGUNAN KELURAHAN SABILAMBO</h3>
                                <p class="text-justify" style="text-align: justify !important;">
                                    Sistem Informasi Penilaian Kelayakan Pembangunan Kelurahan Sabilambo (SI-PKP
                                    Sabilambo) adalah sistem informasi yang digunakan untuk melakukan penilaian
                                    kelayakan pembangunan di Kelurahan Sabilambo. Sistem ini dibuat untuk mempermudah
                                    dalam melakukan penilaian kelayakan pembangunan yang akan dilakukan di <b>Kelurahan
                                        Sabilambo Kabupaten Kolaka</b>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5" id="pembangunan">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">
                    Rencana Pembangunan
                </h1>
                <p>
                    Silahkan berikan penilaian anda terhadap rencana pembangunan berikut ini.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($pembangunans as $pembangunan)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="#">
                        @if($pembangunan->thumns == null)
                        <img src="{{ url('/') }}/assets/img/kolaka.png" class="card-img-top" alt="pembanungunan"
                            data-bs-toggle="modal" data-bs-target="#updateDataModal"
                            wire:click.prevent="edit({{ $pembangunan->id }})">
                        @else
                        <img src="{{ url('/') }}/{{ $pembangunan->thumns }}" class="card-img-top" alt="pembanungunan"
                            data-bs-toggle="modal" data-bs-target="#updateDataModal"
                            wire:click.prevent="edit({{ $pembangunan->id }})">
                        @endif
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <!-- star berdasarkan avg rata-rata -->
                                @if(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 4.9)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 4.5)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star-half-alt"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 4.0)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 3.5)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star-half-alt"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 3.0)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 2.5)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star-half-alt"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 2.0)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 1.5)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star-half-alt"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 1.0)
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @elseif(number_format($pembangunan->penilaians->avg('rata_rata'), 2) >= 0.5)
                                <i class="text-warning fa fa-star-half-alt"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @else
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                @endif
                            </li>
                            <li class="text-muted text-right">
                                {{ number_format($pembangunan->penilaians->avg('rata_rata'), 2) }}
                        </ul>
                        <a href="#" class="h2 text-decoration-none text-dark" data-bs-toggle="modal"
                            data-bs-target="#updateDataModal" wire:click.prevent="edit({{ $pembangunan->id }})">
                            {{ $pembangunan->nama_pembangunan }}
                        </a>
                        <p class="card-text" style="text-align: justify !important;">
                            <!-- batas deskripsi 100 -->
                            {{ Str::limit($pembangunan->deskripsi, 100) }}
                        </p>
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <p class="text-muted">
                                    Penilai ({{ $pembangunan->penilaians->count() }})
                                </p>
                            </li>
                            <li class="text-muted text-right">
                                @auth
                                <p class="text-center">
                                    @if($pembangunan->penilaians->where('user_id', Auth::user()->id)->count() == 0)
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createDataModal"
                                        wire:click.prevent="edit({{ $pembangunan->id }})">
                                        <!-- masyarakat_id diperoleh dari tabel masyarakat berdasarkan user_id, jika masyarakat_id ada di tabel penilaian maka  -->
                                        Beri Nilai
                                    </a>
                                    @else
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#updateDataModal"
                                        wire:click.prevent="edit({{ $pembangunan->id }})">
                                        <!-- masyarakat_id diperoleh dari tabel masyarakat berdasarkan user_id, jika masyarakat_id ada di tabel penilaian maka  -->
                                        Detail
                                    </a>
                                    @endif
                                </p>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- modal -->
        <div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1"
            role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createDataModalLabel">Form Penilaian</h5>
                        <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <!-- id calonsiswa -->
                                        <input type="hidden" wire:model="pembangunan_id">
                                        @foreach($kategoripenilaians as $kp)
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="mb-3">
                                                    <label for="field-1" class="form-label">Kategori Penilaian</label>
                                                    <input type="hidden"
                                                        wire:model="kategoripenilaian_id.{{ $loop->index }}"
                                                        value="{{ $kp->id }}">
                                                    <input type="text" class="form-control" id="field-1"
                                                        placeholder="ex. Kategori" value="{{ $kp->nama_kategori }}"
                                                        disabled>
                                                    @error('kategoripenilaian_id.' . $loop->index) <span
                                                        class="text-danger">{{
                                                    $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">Nilai</label>
                                                    <select class="form-select" id="field-2"
                                                        wire:model="nilai.{{ $loop->index }}">
                                                        <option value="">Pilih Nilai</option>
                                                        <option value="1">1 (Sangat Tidak Layak)</option>
                                                        <option value="2">2 (Tidak Layak)</option>
                                                        <option value="3">3 (Cukup Layak)</option>
                                                        <option value="4">4 (Layak)</option>
                                                        <option value="5">5 (Sangat Layak)</option>
                                                    </select>
                                                    @error('nilai.' . $loop->index) <span class="text-danger">{{ $message
                                                    }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @error('nilai') <span class="text-danger">{{ $message }}</span>@enderror
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="field-3" class="form-label">Komentar</label>
                                            <textarea class="form-control" id="field-3" rows="4"
                                                wire:model="komentar"></textarea>
                                            @error('komentar') <span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- detail pembangunan -->
                                <div class="col-md-7">
                                    <!-- h3 center header primary -->
                                    <div class="row">
                                        <h3 class="text-center bg-primary text-white pb-2 pt-2 text-uppercase">Detail
                                            Pembangunan</h3>
                                    </div>
                                    <div class="mb-3 mt-3 text-center">
                                        <div class="text-center">
                                            @if($pembangunan->thumns == null)
                                            <img src="{{ url('/') }}/assets/img/kolaka.png" class="img-fluid"
                                                width="300px" alt="pembanungunan">
                                            @else
                                            <img src="{{ url('/') }}/{{ $pembangunan->thumns }}" class="img-fluid"
                                                width="300px" alt="pembanungunan">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label fw-bold text-uppercase">Nama
                                            Pembangunan</label>
                                        <p>{{ $nama_pembangunan }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label fw-bold text-uppercase">Jenis
                                            Pembangunan</label>
                                        <p>{{ $nama_jenis }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Deskripsi</label>
                                        <p class="text-justify">{{ $deskripsi }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">lokasi</label>
                                        <p class="text-justify">{{ ucwords($lokasi) }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Total Biaya</label>
                                        <p class="text-justify">Rp. {{ number_format($total_biaya, 0, ',', '.') }}
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Sumber Dana</label>
                                        <p class="text-justify">{{ $keterangan }} ({{ ucwords($nama_sumber) }})</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Pelaksana</label>
                                        <p class="text-justify">{{ ucwords($pelaksana) }}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="cancel()" type="button" class="btn btn-secondary close-btn"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1"
            role="dialog" aria-labelledby="updateDataModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateDataModalLabel">Detail Pembangunan</h5>
                        <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row m-3">
                                <!-- detail pembangunan -->
                                <div class="col-md-12">
                                    <!-- h3 center header primary -->
                                    <div class="row">
                                        <h3 class="text-center bg-primary text-white pb-2 pt-2 text-uppercase">Detail
                                            Pembangunan</h3>
                                    </div>
                                    <div class="mb-3 mt-3 text-center">
                                        <div class="text-center">
                                            @if($pembangunan->thumns == null)
                                            <img src="{{ url('/') }}/assets/img/kolaka.png" class="img-fluid"
                                                width="300px" alt="pembanungunan">
                                            @else
                                            <img src="{{ url('/') }}/{{ $pembangunan->thumns }}" class="img-fluid"
                                                width="300px" alt="pembanungunan">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label fw-bold text-uppercase">Nama
                                            Pembangunan</label>
                                        <p>{{ $nama_pembangunan }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label fw-bold text-uppercase">Jenis
                                            Pembangunan</label>
                                        <p>{{ $nama_jenis }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Deskripsi</label>
                                        <p class="text-justify">{{ $deskripsi }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">lokasi</label>
                                        <p class="text-justify">{{ ucwords($lokasi) }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Total Biaya</label>
                                        <p class="text-justify">Rp. {{ number_format($total_biaya, 0, ',', '.') }}
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Sumber Dana</label>
                                        <p class="text-justify">{{ $keterangan }} ({{ ucwords($nama_sumber) }})</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="field-5"
                                            class="form-label fw-bold text-uppercase text-justify">Pelaksana</label>
                                        <p class="text-justify">{{ ucwords($pelaksana) }}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="cancel()" type="button" class="btn btn-secondary close-btn btn-block"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Categories of The Month -->


    <!-- Start Realisasi Pembangunan -->
    <section class="bg-light" id="realisasi">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Realisasi Pembangunan</h1>
                    <p>
                        Berikut adalah realisasi pembangunan yang telah dilakukan di Kelurahan Sabilambo.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($realisasis as $data)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100 p-3">
                        <a href="#">
                            @if($data->thumns == null)
                            <img src="{{ url('/') }}/assets/img/kolaka.png" class="card-img-top" alt="pembanungunan"
                                data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                wire:click.prevent="edit({{ $pembangunan->id }})">
                            @else
                            <img src="{{ url('/') }}/{{ $pembangunan->thumns }}" class="card-img-top" alt="pembanungunan"
                                data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                wire:click.prevent="edit({{ $pembangunan->id }})">
                            @endif
                        </a>
                        <div class="card-body">
                            <ul class="" style="list-style: none; padding: 0;">
                                <li>
                                    <!-- persentase -->
                                    <div class="progress" style="height: 30px; ">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $data->persentase }}%;"
                                            aria-valuenow="{{ $data->persentase }}"
                                            aria-valuemin="0" aria-valuemax="100"> {{ $data->persentase }}% </div>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="h2 text-decoration-none text-dark">
                                {{ $data->nama_pembangunan }}
                            </a>
                            <p class="card-text">
                                <i class="fa fa-map-marker text-success"></i>
                                {{ $data->lokasi }}
                                <br>
                                <i class="fa fa-calendar text-success"></i>
                                {{ Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }} s/d
                                {{ Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }}
                                <br>
                                <i class="fas fa-dollar-sign text-success"></i>
                                Rp. {{ number_format($data->total_biaya, 0, ',', '.') }}
                                <br>
                                <i class="fa fa-user text-success"></i>
                                {{ $data->pelaksana }}

                            </p>
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <p class="text-muted">
                                        <i class="fa fa-clock-o text-success"></i>
                                        {{ $data->created_at->diffForHumans() }}
                                    </p>
                                </li>
                                <li class="text-muted text-right">
                                    <p class="text-center"><a href="#" class="btn btn-warning">Detail</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
</div>
