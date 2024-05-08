<link href="{{asset('admin/assets/vendor/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
<div class="modal fade" id="fullscreeexampleModal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullscreeexampleModalLabel">Full Screen Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card border border-end-1" style="margin-top: 8px;">
                            <div class="card-body">
                                <div class="needs-validation" novalidate>
                                    <div class="position-relative mb-3">
                                        <h5 class="card-title fs-16 mb-3">Products Title</h5>
                                        <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title" />
                                    </div>
                                    <div class="position-relative mb-3">
                                        <label class="form-label" for="validationTooltip01">Slug</label>
                                        <input type="text" class="form-control" placeholder="Enter Slug" id="slug" name="slug" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-end-1">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="mb-2">
                                        <h4 class="header-title mt-2">Quill Editor</h4>
                                        <div id="snow-editor" style="height: 350px;padding-top: 5px;padding-left: 5px;">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card border border-end-1" style="margin-top: 8px;">
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
                                                <h class="text-muted fw-bold" style="margin-bottom: 0;" id="image_title"></h>
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
                    <div class="col-xl-4 col-lg-4" style="margin-top: 8px;">
                        <div class="card border border-end-1">
                            <div class="card-body">
                                <h5 class="card-title fs-16 mb-3">Products status</h5>
                                <div class="position-relative mb-3">
                                    <select class="form-select" id="pro_status" name="pro_status">
                                        <option>Choose status</option>
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-end-1">
                            <div class="card-body">
                                <label class="form-label" for="validationTooltip01">Category</label>
                                <div class="position-relative mb-3">
                                    <select class="form-select" id="pro_category" name="pro_category">
                                        <option value="">Select Category </option>
                                    </select>
                                </div>
                                <label class="form-label" for="validationTooltip01">Sub Category</label>
                                <div class="position-relative mb-3">
                                    <select class="form-select" id="sub_category" name="sub_category">
                                        <option value="">Select Sub Category </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-end-1">
                            <div class="card-body">
                                <label class="form-label" for="validationTooltip01">Brands</label>
                                <div class="position-relative mb-3">
                                    <select class="form-select" id="pro_brands" name="pro_brands">
                                        <option>Select brands</option>
                                    </select>
                                </div>
                                <label class="form-label" for="validationTooltip01">Featured Products</label>
                                <div class="position-relative mb-3">
                                    <select class="form-select" id="pro_featured" name="pro_featured">
                                        <option>Select featured</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card border border-end-1">
                            <div class="card-body">
                                <label class="form-label" for="validationTooltip01">Pricing</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="Enter pricing" id="pro_pricing" name="pro_pricing" />
                                </div>
                                <label class="form-label" for="validationTooltip01">Compare Pricing</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="Enter Compare" id="pro_compare" name="pro_compare" />
                                </div>
                            </div>
                        </div>
                        <div class="card border border-end-1">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Stock Keeping</label>
                                        <input type="text" class="form-control" placeholder="Enter Compare" id="pro_stock" name="pro_stock" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Barcode</label>
                                        <input type="text" class="form-control" placeholder="Enter Compare" id="pro_barcode" name="pro_barcode" />
                                    </div>
                                </div>
                                <input type="text" id="track_qty" name="track_qty" hidden>
                                <input type="checkbox" id="check" name="check" value="">
                                <label class="form-label" for="track_qty">Track Quantity</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="Enter Compare" id="pro_qty" name="pro_qty" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">Close</a>
                <button type="button" class="btn btn-primary upload" onclick="update_product()">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/demo.quilljs.js')}}"></script>
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
    $(document).ready(function() {
        $(document).on('click', '.products_id', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('products.find') }}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    console.log(response);
                    $("#id").val(response.products.id);
                    $("#title").val(response.products.title);
                    $("#slug").val(response.products.slug);
                    $("#pro_status").val(response.products.status);
                    $("#pro_featured").val(response.products.is_featured);
                    $("#pro_pricing").val(response.products.price);
                    $("#pro_compare").val(response.products.compare_price);
                    $("#pro_stock").val(response.products.aku);
                    $("#pro_barcode").val(response.products.barcode);
                    $("#check").val(response.products.track_qty);
                    $("#pro_qty").val(response.products.qty);
                    var pTags = document.getElementsByTagName('p');
                    for (var i = 0; i < pTags.length; i++) {
                        pTags[i].textContent = response.products.description;
                    }
                    var data_image = response.products.image;
                    var titleElement = document.getElementById('image_title');
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
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.products_id', function() {
            $.ajax({
                url: "{{route('categories.get')}}",
                method: "get",
                dataType: "json",
                success: function(data) {
                    $('#pro_category').find("option").not(":first").remove();
                    $.each(data['categories'], function(key, item) {
                        $('#pro_category').append(`<option value='${item.id}'>${item.name}</option>`)
                    });
                }
            });
            $.ajax({
                url: "{{route('brands.get')}}",
                method: "get",
                dataType: "json",
                success: function(data) {
                    $('#pro_brands').find("option").not(":first").remove();
                    $.each(data['brands'], function(key, item) {
                        $('#pro_brands').append(`<option value='${item.id}'>${item.name}</option>`)
                    });
                }
            });
        });
    });
    $("#pro_category").change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{route('sub.get')}}",
            type: "get",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#sub_category').find("option").not(":first").remove();
                $.each(data['sub_categories'], function(key, item) {
                    $('#sub_category').append(`<option value='${item.id}'>${item.name}</option>`)
                });
            }
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.products_id', function() {

        });
    });
