<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create category</title>
    @include("admins/include/head")
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
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
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Category</label>
                                        <select id="categories_id" name="categories_id" class="form-select">
                                            <option>Not Found</option>
                                        </select>
                                    </div>
                                </div>
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
                                        <select id="active" name="active" class="form-select">
                                            <option>Not Found</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="create_category();" class="btn btn-primary">Create</button>
                                <a href="{{route('sub.index')}}" class="btn btn-primary" style="margin-left: 20px;">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include("admins.include.footer")
        </div>
    </div>
    @include("admins/include/right_sidebar")
    @include("admins.sub_category.alert")
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    <script>
        $.ajax({
            url: "{{route('categories.get')}}",
            type: "get",
            dataType: "json",
            success: function(data) {
                $('#categories_id').find("option").not(":first").remove();
                $.each(data['categories'], function(key, item) {
                    $('#categories_id').append(`<option value='${item.id}'>${item.name}</option>`)
                });
            }
        });

        function create_category() {
            const create_sub_categories = new bootstrap.Modal(document.getElementById('create_sub_categories'));
            const categories_id = document.getElementById("categories_id").value;
            const name = document.getElementById("name").value;
            const slug = document.getElementById("slug").value;
            const active = document.getElementById("active").value;
            var formData = new FormData();
            formData.append('name', name);
            formData.append('slug', slug);
            formData.append('active', active);
            formData.append('categories_id', categories_id);
            if (category == "Not Found" || name == "" || slug == "" || active == "Not Found") {
                create_sub_categories.show();
            } else {
                $.ajax({
                    url: "{{ route('sub.store') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        window.location = "{{route('sub.index')}}";
                    },
                    error: function(xhr, status, error) {
                        console.log("Error for Create Category");
                    }
                });
            }
        }
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
