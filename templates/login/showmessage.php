<?php
if (isset($_SESSION["show_message"])) { ?>
<div class="modal fade" id="modal-show-message" aria-hidden="true" aria-labelledby="modal-show-message-label"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0" id="modal-show-message-label">
                    <strong><?=$_SESSION["show_message"]?></strong>
                </h5>
            </div>
            <div class="modal-footer px-4 pb-4 flex-column border-top-0">
                <button type="button" class="btn btn-md btn-secondary w-100 mx-0" data-bs-dismiss="modal">I get
                    it</button>
            </div>
        </div>
    </div>
</div>

<?php
unset($_SESSION['show_message']);
}?>