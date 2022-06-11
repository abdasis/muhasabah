<div>
    {{-- Be like water. --}}
    <div class="card">
        <div class="card-header border-0">
            <h4 class="card-title align-items-center d-flex">
                <i class="ri-contacts-book-2-line me-1"></i>
                Semua Kontak
            </h4>
            <p class="card-subtitle text-muted mb-0">Berikut adalah data selengkapnya untuk setiap jenis contact yang sudah tersimpan</p>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-5 nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#customer" role="tab" aria-selected="true">
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#supplier" role="tab" aria-selected="false">
                        Suppliers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#employee" role="tab" aria-selected="false">
                        Karyawan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#other" role="tab" aria-selected="true">
                        Lainnya
                    </a>
                </li>
            </ul>
            <div class="tab-content  text-muted">
                <div class="tab-pane active" id="customer" role="tabpanel">
                    <livewire:contact.customer-table/>
                </div>
                <div class="tab-pane" id="supplier" role="tabpanel">
                    <livewire:contact.supplier-table/>
                </div>
                <div class="tab-pane" id="employee" role="tabpanel">
                    <livewire:contact.employee-table/>
                </div>
                <div class="tab-pane" id="other" role="tabpanel">
                    <livewire:contact.other-table/>
                </div>
            </div>
        </div>
    </div>
</div>
