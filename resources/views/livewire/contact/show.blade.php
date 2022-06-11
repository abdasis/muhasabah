<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-header border-0">
            <h5 class="card-title d-flex align-items-center">
                <i class="ri-account-pin-box-fill me-1"></i>
                Detail Contact
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 border-end">
                    <h3 class="text-center">{{$contact->full_name}}</h3>
                    <div class="d-flex justify-content-center gap-2">
                        <div class="box-office d-flex">
                            <i class="ri-home-3-fill me-1"></i>
                            <span>{{$contact->company_name}}</span>
                        </div>
                        |
                        <div class="box-telp d-flex">
                            <i class="ri-phone-line me-1"></i>
                            <span>{{$contact->handphone}}</span>
                        </div>
                    </div>
                    <table class="table table-borderless mt-3 table-responsive">
                        <tr>
                            <td>Panggilan</td>
                            <td>:</td>
                            <td>{{$contact->nickname}}</td>
                        </tr>
                        <tr>
                            <td>Handphone</td>
                            <td>:</td>
                            <td>{{$contact->handphone}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Pengenal</td>
                            <td>:</td>
                            <td>{{$contact->id_type}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Identitas</td>
                            <td>:</td>
                            <td>{{$contact->identity_number}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-7">
                    <div class="inner-box p-2">
                        <h5 class="text-primary d-flex align-items-center">
                            <i class="ri-building-line me-1"></i>
                            <span>Tentang Perusahaan</span>
                        </h5>
                        <table class="table table-borderless mt-3">
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td>:</td>
                                <td>{{$contact->company_name}}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td>{{$contact->telepon}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$contact->email}}</td>
                            </tr>
                            <tr>
                                <td>Fax</td>
                                <td>:</td>
                                <td>{{$contact->fax}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$contact->address}}</td>
                            </tr>
                        </table>
                        <h5 class="text-primary d-flex align-items-center">
                            <i class="ri-bank-line me-1"></i>
                            <span>Tentang Bank</span>
                        </h5>
                        <table class="table table-borderless mt-3">
                            <tr>
                                <td>Nama Bank</td>
                                <td>:</td>
                                <td>{{$contact->bank_name}}</td>
                            </tr>
                            <tr>
                                <td>Nama Pemilik</td>
                                <td>:</td>
                                <td>{{$contact->account_owner}}</td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>:</td>
                                <td>{{$contact->bank_account_number}}</td>
                            </tr>
                            <tr>
                                <td>Kantor Cabang</td>
                                <td>:</td>
                                <td>{{$contact->branch_office}}</td>
                            </tr>
                        </table>
                        <div class="py-3 border-top border-top-dashed border-bottom border-bottom-dashed mt-4">
                            <div class="row">

                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium">Tgl. Dibuat :</p>
                                        <h5 class="fs-15 mb-0">{{$contact->created_at->format('d F, Y')}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium">Terakhir Diperbarui :</p>
                                        <h5 class="fs-15 mb-0">{{$contact->updated_at->format('d F, Y')}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium">Dibuat Oleh :</p>
                                        <h5 class="fs-15 mb-0">{{$contact->creator->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                        <div class="badge badge-outline-success fs-12">{{$contact->status}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3 d-flex justify-content-between">
        <button wire:click.prevent="delete({{$contact->id}})" class="btn btn-border btn-danger d-flex align-items-center">
            <i class="ri-delete-bin-line me-2"></i>
            <span>Hapus</span>
        </button>
        <a href="{{route('contact.edit', $contact)}}">
            <button class="btn btn-border btn-warning waves-effect waves-light d-flex align-items-center">
                <i class="ri-edit-2-line me-2"></i>
                <span>Sunting</span>
            </button>
        </a>
    </div>
</div>
