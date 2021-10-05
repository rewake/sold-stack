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
                                <h2 class="mb-0">Inventory</h2>
                                <p class="text-sm mb-0">
                                    This is a list of your current inventory. Please use the filters below to navigate this list.
                                </p>
                            </div>

                            <div class="col-3 text-right mt-1">
                                <a href="{{ route('inventory.create') }}" class="btn btn-success" disabled>Add Inventory Record</a>
                            </div>
                        </div>
                    </div>

                    @if($products->hasPages())
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 pt-2 text-primary">
                                    Page {{ $products->currentPage() }} of {{ $products->lastPage() }} <span class="text-light">/</span>
                                    {{ $products->perPage() }} per page <span class="text-light">/</span>
                                    {{ number_format($products->total()) }} item(s) total
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
                                    <th scope="col">Product Name</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Cost</th>
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
                                        <input class="form-control form-control-sm" name="sku" type="text" value="{{ request('sku') }}"/>
                                    </th>
                                    <th>
{{--                                        <input class="form-control form-control-sm" name="brand" type="text" value="{{ request('brand') }}"/>--}}
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" name="color" type="text" value="{{ request('color') }}"/>
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" name="size" type="text" value="{{ request('size') }}"/>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-right">
                                        <button class="btn btn-sm btn-outline-primary active" type="submit">Apply Filter(s)</button>
                                        <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-outline-primary active">Clear All</a>
                                    </th>
                                </tr>
                                </form>
                                </thead>

                                @foreach($products as $product)

                                    <tr>
                                        <th scope="row">
                                            <span class="name mb-0 text-sm">{{ $product->product_name }}</span>
                                        </th>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm float-left mb-1" disabled>{{ $product->sku }}</button>
                                        </td>
                                        <td class="text-right">{{ number_format($product->quantity) }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>{{ $product->size }}</td>
                                        <td class="text-right">${{ number_format($product->price_cents / 100, 2) }}</td>
                                        <td class="text-right">${{ number_format($product->cost_cents / 100, 2) }}</td>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-primary" disabled>Edit</button>
                                            <button type="button" class="btn btn-danger" disabled>Delete</button>
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
                                    {{ number_format($products->total()) }} item(s) total
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

</x-app-layout>
