@extends('admin.app')

@section('main-section')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Vendor List</h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="vendorListDatatable">
                        <thead>
                            <tr>
                                <th>Profile Pic</th>
                                <th>FullName</th>
                                <th>Email ID</th>
                                <th>Username</th>
                                <th>Mobile No.</th>
                                <th>Address</th>
                                <th>DOB</th>
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
