<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Brands</title>
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
            <div class="row" style="margin-top: 20px">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="categoryForm">
                                @csrf
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="inputPassword4" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" disabled>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-4">
                                        <label for="inputState" class="form-label">Active</label>
                                        <select id="active" class="form-select" name="active">
                                            <option>Not Found</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="create_brands();" class="btn btn-primary">Create</button>
                                <a href="{{route('brands.index')}}" class="btn btn-primary" style="margin-left: 20px;">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include("admins.include.footer")
        </div>
    </div>
    @include("admins/include/right_sidebar")
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    <script>
        function create_brands() {
            const name = document.getElementById("name").value;
            const slug = document.getElementById("slug").value;
            const active = document.getElementById('active').value
            var formData = new FormData();
            formData.append('name', name);
            formData.append('slug', slug);
            formData.append('active', active);
            if (name == "" || slug == "" || active == "Not Found") {
                alert("aaaaaaaaaaaaa");
            } else {
                $.ajax({
                    url: "{{ route('brands.store') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        window.location = "{{route('brands.index')}}";
                    },
                    error: function(xhr, status, error) {
                        console.log("Error for Create Category");
                    }
                });
            }
        }
    </script>
    <script>
        $("#name").change(function() {
            element = $(this);
            $.ajax({
                url: "{{route('getslug')}}",
                type: "get",
                data: {
                    title: element.val(),
                },
                dataType: "json",
                success: function(data) {
                    if (data["status"] == true) {
                        $("#slug").val(data['slug']);
                    }
                }
            });
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
