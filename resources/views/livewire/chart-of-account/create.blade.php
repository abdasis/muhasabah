<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form wire:submit.prevent="store">
                        <div class="form-group mb-3">
                            <x-form-input name="name" label="Nama Biaya" wire:model.defer="name" />
                        </div>
                        <div class="form-group">
                            <x-form-input name="code" label="Kode Biaya" wire:model.defer="code" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
