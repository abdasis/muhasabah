<ul class="list-inline hstack gap-2 p-0 my-0">
    @if(!empty($edit))
        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Sunting">
            <a href="{{$edit}}" class="text-muted d-inline-block">
                <i class="ri-edit-line fs-16"></i>
            </a>
        </li>
    @endif
    @if(!empty($delete))
        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Hapus">
            <a wire:click.prevent="delete({{$delete}})" href="javascript:void(0);" class="text-danger d-inline-block">
                <i class="ri-delete-bin-5-line fs-16"></i>
            </a>
        </li>
    @endif
    {{--<li class="list-inline-item">
        <div class="dropdown">
            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ri-more-fill align-middle"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item view-item-btn" href="javascript:void(0);"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a></li>
                <li><a class="dropdown-item edit-item-btn" href="#showModal" data-bs-toggle="modal"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                <li><a class="dropdown-item remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
            </ul>
        </div>
    </li>--}}
</ul>
