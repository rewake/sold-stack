<x-app-layout>

    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col">

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="mb-0">Create New Product</h3>
                                <p class="text-sm mb-0">
                                    Please use the form below to create a new Product. Fields marked with (*) are required.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="product_name" class="form-control-label">Product Name*</label>
                            <input class="form-control @error('product_name') border-danger @enderror" type="text" value="{{ old('product_name') }}" name="product_name" id="product_name">
                            @error('product_name')
                            <div class="text-danger text-sm">Please provide a valid product name.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <input class="form-control @error('description') border-danger @enderror" type="text" value="{{ old('description') }}" name="description" id="description">
                            @error('description')
                            <div class="text-danger text-sm">Please provide a valid description.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="style" class="form-control-label">Style</label>
                            <input class="form-control @error('style') border-danger @enderror" type="text" value="{{ old('style') }}" name="style" id="style">
                            @error('style')
                            <div class="text-danger text-sm">Please provide a valid style.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand" class="form-control-label">Brand</label>
                            <input class="form-control @error('brand') border-danger @enderror" type="text" value="{{ old('brand') }}" name="brand" id="brand">
                            @error('brand')
                            <div class="text-danger text-sm">Please provide a valid brand.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url" class="form-control-label">URL</label>
                            <input class="form-control @error('url') border-danger @enderror" type="text" value="{{ old('url') }}" name="url" id="url">
                            @error('url')
                            <div class="text-danger text-sm">Please provide a valid url.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_type" class="form-control-label">Product Type</label>
                            <input class="form-control @error('product_type') border-danger @enderror" type="text" value="{{ old('product_type') }}" name="product_type" id="product_type">
                            @error('product_type')
                            <div class="text-danger text-sm">Please provide a valid product type.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shipping_price" class="form-control-label">Shipping Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input class="form-control @error('shipping_price') border-danger @enderror" type="number" step="0.01" value="{{ old('shipping_price') }}" name="shipping_price" id="shipping_price">
                            </div>
                            @error('shipping_price')
                            <div class="text-danger text-sm">Please provide a valid shipping price.</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note" class="form-control-label">Note</label>
                            <input class="form-control @error('note') border-danger @enderror" type="text" value="{{ old('note') }}" name="note" id="note">
                            @error('note')
                            <div class="text-danger text-sm">Please provide a valid note.</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-left">
                            <button class="btn btn-success">Save Product</button>
                        </div>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
