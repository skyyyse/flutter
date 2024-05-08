<div class="modal fade" id="fullscreeexampleModal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Full Screen Modal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card border border-end-1" style="margin-top: 8px;">
                                <div class="card-body">
                                    <div class="needs-validation" novalidate>
                                        <div class="position-relative mb-3">
                                            <label class="form-label" for="validationTooltip01">Full name</label>
                                            <input type="text" name="id" id="id" value="" hidden>
                                            <input type="text" class="form-control" placeholder="Full name" id="fullname" name="fullname" />
                                        </div>
                                        <div class="position-relative mb-3">
                                            <div class="mb-3 col-md-4">
                                                <label for="inputState" class="form-label">Gender</label>
                                                <select id="gender" name="gender" class="form-select">
                                                    <option>Choose</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label class="form-label" for="validationTooltipUsername">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" />
                                            </div>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label class="form-label" for="validationTooltip03">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
                                        </div>
                                        <div class="position-relative mb-3">
                                            <div class="mb-3 col-md-4">
                                                <label for="inputState" class="form-label">Role</label>
                                                <select id="role" name="role" class="form-select">
                                                    <option>Choose</option>
                                                    <option value="1">Admin</option>
                                                    <option value="0">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5" style="margin-top: 8px;">
                            <div class="card border border-end-1">
                                <div class="card-body">
                                    <h5 class="card-title fs-16 mb-3">Attachments</h5>
                                    <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                        <div class="fallback">
                                            <input name="file" type="file" id="fileInput" class="fileInput" onchange="showImagePreview(this)" style="display: none;" />
                                        </div>

                                        <div class="dz-message needsclick">
                                            <label for="fileInput">
                                                <i class="fs-36 text-muted ri-upload-cloud-line"></i>
                                                <h4>Drop files here or click to upload.</h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="dropzone-previews mt-3" id="file-previews"></div>
                                    <div class="card mb-0 shadow-none border" id="imagePreview" style="display: none;">
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
                                                <div class="col-auto">
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                        <i class="ri-close-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-0 shadow-none border" style="margin-top: 20px;" id="cardElement">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <img src="" alt="" id="imag_data" style="max-width: 50px;border-radius: 5px;">
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <p class="text-muted fw-bold" style="margin-bottom: 0;" id="title"></p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="javascript:void(0);" class="btn btn-link fs-16 text-muted">
                                                        <i class="ri-download-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">Close</a>
                    <button type="button" onclick="update_users()" class="btn btn-primary upload">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showImagePreview(input) {
        var imagePreview = document.getElementById('imagePreview');
        var uploadedImage = document.getElementById('uploadedImage');
        var imageName = document.getElementById('imageName');
        var imageSize = document.getElementById('imageSize');
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

    function update_users() {
        const id = document.getElementById('id').value;
        const fullname = document.getElementById('fullname').value;
        const gender = document.getElementById('gender').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const role = document.getElementById('role').value;
        var formData = new FormData();
        formData.append('id', id);
        formData.append('fullname', fullname);
        formData.append('gender', gender);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('role', role);
        $.ajax({
            url: "{{ route('user.update') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                window.location.href = "{{route('user.index')}}";
            },
            error: function(xhr, status, error) {
                console.log("Error for Create Category");
            }
        });
    }
    $(document).ready(function() {
        $(document).on('click', '.update_users', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('user.find')}}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    $("#id").val(response.user.id);
                    $("#fullname").val(response.user.name);
                    $("#gender").val(response.user.gender);
                    $("#email").val(response.user.email);
                    $("#phone").val(response.user.phone);
                    $("#role").val(response.user.role);
                    var data_image = response.user.image;
                    var titleElement = document.getElementById('title');
                    titleElement.innerHTML = data_image;
                    var card = document.getElementById('cardElement');
                    var image = document.getElementById('imag_data');
                    if (data_image == null) {
                        card.style.display = 'none';
                    } else {
                        card.style.display = 'block';
                        image.src = "http://localhost:8000/images/" + data_image;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.upload', function() {
            const id = document.getElementById('id').value;
            const fileInput = document.getElementById('fileInput').files[0];
            var formData = new FormData();
            formData.append('id', id);
            formData.append('fileInput', fileInput);
            $.ajax({
                url: "{{ route('user.upload') }}",
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log("upload");
                },
                error: function(xhr, status, error) {
                    console.log("Error for Create Category");
                }
            });
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
