<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{asset('admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    @include("admins.include.head")
</head>

<body>
    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        @include("admins.include.topbar")
        @include("admins.include.left_sidebar")
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="d-flex">
                                        <a class="btn btn-success" href="{{route('products.create')}}">Create Products</a>
                                    </form>
                                </div>
                                <h4 class="page-title">Preloader</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table striped dt-responsive nowrap w-100 table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Compare_price</th>
                                                <th>SKU</th>
                                                <th>SLUG</th>
                                                <th>Status</th>
                                                <th>Acction</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key=>$data)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td style="display: flex;align-items: center;justify-content: center;margin: 30px;padding: 10px;">
                                                    @foreach ($data->products_image as $products_image )
                                                    <img src="{{ asset('images/' . $products_image->image) }}" alt="" style="height: 38px;border-radius: 2px;">
                                                    @endforeach
                                                </td>
                                                <td>{{$data->title}}</td>
                                                <td>{{$data->price}}$</td>
                                                <td>{{$data->compare_price}}$</td>
                                                <td>{{$data->aku}}</td>
                                                <td>{{$data->slug}}</td>
                                                <td>{{$data->status == '1' ? 'enable' : 'disable' }}</td>
                                                <td style="margin: 30px;padding: 10px;">
                                                    <button type="button" value="{{$data->id}}" class="btn btn-outline-danger delete_productd" data-bs-toggle="modal" data-bs-target="#centermodal">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                    <button type="button" value="{{$data->id}}" class="btn btn-outline-secondary products_id" data-bs-toggle="modal" data-bs-target="#fullscreeexampleModal">
                                                        <i class="ri-ball-pen-line"></i>
                                                    </button>
                                                </td>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include("admins.include.footer")
        </div>
    </div>
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/demo.datatable-init.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    @include("admins.include.right_sidebar")
    @include("admins.products.delete")
    @include("admins.products.update")
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body>

</html>
