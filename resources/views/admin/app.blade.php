<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="{{ asset('assets/css/admin-css.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    @include('admin.layouts.header')
    <div id="layoutSidenav">
        @include('admin.layouts.navbar')
        <div id="layoutSidenav_content">
            <main>
                @yield('main-section')
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

    <script src="{{asset('assets/js/custom-admin.js')}}"></script>
    <script src="{{asset('assets/js/datatables-admin.js')}}"></script>
</body>

</html>
