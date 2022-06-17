<div>
    {{-- Stop trying to control. --}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-md-8">
                    <div class="title d-flex justify-content-between justify-items-center mb-2">
                        <h4 class="d-flex justify-items-center">
                            <i class="ri-inbox-archive-line me-1"></i>
                            Informasi
                        </h4>
                        <small>
                            Product Terakhir di perbarui pada Tanggal {{ $product->updated_at->format('d/M/Y') }}
                        </small>
                    </div>
                    <div class="my-3">
                        @if(!empty($product->images))
                            <!-- Rounded Image -->
                            <img class="rounded img-thumbnail" width="200" src="{{ asset('products') . '/' . $product->images }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('storage/no-image.png') }}" alt="{{ $product->name }}" class="img-fluid">
                        @endif
                    </div>
                    <table class="table table-striped">
                        <tr class="">
                            <td class="text-nowrap">Nama Product</td>
                            <td>:</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <td>SKU</td>
                            <td>:</td>
                            <td>{{$product->sku}}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>{{$product->categories->pluck('name')->implode(', ')}}</td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td>{{$product->unit}}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{$product->description}}</td>
                        </tr>
                    </table>
                    <div class="row my-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                            <i class="ri-calendar-todo-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Ditambah Pada:</p>
                                        <h5 class="mb-0">{{$product->created_at->format('d/m/Y')}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                            <i class="ri-file-copy-2-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Terkahir Diubah :</p>
                                        <h5 class="mb-0">{{$product->updated_at->format('d/m/Y')}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-success fs-24">
                                            <i class="ri-stack-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Total Transaksi</p>
                                        <h5 class="mb-0">340</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-danger btn-border">
                            <i class="ri-trash-line"></i>
                            Hapus
                        </button>
                        <a href="{{route('products.edit', $product)}}">
                            <button class="btn btn-warning btn-border">
                                <i class="ri-edit-2-line"></i>
                                Sunting
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 p-5">
                    <div class="card border-dashed bg-light shadow-none">
                        <div class="card-header d-flex justify-items-center border-0 bg-light border-bottom border-dashed">
                            <h5 class="card-title">
                                <i class="ri-shopping-cart-2-line"></i>
                                Penjualan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="sale-account mb-3">
                                <p class="m-0 p-0">Akun Penjualan</p>
                                <h5 class="m-0 p-0">{{$product->saleAccount->name}}</h5>
                            </div>
                            <div class="sale-price">
                                <p class="m-0 p-0">Harga Jual</p>
                                <h5 class="m-0 p-0">{{rupiah($product->sales_price)}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card border-dashed border-dark bg-light shadow-none">
                        <div class="card-header d-flex justify-items-center bg-light border-bottom-dashed">
                            <h5 class="card-title">
                                <i class="ri-price-tag-3-line"></i>
                                Pembelian
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="sale-account mb-3">
                                <p class="m-0 p-0">Akun Pembelian</p>
                                <h5 class="m-0 p-0">{{$product->purchaseAccount->name}}</h5>
                            </div>
                            <div class="sale-price">
                                <p class="m-0 p-0">Harga Beli</p>
                                <h5 class="m-0 p-0">{{rupiah($product->purchase_price)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-items-center">
                <i class="ri-shopping-cart-line me-1"></i>
                Transaksi Terakhir
            </h5>
        </div>
    </div>
</div>
