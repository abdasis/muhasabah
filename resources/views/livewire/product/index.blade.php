<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="d-flex align-items-center">
                    <i class="ri-archive-line me-1"></i>
                    Semua Produk
                </h5>
                <a href="{{route('products.create')}}" class="">
                    <button class="btn btn-primary w-md waves-effect btn-border d-flex align-items-center">
                        <i class="ri-add-circle-line me-1"></i>
                        Produk Baru
                    </button>
                </a>
            </div>
        </div>
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold active" data-bs-toggle="tab" href="#productnav-all"
                               role="tab" aria-selected="true">
                                All <span class="badge badge-soft-danger align-middle rounded-pill ms-1">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab"
                               aria-selected="false">
                                Published <span class="badge badge-soft-danger align-middle rounded-pill ms-1">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab"
                               aria-selected="false">
                                Draft
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <div id="selection-element" style="display: none;">
                        <div class="my-n1 d-flex align-items-center text-muted">
                            Select
                            <div id="select-content" class="text-body fw-semibold px-1"></div>
                            Result
                            <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal"
                                    data-bs-target="#removeItemModal">Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <livewire:product.table/>
        </div>
    </div>
</div>
