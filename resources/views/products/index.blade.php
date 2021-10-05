<x-app-layout>

    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">

                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h2 class="mb-0">Products</h2>
                            <p class="text-sm mb-0">
                            This is a list of your current products. Please use the filters below to navigate this list.
                            </p>
                        </div>

                        <div class="col-3 text-right mt-1">
                            <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
                        </div>
                    </div>
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-0 role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> {{ Session::get('success') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    @if($products->hasPages())
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 pt-2 text-primary">
                                Page {{ $products->currentPage() }} of {{ $products->lastPage() }} <span class="text-light">/</span>
                                {{ $products->perPage() }} per page <span class="text-light">/</span>
                                {{ number_format($products->total()) }} product(s) total
                            </div>
                            <div class="col-6">
                                <div class="float-right mb--3">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Style</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">SKU(s)</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">

                                <thead class="thead-light">
                                <form method="get" action="#">
                                <tr>
                                    <th>
                                        <input class="form-control form-control-sm" name="product_name" type="text" value="{{ request('product_name') }}"/>
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" name="style" type="text" value="{{ request('style') }}"/>
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" name="brand" type="text" value="{{ request('brand') }}"/>
                                    </th>
                                    <th></th>
                                    <th class="text-right">
                                        <button class="btn btn-sm btn-outline-primary active" type="submit">Apply Filter(s)</button>
                                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary active">Clear All</a>
                                    </th>
                                </tr>
                                </form>
                                </thead>

                                @foreach($products as $product)
                                <tr>
                                    <th scope="row">
                                        <span class="name mb-0 text-sm">{{ $product->product_name }}</span>
                                    </th>
                                    <td>{{ $product->style }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td class="align-middle">
                                        @forelse($product->inventory as $inventory)
                                            <a href="{{ route('inventory.index') }}?sku={{ $inventory->sku }}" class="btn btn-outline-primary btn-sm float-left mb-1">{{ $inventory->sku }}</a>
                                        @empty
                                            <!-- create sku button -->
                                        @endforelse
                                    </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-primary" data-id="{{ $product->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger" data-id="{{ $product->id }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    @if($products->hasPages())
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 pt-2 text-primary">
                                Page {{ $products->currentPage() }} of {{ $products->lastPage() }} <span class="text-light">/</span>
                                {{ $products->perPage() }} per page <span class="text-light">/</span>
                                {{ number_format($products->total()) }} product(s) total
                            </div>
                            <div class="col-6">
                                <div class="float-right mb--3">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

{{--            <x-slot name="scripts">--}}
{{--                <script type="application/javascript">--}}
{{--                    $(document).ready(function () {--}}
{{--                        $('#datatable-basic').DataTable();--}}
{{--                    });--}}
{{--                </script>--}}
{{--            </x-slot>--}}

</x-app-layout>
