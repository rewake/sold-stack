<x-app-layout>

    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Datatable</h3>
                        <p class="text-sm mb-0">
                            This is an exmaple of datatable using the well known datatables.net plugin. This is a
                            minimal setup in order to get started fast.
                        </p>
                    </div>

                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Style</th>
                                    <th scope="col" class="sort" data-sort="status">Brand</th>
                                    <th scope="col">SKU(s)</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">
{{--                                    @dump($products)--}}
                                @foreach($products as $product)
                                <tr>
                                    <th scope="row">
                                        <span class="name mb-0 text-sm">{{ $product->product_name }}</span>
                                    </th>
                                    <td>{{ $product->style }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>
                                        @foreach($product->inventory as $inventory)
                                            <button type="button" class="btn btn-outline-primary btn-sm" disabled>{{ $inventory->sku }}</button>
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            {{ $products->links() }}
                        </div>
                    </div>

                </div>
            </div>

            <x-slot name="scripts">
                <script type="application/javascript">
                    $(document).ready(function () {
                        $('#datatable-basic').DataTable();
                    });
                </script>
            </x-slot>

</x-app-layout>
