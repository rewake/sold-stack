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
                                <h2 class="mb-0">Orders</h2>
                                <p class="text-sm mb-0">
                                    This is a list of your current orders. Please use the filters below to navigate this list.
                                </p>
                            </div>

                            <div class="col-3 text-right mt-1">
                                <a href="{{-- route('inventory.create') --}}" class="btn btn-success disabled" disabled>Create Order</a>
                            </div>
                        </div>
                    </div>

                    @if($orders->hasPages())
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 pt-2 text-primary">
                                    Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }} <span class="text-light">/</span>
                                    {{ $orders->perPage() }} per page <span class="text-light">/</span>
                                    {{ number_format($orders->total()) }} order(s) total
                                </div>
                                <div class="col-6">
                                    <div class="float-right mb--3">
                                        {{ $orders->links() }}
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
                                    <th scope="col">Customer</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">TxID</th>
                                    <th scope="col">Shipper</th>
                                    <th scope="col">Tracking #</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">

                                <thead class="thead-light">
                                <form method="get" action="#">
                                    <tr>
                                        <th>
                                            <input class="form-control form-control-sm" name="name" type="text" value="{{ request('name') }}"/>
                                        </th>
                                        <th>
                                            <input class="form-control form-control-sm" name="email" type="text" value="{{ request('email') }}"/>
                                        </th>
                                        <th>
                                            <input class="form-control form-control-sm" name="product_name" type="text" value="{{ request('product_name') }}"/>
                                        </th>
                                        <th>
                                            <input class="form-control form-control-sm" name="color" type="text" value="{{ request('color') }}"/>
                                        </th>
                                        <th>
                                            <input class="form-control form-control-sm" name="size" type="text" value="{{ request('size') }}"/>
                                        </th>
                                        <th>
                                            <input class="form-control form-control-sm" name="order_status" type="text" value="{{ request('order_status') }}"/>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right">
                                            <button class="btn btn-sm btn-outline-primary active" type="submit">Apply Filter(s)</button>
                                            <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-outline-primary active">Clear All</a>
                                        </th>
                                    </tr>
                                </form>
                                </thead>

                                @forelse($orders as $order)

                                    <tr>
                                        <th scope="row">
                                            <span class="name mb-0 text-sm">{{ $order->name }}</span>
                                        </th>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->color }}</td>
                                        <td>{{ $order->size }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td class="text-right">${{ number_format($order->total_cents / 100, 2) }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                        <td>{{ $order->shipper_name }}</td>
                                        <td>{{ $order->tracking_number }}</td>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-primary" disabled>Edit</button>
                                            <button type="button" class="btn btn-danger" disabled>Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11" class="text-center">
                                            No Records Found
                                        </td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                            </table>

                        </div>
                    </div>

                    @if($orders->hasPages())
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 pt-2 text-primary">
                                    Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }} <span class="text-light">/</span>
                                    {{ $orders->perPage() }} per page <span class="text-light">/</span>
                                    {{ number_format($orders->total()) }} order(s) total
                                </div>
                                <div class="col-6">
                                    <div class="float-right mb--3">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

</x-app-layout>
