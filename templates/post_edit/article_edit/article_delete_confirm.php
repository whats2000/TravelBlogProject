<div class="modal fade" id="modal-article-delete" aria-hidden="true" aria-labelledby="modal-article-delete-label"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0" id="modal-article-delete-label">
                    <strong>Are you sure to delete?</strong>
                </h5>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <form action="./post_edit/article_edit/article_modify.php" method="POST"
                    class="col-6 m-0 rounded-0 border-end text-center">
                    <input type="hidden" name="for_post" value="<?=$_SESSION["delete"]["for_post"]?>">
                    <input type="hidden" name="position" value="<?=$_SESSION["delete"]["position"]?>">
                    <input type="hidden" name="delete" value="delete">

                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none text-danger">
                        Yes, I'm sure
                    </button>
                </form>

                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0"
                    data-bs-dismiss="modal">
                    No thanks
                </button>
            </div>
        </div>
    </div>
</div>