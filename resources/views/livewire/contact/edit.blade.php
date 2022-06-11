<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <form wire:submit.prevent="update">
                        <h4 class="d-flex align-items-center my-3 text-primary">
                            <i class="ri-home-2-line me-1"></i>
                            Informasi Kontak
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-input name="nickname" wire:model.defer="nickname" placeholder="Nama Panggilan" label="Nama Panggilan" type="text" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Tipe Kontak</label>
                                <div class="form-group mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contact_type" wire:model.defer="contact_type" type="checkbox" id="customer" value="Customer">
                                        <label class="form-check-label" for="customer">Customer</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contact_type" wire:model.defer="contact_type" type="checkbox" id="supplier" value="Supplier">
                                        <label class="form-check-label" for="supplier">Supplier</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contact_type" wire:model.defer="contact_type" type="checkbox" id="karyawan" value="Karyawan">
                                        <label class="form-check-label" for="karyawan">Karyawan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="contact_type" wire:model.defer="contact_type" type="checkbox" id="lainnya" value="Lainnya">
                                        <label class="form-check-label" for="lainnya">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-textarea wire:model.defer="other_details" name="other_details" placeholder="Masukan Info Lainnya" label="Info Lainnya" type="text" />
                                </div>
                            </div>
                        </div>
                        <h4 class="d-flex align-items-center my-3 text-primary">
                            <i class="ri-briefcase-2-line me-1"></i>
                            Informasi Umum
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Nama Depan" wire:model.defer="first_name" name="first_name" label="Nama Depan" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input  placeholder="Masukan Nama Belakang" wire:model.defer="last_name" name="last_name" label="Nama Belakang" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Handphone" wire:model.defer="handphone" name="handphone" label="Handphone" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input type="email" placeholder="Masukan Email" wire:model.defer="email" name="email" label="Email" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <x-form-select placeholder="Pilih Jenis Identitas" wire:model.defer="id_type" name="id_type" label="Jenis Identitas">
                                        <option value="">Pilih Jenis Identitas</option>
                                        <option value="SIM">SIM</option>
                                        <option value="KTP">KTP</option>
                                        <option value="Passport">Passport</option>
                                    </x-form-select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Nomor Identitas" wire:model.defer="identity_number" name="identity_number" label="Nomor Identitas" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-input name="company_name" wire:model.defer="company_name" placeholder="Masukan Nama Perusahaan" label="Nama Perusahaan" type="text" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-input name="npwp" wire:model.defer="npwp" placeholder="Masukan NPWP" label="NPWP" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input name="telepon" wire:model.defer="telepon" placeholder="Masukan Nomor Telepon" label="Nomor Telepon" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input name="fax" wire:model.defer="fax" placeholder="Masukan Nomor Fax" label="Nomor Fax" type="text" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-textarea name="address" wire:model.defer="address" placeholder="Masukan Alamat" label="Alamat" type="text" />
                                </div>
                            </div>
                        </div>
                        <h4 class="d-flex align-items-center my-3 text-primary">
                            <i class="ri-bank-line me-1"></i>
                            Informasi Bank
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Nama Bank" wire:model.defer="bank_name" name="bank_name" label="Nama Bank" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Kantor Cabang" wire:model.defer="branch_office" name="branch_office" label="Kantor Cabang" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Nama Pemiliki" wire:model.defer="account_owner" name="account_owner" label="Pemilik Rekening" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-input placeholder="Masukan Nomor Rekening" wire:model.defer="bank_account_number" name="bank_account_number" label="Nomor Rekening" />
                                </div>
                            </div>
                        </div>
                        <h4 class="d-flex align-items-center my-3 text-primary">
                            <i class="ri-wallet-3-line me-1"></i>
                            Integrasi Akun
                        </h4>
                        <div class="row">
                            <div class="col-md-6" wire:ignore>
                                <x-form-select placeholder="Pilih Akun" class="form-select" wire:model.defer="debit_account" id="debet-account" name="debet_account" label="Akun Piutang">
                                    <option value="">Pilih Akun</option>
                                    @foreach($chart_of_accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col-md-6" wire:ignore>
                                <x-form-select placeholder="Pilih Akun" class="form-select" wire:model.defer="credit_account" id="credit-account" name="credit_account" label="Akun Piutang">
                                    <option value="">Pilih Akun</option>
                                    @foreach($chart_of_accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                        </div>

                        <div class="form-group my-4">
                            <button class="btn btn-primary btn-border float-end d-flex w-md align-items-center">
                                <i class="ri-save-2-line me-1"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#debet-account').select2({
            theme: "bootstrap-5",
            dropdownCssClass: "select2--small",
        }).on('change', function (event){
            @this.set('debit_account', event.target.value)
        });

        $('#credit-account').select2({
            theme: "bootstrap-5",
            dropdownCssClass: "select2--small",
        }).on('change', function (event){
            @this.set('credit_account', event.target.value)
        });

        Livewire.onLoad(function (event){
            $('#debet-account').val(@this.debit_account).trigger('change');
            $('#credit-account').val(@this.credit_account).trigger('change');
        })
    </script>
@endpush
