@extends('admin.app')

@section('main-section')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product List</h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="productListDatatable">
                        <thead>
                            <tr>
                                <th>Product Img</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