</script>
<script>
    function update_product() {
        console.log('1111111111');
        const id = document.getElementById('id').value;
        const title = document.getElementById('title').value;
        const slug = document.getElementById('slug').value;
        const description = document.getElementById('snow-editor').textContent;
        const pro_status = document.getElementById('pro_status').value;
        const pro_category = document.getElementById('pro_category').value;
        const sub_category = document.getElementById('sub_category').value;
        const pro_featured = document.getElementById('pro_featured').value;
        const pro_pricing = document.getElementById('pro_pricing').value;
        const pro_compare = document.getElementById('pro_compare').value;
        const pro_stock = document.getElementById('pro_stock').value;
        const pro_brands = document.getElementById('pro_brands').value;
        const pro_barcode = document.getElementById('pro_barcode').value;
        const check = document.getElementById('check');
        const track_qty = document.getElementById('track_qty').value = !check.checked ? "No" : "Yes";
        const pro_qty = document.getElementById('pro_qty').value;
        var formData = new FormData();
        formData.append('id', id);
        formData.append('title', title);
        formData.append('slug', slug);
        formData.append('description', description);
        formData.append('pro_status', pro_status);
        formData.append('pro_category', pro_category);
        formData.append('sub_category', sub_category);
        formData.append('pro_brands', pro_brands);
        formData.append('pro_featured', pro_featured);
        formData.append('pro_pricing', pro_pricing);
        formData.append('pro_compare', pro_compare);
        formData.append('pro_stock', pro_stock);
        formData.append('pro_barcode', pro_barcode);
        formData.append('pro_qty', pro_qty);
        formData.append('track_qty', track_qty);
        $.ajax({
            url: "{{ route('products.update') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status == false) {

                } else {
                    window.location = "{{route('products.index')}}";
                }
            },
            error: function(xhr, status, error) {
                console.log("Error for Create Category");
            }
        });
    }
    $(document).ready(function() {
        $(document).on('click', '.upload', function() {
            const id = document.getElementById('id').value;
            const fileInput = document.getElementById('fileInput').files[0];
            var formData = new FormData();
            formData.append('id', id);
            formData.append('fileInput', fileInput);
            $.ajax({
                url: "{{ route('products.upload') }}",
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log("testing");
                },
                error: function(xhr, status, error) {
                    console.log("Error for Create Category");
                }
            });
        });
    });
</script>
