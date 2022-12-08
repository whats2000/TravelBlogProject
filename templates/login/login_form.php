<div class="modal fade" id="modal-login" aria-hidden="true" aria-labelledby="model-login-label" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2" id="model-login-label">Login</h1>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="./login/member_handle.php" method="POST">
                    <input type="hidden" name="method" value="login">

                    <label for="login-email" class="mb-3">Email address</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control shadow-none" id="login-email"
                            placeholder="name@example.com" required>
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                    </div>
                    <label for="login-password" class="mb-3">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="check-password form-control shadow-none"
                            id="login-password" placeholder="Password" required>
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash toggle-password" id="toggle-password"></i>
                        </span>
                    </div>
                    <button class="w-100 my-2 btn btn-lg rounded-3 btn-secondary" type="submit">Login</button>
                    <hr class="my-4">
                    <small class="text-muted">
                        Not a member yet?
                        <a class="border-bottom border-secondary" data-bs-toggle="modal" data-bs-target="#modal-signin">
                            Sign Up
                        </a> .
                    </small>
                </form>
            </div>
        </div>
    </div>
</div>