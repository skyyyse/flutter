<div class="modal fade" id="fullscreeexampleModal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Full Screen Modal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border border-end-1" style="margin-top: 8px;">
                                <div class="card-body">
                                    <div class="needs-validation" novalidate>
                                        <div class="position-relative mb-3">
                                            <label class="form-label" for="validationTooltip01">Name</label>
                                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" />
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label class="form-label" for="validationTooltip01">Slug</label>
                                            <input type="text" class="form-control" placeholder="Slug" id="slug" name="slug" disabled />
                                        </div>
                                        <div class="position-relative mb-3">
                                            <div class="mb-3 col-md-4">
                                                <label for="inputState" class="form-label">Active</label>
                                                <select id="active" name="active" class="form-select">
                                                    <option>Choose</option>
                                                    <option value="1">enable</option>
                                                    <option value="0">disable</option>
                                                </select>
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
                    <button type="button" onclick="update_brands()" class="btn btn-primary upload">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
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
    $(document).ready(function() {
        $(document).on('click', '.brands_id', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('brands.find') }}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    $("#id").val(response.brands.id);
                    $("#name").val(response.brands.name);
                    $("#slug").val(response.brands.slug);
                    $("#active").val(response.brands.status);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
    function update_brands() {
        const id = document.getElementById('id').value;
        const name = document.getElementById('name').value;
        const slug = document.getElementById('slug').value;
        const active = document.getElementById('active').value;
        var formData = new FormData();
        formData.append('id', id);
        formData.append('name', name);
        formData.append('slug', slug);
        formData.append('active', active);
        $.ajax({
            url: "{{ route('brands.update') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                window.location.href = "{{ route('brands.index') }}";
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
