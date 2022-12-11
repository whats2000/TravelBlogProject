<section id="card">
    <hr class="mb-3">

    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Image in Card</label>
        <input class="form-control" type="file" name="card_pic" value="" required="required" onchange="loadFile(event)" />
        <img id="card_pic_output" />
        <script>
            var loadFile = function(event) {
                var card_pic_output = document.getElementById('card_pic_output');
                card_pic_output.src = URL.createObjectURL(event.target.files[0]);
                card_pic_output.onload = function() {
                    URL.revokeObjectURL(card_pic_output.src) // free memory
                }
            };
        </script>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title in Card</label>
        <input class="form-control" type="text" name='title' /> <br />

    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Text in Card</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

</section>