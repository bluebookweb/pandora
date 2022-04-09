@extends('admin.layouts.app')
@section('title', 'InventoryModel Categories')
@section('content')
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('inventory-category.create') }}" class="btn bg-gradient-primary m-0 ms-2">Add inventory
            category</a>
    </div>
    <div class="card">
        @if ($products->total())
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Type of inventory
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Thumbnail of category
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Snap to floor
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>
                                <a href="{{ route('inventory-category.edit', $item) }}"
                                   class="text-xs font-weight-bold mb-0">{{ $item->name }}</a>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if ($item->type == 'vertical')
                                    <span class="badge badge-sm badge-success">vertical</span>
                                @else
                                    <span class="badge badge-sm badge-success">horizontal</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('inventory-category.edit', $item) }}"
                                   class="text-xs font-weight-bold mb-0">
                                    @if (empty($item->thumb))
                                        <p class="categories-bg"
                                           style="background-image: url({{ asset('img/default-thumbnail.jpg') }})"></p>
                                    @else
                                        <p class="categories-bg"
                                           style="background-image: url({{ Storage::url($item->thumb) }})"></p>
                                    @endif
                                </a>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span
                                class="badge badge-sm @if($item->snap_floor == 1) badge-success @else badge-danger @endif">Snap to floor</span>
                            </td>
                            <td class="align-middle form-action-block">
                                <a href="{{ route('inventory-category.edit', $item) }}"
                                   class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                   data-original-title="Edit user">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="{{ route('inventory-category.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirmation()"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-products">
                <span>Any products displayed yet.</span>
            </div>
        @endif
    </div>
    <div class="admin-pagination">
        {{ $products->links() }}
    </div>
    @if(Session::has('msg'))
        <div class="error-block">
            {{ Session::get('msg') }}
        </div>
    @endif
@endsection

@section('extra-js')
    <script>
        function confirmation() {
            return confirm('Confirm to delete?');
        }
    </script>
@stop
