<section id="normal">
    <hr class="mb-3">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title in Block</label>
        <input class="form-control" type="text" name='title' /> <br />

    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Image in Block</label>
        <input class="form-control" type="file" name="normal_pic" value="" required="required" onchange="loadFile(event)" />
        <img id="normal_pic_output" />
        <script>
            var loadFile = function(event) {
                var normal_pic_output = document.getElementById('normal_pic_output');
                normal_pic_output.src = URL.createObjectURL(event.target.files[1]);
                normal_pic_output.onload = function() {
                    URL.revokeObjectURL(normal_pic_output.src) // free memory
                }
            };
        </script>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Text in Block</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

</section>