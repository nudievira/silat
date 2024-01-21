@include('layout.head')

<style>
    .card {
        border: 1px solid #ccc;
    }

    input[disabled],
    select[disabled] {
        cursor: not-allowed;

    }

    strong {
        color: red;
    }

    .cancel {
        margin-left: 10px;

    }

    .form-group {
        margin-top: 15px
    }

    .help-block {
        color: red;
    }

    .input-delete {
        width: 50%;
        display: inline-block;
    }

    .delete-row {
        margin-left: 10px;
        display: inline-block;
    }

    .rounded-circle {
        cursor: pointer;
    }
</style>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline" style="border-radius: 0.5em;">
                <div class="card-header">
                    <h4 id="title-header" class="text">Input Data Vendor</h4>
                    <hr class="divider bg-dark" style="margin-top:0;">
                    <div class="row">
                        <div class="col text-center">
                            <span class="badge bg-dark-grey text-white rounded-circle text-md indicator-page"
                                data-page="0">1</span>
                            <span class="text-sm ml-2 value-title">Vendor</span>
                        </div>
                        <div class="col text-center">
                            <span class="badge bg-dark-grey text-white rounded-circle text-md indicator-page"
                                data-page="1">2</span>
                            <span class="text-sm ml-2 value-title">PIC</span>
                        </div>
                        <div class="col text-center hidden_import">
                            <span class="badge bg-dark-grey text-white rounded-circle text-md indicator-page"
                                data-page="2">3</span>
                            <span class="text-sm ml-2 value-title">NPWP</span>
                        </div>
                        <div class="col text-center hidden_import">
                            <span class="badge bg-dark-grey text-white rounded-circle text-md indicator-page"
                                data-page="3" id="tes">4</span>
                            <span class="text-sm ml-2 value-title">Dokumen</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-12">
                        <div class="progress" style="height: 5px;">
                            <div id="progress-bar"
                                class="progress-bar progress-bar-striped progress-bar-stripped bg-success"
                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline ">
                <div class="card-header">
                    <!-- card header -->
                </div>
                <div id="card-body" class="card-body">
                    <!-- PAGE 1 -->
                    <div id="page1" class="form-page">
                        <div class="justify-content-end px-3"
                            style="text-align: end; margin-top: 1%; margin-right: 1px">
                            <button class="next-btn btn btn-outline-secondary btn-sm data_category_customer d-none">Next
                                step</button>
                        </div>
                        <h2>Input Data Company</h2>
                        <form id="form_vendor">
                            @csrf
                            <div class="row px-3">
                                <div class="col-md-12">
                                    <div class="row justify-content-between">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="category" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="vendor_category"
                                                        id="vendor_category" required>
                                                        <option value="">Pilih Opsi</option>
                                                        @foreach ($vendor_category as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('vendor_category') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="category"
                                                    class="col-sm-4 col-form-label ">Import/Lokal</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="import" id="import">
                                                        <option value="">Pilih Opsi</option>
                                                        <option value="1"
                                                            {{ old('import') == '1' ? 'selected' : '' }}>Import
                                                        </option>
                                                        <option value="0"
                                                            {{ old('import') == '0' ? 'selected' : '' }}>Lokal
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!--  jabatan wakil -->
                                            <div class="form-group row">
                                                <label for="nib" class="col-sm-4 col-form-label ">No. Izin
                                                    Berusaha</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" inputmode="numeric"
                                                        name="no_izin" value="{{ old('no_izin') }}"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_phone" class="col-sm-4 col-form-label ">Nomor
                                                    Telepon</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" min="10" type="text"
                                                        value="{{ old('telepon') }}" name="telepon"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15)"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_fax" class="col-sm-4 col-form-label ">Fax</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" min="10" type="text"
                                                        name="fax" value="{{ old('fax') }}"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15)"
                                                        required>
                                                </div>
                                            </div>
                                            <!--  email wakil -->
                                            <div class="form-group row">
                                                <label for="company_email"
                                                    class="col-sm-4 col-form-label ">Email</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="email"
                                                        {{ old('email_company') }} name="email_company" required>
                                                </div>
                                            </div>
                                            <!--  no hp wakil -->
                                            <div class="form-group row">
                                                <label for="username"
                                                    class="col-sm-4 col-form-label ">Username</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" value="{{ old('username') }}"
                                                        name="username" type="text" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="category" class="col-sm-4 col-form-label ">Badan
                                                    Usaha</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="business_entity"
                                                        id="" required>
                                                        <option value="">Pilih Opsi</option>
                                                        <option value="PT"
                                                            {{ old('business_entity') === 'PT' ? 'selected' : '' }}>PT
                                                        </option>
                                                        <option value="CV"
                                                            {{ old('business_entity') === ' CV' ? 'selected' : '' }}>CV
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  jenis kelamnin wakil -->
                                            <div class="form-group row">
                                                <label for="company_name" class="col-sm-4 col-form-label ">Nama
                                                    Perusahaan</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="name_vendor"
                                                        value="{{ old('name_vendor') }}" maxlength="100" required>
                                                </div>
                                            </div>

                                            <!--  nama penghubung -->
                                            <div class="form-group row">
                                                <label for="company_address" class="col-sm-4 col-form-label ">Alamat
                                                    Perusahaan</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="alamat_perusahaan" required>{{ old('alamat_perusahaan') }}</textarea>
                                                </div>
                                            </div>
                                            <!--  jenis kelamnin penghubung -->
                                            <div class="form-group row">
                                                <label for="company_province"
                                                    class="col-sm-4 col-form-label ">Provinsi</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="province" id="province"
                                                        required>
                                                        <option value="">Pilih Opsi</option>
                                                        @foreach ($province as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_regencies"
                                                    class="col-sm-4 col-form-label ">Kota/Kab</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="regencies" id="regencies"
                                                        disabled required>
                                                        <option value="">Pilih Opsi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_district"
                                                    class="col-sm-4 col-form-label ">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="district" id="district"
                                                        disabled required>
                                                        <option value="0">Pilih Opsi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_village"
                                                    class="col-sm-4 col-form-label ">Kelurahan/Desa</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="village" id="village"
                                                        disabled required>
                                                        <option value="">Pilih Opsi</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider bg-dark">
                            <div class="justify-content-end px-3" style="text-align: end">
                                <button class="btn btn-outline-primary btn-sm">Selanjutnya</button>
                                <span class="btn btn-outline-primary btn-sm next-btn vendor_next d-none">Next</span>
                            </div>
                        </form>
                    </div>
                    <div id="page2" class="form-page">
                        <form id="form_pic">
                            <h2>Input Data PIC</h2>
                            <div class="row px-3">
                                <div class="col-md-12">
                                    <div class="row justify-content-between">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label ">Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name_pic" name="name_pic"
                                                        class="form-control" placeholder="Input PIC name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label ">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email_pic" name="email_pic"
                                                        class="form-control" placeholder="Input email pic" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label ">Nomor
                                                    Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="number" id="phone_pic" name="phone_pic"
                                                        class="form-control" placeholder="Input phone"
                                                        oninput="if(this.value.length > 13)this.value = this.value.slice(0, 13)" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-4 col-form-label ">Occupation</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="occupation" name="occupation"
                                                        class="form-control" placeholder="Input occupation" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4 col-form-label ">Alamat</label>
                                                <div class="col-sm-8">
                                                    <textarea id="address_pic" name="address_pic" class="form-control" placeholder="Input address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_province"
                                                    class="col-sm-4 col-form-label" >Provinsi</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="province_pic"
                                                        id="province_pic" required>
                                                        <option value="">Pilih Opsi</option>
                                                        @foreach ($province as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  jabatan penghubung -->
                                            <div class="form-group row">
                                                <label for="company_regencies"
                                                    class="col-sm-4 col-form-label ">Kota/Kab</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="regencies_pic"
                                                        id="regencies_pic" disabled required>
                                                        <option value="">Pilih Opsi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  email wakil -->
                                            <div class="form-group row">
                                                <label for="company_district"
                                                    class="col-sm-4 col-form-label ">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="district_pic"
                                                        id="district_pic" disabled required>
                                                        <option value="0">Pilih Opsi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  no hp wakil -->
                                            <div class="form-group row">
                                                <label for="company_village"
                                                    class="col-sm-4 col-form-label ">Kelurahan/Desa</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="village_pic" id="village_pic"
                                                        disabled required>
                                                        <option value="">Pilih Opsi</option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider bg-dark">
                            <div class="justify-content-end px-3" style="text-align: end">
                                <button class="btn btn-outline-primary btn-sm hidden_import data_pic">Selanjutnya</button>
                                <button class="btn btn-outline-primary btn-sm show_import data_pic"hidden>Simpan</button>
                                <span
                                    class="btn btn-outline-primary btn-sm next-btn pic_next d-none" disabled>Next</span>
                            </div>
                        </form>

                    </div>
                    <div id="page3" class="form-page">
                        <form id="form_npwp">
                            <h2>Input Data Npwp</h2>
                            <div class="container">
                                <div class="row g-2 align-items-center" style="margin-top: 3%">
                                    <div class="col-md-3">
                                        <label for="no_npwp" class="col-form-label data_npwp_disabled">No
                                            Npwp</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="npwp"
                                            value="{{ old('npwp') }}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                                            required>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center" style="margin-top: 1%">
                                    <div class="col-md-3">
                                        <label for="npwp_add" class="col-form-label">Alamat NPWP</label>
                                    </div>
                                    <div class="col-md-3">
                                        <textarea class="form-control flex-grow-1" id="value_npwp"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="add_npwp btn btn-outline-primary btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider bg-dark">

                            <div style="text-align: center; margin-top:3%" id="all_npwp">
                                <label>List Alamat NPWP</label>
                            </div>

                            <hr class="divider bg-dark">
                            <div class="justify-content-end px-3" style="text-align: end">
                                <button class="btn btn-outline-primary btn-sm">Selanjutnya</button>
                                <span class="btn btn-outline-primary btn-sm next-btn npwp_next d-none">Next</span>
                            </div>

                        </form>
                    </div>
                    <div id="page4" class="form-page">
                        <form id="document_form" enctype="multipart/form-data">
                            <h2>Input Data Npwp</h2>
                            <div class="container">

                                <div class="row g-2 align-items-center" style="margin-top: 3%">
                                    <div class="col-md-3">
                                        <label for="no_npwp" class="col-form-label">File Npwp</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="file" name="document[npwp]"
                                            accept=".pdf, image/*" required>
                                    </div>
                                </div>
                                <div class="row g-2 align-items-center" style="margin-top: 3%">
                                    <div class="col-md-3">
                                        <label for="no_npwp" class="col-form-label">NIB</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="file" name="document[nib]"
                                            accept=".pdf, image/*">
                                    </div>
                                </div>
                                <div class="row g-2 align-items-center" style="margin-top: 3%">
                                    <div class="col-md-3">
                                        <label for="no_npwp" class="col-form-label">Akta Pendirian</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="file" name="document[akta]"
                                            accept=".pdf, image/*">
                                    </div>
                                </div>
                                <div class="justify-content-end px-3" style="text-align: end">
                                    <button class="btn btn-outline-primary btn-sm data_document">Simpan</button>
                                </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.script')
@include('javascript.auth.register')
