<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-5 my-5">
                    <form wire:submit.prevent="update">
                        <div class="form-group mb-3">
                            <x-form-input name="name" placeholder="Masukan Nama Akun" label="Nama Biaya" wire:model.defer="name" />
                        </div>
                        <div class="form-group mb-3">
                            <x-form-input name="code" id="code" label="Kode Biaya" placeholder="Masukan Kode" wire:model.defer="code" />
                        </div>

                        <div class="form-group mb-3" wire:ignore>
                            <x-form-select class="form-select" name="category_id" id="category_id" label="Kategori" placeholder="Pilih Kategori">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </x-form-select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-select name="report_type" wire:model.defer="report_type" label="Jenis Laporan">
                                        <option value="">Pilih Jenis Laporan</option>
                                        <option value="neraca">Neraca</option>
                                        <option value="rugi laba">Rugi Laba</option>
                                    </x-form-select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-select name="default_balance" wire:model.defer="default_balance" name="default_balance" label="Tipe Saldo">
                                        <option value="">Pilih Tipe Saldo</option>
                                        <option value="kredit">Credit</option>
                                        <option value="debit">Debit</option>
                                    </x-form-select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <x-form-textarea label="Deskripsi" wire:model.defer="description" placeholder="Masukan Deskripsi" name="description"  />
                        </div>
                        <div class="form-group mb-3 d-flex  justify-content-between" >
                            <button wire:click.prevent="setLockStatus" type="button" class="btn btn-{{$lock_status == 'unlocked' ? 'success' : 'danger'}} btn-border d-flex align-items-center float-end w-md">
                                @if($lock_status == 'locked')
                                    <i class="ri-lock-2-fill me-1"></i>
                                @else
                                    <i class="ri-lock-unlock-fill me-1"></i>
                                @endif
                                {{$lock_status}}
                            </button>

                            <button class="btn btn-primary btn-border float-end w-md">
                                <i class="ri-save-line me-1"></i>
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
        $('#category_id').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--large',
        }).on('change', function (event){
            @this.set('category_id', event.target.value)
        })

        Livewire.onLoad((data) => {
            $('#category_id').val(@this.category_id).trigger('change')
            $('#code').val(@this.code)

        })
    </script>
@endpush
