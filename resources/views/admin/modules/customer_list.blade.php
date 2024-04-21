@extends('admin.app')

@section('main-section')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customer List</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="customerListDatatable">
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
