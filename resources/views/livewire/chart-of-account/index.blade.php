<div>
    {{-- Be like water. --}}
    <div class="card">
        <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h5 class="card-title d-flex align-items-center">
                <i class="ri-survey-line me-1"></i>
                Data Semua Akun Biaya
            </h5>
            <a href="{{route('chart-of-account.create')}}">
                <button class="btn btn-primary d-flex justify-items-center">
                    <i class="ri-add-circle-line me-1"></i>
                    Account Biaya Baru
                </button>
            </a>
        </div>
        <div class="card-body">
            <livewire:chart-of-account.table/>
        </div>
    </div>
</div>
