<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create category</title>
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
                                        <label for="inputEmail4" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="inputPassword4" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" disabled>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="inputEmail4" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
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
                                    <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
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
                                </div>
                                <button type="button" onclick="create_slider();" class="btn btn-primary">Create</button>
                                <a href="{{route('slider.index')}}" class="btn btn-primary" style="margin-left: 20px;">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include("admins.include.footer")
        </div>
    </div>
    @include("admins.include.right_sidebar")
    @include("admins.categories.alert")
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
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
        $("#title").change(function() {
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
        function create_slider() {
            const title = document.getElementById('title').value;
            const slug=document.getElementById('slug').value;
            const description=document.getElementById('description').value;
            const active=document.getElementById('active').value;
            const fileInput = document.getElementById('fileInput').files[0];
            var formData = new FormData();
            formData.append('title', title);
            formData.append('slug',slug);
            formData.append('description',description);
            formData.append('active',active);
            formData.append('fileInput', fileInput);
            $.ajax({
                url: "{{ route('slider.store') }}",
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == false) {
                        already_slug.show();
                    } else {
                        window.location = "{{route('slider.index')}}";
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error for Create Category");
                }
            });
        }
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
