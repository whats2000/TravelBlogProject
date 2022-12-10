<div class="modal fade" id="add-post-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="name-form-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="name-form-label">Add Post</h1>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./post_edit/add_post_form_handle.php" enctype="multipart/form-data" method="POST">
                <div class="modal-body p-5 container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <!-- Select image area-->
                            <h2 class="py-4 fs-3">Select Post Image</h2>
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input type="file" name="sub_pic" id="upload-image" class="form-control border-0" accept=".png, .jpg, .jpeg, .icon, .svg">
                                <label id="upload-label" for="upload-image" class="font-weight-light text-muted">
                                    Select a image
                                </label>
                                <label for="upload-image" class="btn btn-light m-0 rounded-pill px-4">
                                    <i class="bi bi-upload mr-2 text-muted"></i>
                                    <small class="text-uppercase font-weight-bold text-muted">
                                        Open up
                                    </small>
                                </label>
                                <!-- onchange="loadFile(event) 
                                    <script>
                                    var loadFile = function(event) {
                                        var sub_pic_output = document.getElementById("sub_pic_output");
                                        sub_pic_output.src = URL.createObjectURL(event.target.files[0]);
                                        sub_pic_output.onload = function() {
                                            URL.revokeObjectURL(sub_pic_output.src) // free memory
                                        }
                                    };
                                </script> -->
                            </div>
                            <!-- Uploaded image area-->
                            <p class="font-italic text-secondary text-center">
                                The image uploaded will be rendered inside the box
                                below.
                            </p>
                            <div class="image-area mt-4 text-center text-muted">
                                <div id="uploaded-image">
                                    <p>There nothing here currently</p>
                                </div>
                            </div>
                            <!--Add Title-->
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input class="form-control" type="text" name="title" /> <br />
                            </div>
                            <!--Add Subtitle-->
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput1" class="form-label">Subtitle</label>
                                <input class="form-control" type="text" name="description" />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_post_upload" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>