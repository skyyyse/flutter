<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create users</title>
    @include("admins/include/head")
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        @include("admins/include/topbar")
        @include("admins/include/left_sidebar")
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="" method="post" id="add_user">
                                                    @csrf
                                                    <div>
                                                        <div class="row g-2">
                                                            <div class="mb-3 col-md-2">
                                                                <label for="inputEmail4" class="form-label">Full Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                                <label for="inputState" class="form-label">Gender</label>
                                                                <select id="gender" name="gender" class="form-select">
                                                                    <option>Choose</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="mb-3 col-md-4">
                                                                <label for="inputEmail4" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label for="inputPassword4" class="form-label">Phone</label>
                                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="mb-3 col-md-2">
                                                                <label for="inputState" class="form-label">Province</label>
                                                                <select id="province" name="province" class="form-select">
                                                                    <option>Select province</option>
                                                                    @if ($province->isNotEmpty())
                                                                    @foreach ($province as $data )
                                                                    <option value="{{$data->id}}">{{$data->province_khmer}}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-2" style="margin-left: 20px;">
                                                                <label for="inputState" class="form-label">District</label>
                                                                <select id="district" name="district" class="form-select">
                                                                    <option value="">Select district</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-2" style="margin-left: 20px;">
                                                                <label for="inputState" class="form-label">Commune</label>
                                                                <select id="commune" name="commune" class="form-select">
                                                                    <option value="">Select commune</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-2" style="margin-left: 20px;">
                                                                <label for="inputState" class="form-label">Village</label>
                                                                <select id="village" name="village" class="form-select">
                                                                    <option value="">Select village</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputAddress" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" disabled>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="mb-3 col-md-4">
                                                                <label for="inputEmail4" class="form-label">Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                                                    <div class="input-group-text" data-password="false">
                                                                        <span class="password-eye"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label for="inputEmail4" class="form-label">Confirm Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                                                    <div class="input-group-text" data-password="false">
                                                                        <span class="password-eye"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="mb-3 col-md-2">
                                                                <label for="inputState" class="form-label">Role</label>
                                                                <select id="select" name="select" class="form-select">
                                                                    <option>Choose</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="0">User</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate" style="margin-bottom: 20px;">
                                                        <div class="fallback">
                                                            <input name="fileInput" type="file" id="fileInput" onchange="showImagePreview(this)" style="display: none;" />
                                                        </div>
                                                        <div class="dz-message needsclick">
                                                            <label for="fileInput">
                                                                <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                                <h3>Drop files here or click to upload.</h3>
                                                                <span class="text-muted fs-13">(This is just a demo dropzone. Selected files are<strong>not</strong> actually uploaded.)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone-previews mt-3" id="file-previews"></div>
                                                    <div class="card mb-0 shadow-none border mb-3" id="imagePreview" style="display: none;">
                                                        <div class="p-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="avatar-sm">
                                                                        <img src="#" alt="Uploaded Image" id="uploadedImage" style="max-width: 50px;border-radius: 5px;">
                                                                    </div>
                                                                </div>
                                                                <div class="col ps-0">
                                                                    <a href="javascript:void(0);" class="text-muted fw-bold" id="imageName"></a>
                                                                    <p class="mb-0" id="imageSize"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" onclick="create_user()">Create users</button>
                                                    <a href="{{route('user.index')}}" class="btn btn-primary" style="margin-left: 10px;">Back</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include("admins.include.footer")
        </div>
    </div>
    @include(" admins/include/right_sidebar")
    @include("admins.user.javascript")
    @include("admins.user.alert")
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
    <script>
        function showImagePreview(input) {
            const imagePreview = document.getElementById('imagePreview');
            const uploadedImage = document.getElementById('uploadedImage');
            const imageName = document.getElementById('imageName');
            const imageSize = document.getElementById('imageSize');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
                imageName.textContent = input.files[0].name;
                imageSize.textContent = (input.files[0].size / 1024).toFixed(2) + ' KB';
                imagePreview.style.display = 'block';
            } else {
                imagePreview.style.display = 'none';
            }
        }

        function create_user() {
            const modal = new bootstrap.Modal(document.getElementById('centermodal'));
            const forgot_password = new bootstrap.Modal(document.getElementById('forgot_password'));
            const name = document.getElementById('name').value;
            const gender = document.getElementById('gender').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;
            const password = document.getElementById('password').value;
            const confirm_password = document.getElementById('confirm_password').value;
            const select = document.getElementById('select').value;
            const fileInput = document.getElementById('fileInput').files[0];
            var formData = new FormData();
            formData.append('name', name);
            formData.append('gender', gender);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('address', address);
            formData.append('password', password);
            formData.append('select', select);
            formData.append('fileInput', fileInput);
            if (name == "" || gender == "Choose" || email == "" || phone == "" || address == "" || password == "" || select == "Choose" || !fileInput) {
                modal.show();
            } else if (password != confirm_password) {
                forgot_password.show();
            } else {
                $.ajax({
                    url: "{{ route('user.store') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        window.location = "{{route('user.index')}}";
                    },
                });
            }
        }
        $("#province").change(function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('user.district')}}",
                type: "get",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    console.log('111111111111111111');
                    $('#district').find("option").not(":first").remove();
                    $.each(data['district'], function(key, item) {
                        $('#district').append(`<option value='${item.id}'>${item.district_khmer}</option>`)
                    });
                }
            });
        });
        $("#district").change(function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('user.commune')}}",
                type: "get",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#commune').find("option").not(":first").remove();
                    $.each(data['commune'], function(key, item) {
                        $('#commune').append(`<option value='${item.id}'>${item.commune_khmer}</option>`)
                    });
                }
            });
        });
        $("#commune").change(function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('user.village')}}",
                type: "get",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#village').find("option").not(":first").remove();
                    $.each(data['village'], function(key, item) {
                        $('#village').append(`<option value='${item.id}'>${item.village_khmer}</option>`)
                    });
                }
            });
        });
        $("#village").change(function() {
            var province = document.getElementById("province");
            var district = document.getElementById("district");
            var commune = document.getElementById("commune");
            var village = document.getElementById("province");
            var selecte_province = province.options[province.selectedIndex].textContent;
            var selecte_district = district.options[district.selectedIndex].textContent;
            var selecte_commune = commune.options[commune.selectedIndex].textContent;
            var selecte_village = village.options[village.selectedIndex].textContent;
            const data = "អាស្រ័យដ្ធាន\tខេត្តក្រុង\t" + selecte_province + "\tស្រុក\t" + selecte_district + "\tឃំុ\t" + selecte_commune + "\tភូមិ\t" + selecte_village + "ប្រទេសកម្ពុជា";
            $("#address").val(data);
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
