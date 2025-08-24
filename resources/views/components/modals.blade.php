{{-- Error/Success Alert Div --}}
<div id="auth-alert" class="alert d-none mt-2"></div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="loginForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login to Your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="login-alert" class="alert d-none"></div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <div class="text-center mt-3">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="text-center w-100">Don't have an account? 
                        <a href="#" data-bs-toggle="modal" data-bs-target="#registrationModal" data-bs-dismiss="modal">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="registerForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Create Your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="register-alert" class="alert d-none"></div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="terms" required>
                        <label class="form-check-label">I agree to the Terms & Conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>
                <div class="modal-footer">
                    <p class="text-center w-100">Already have an account? 
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- jQuery AJAX --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    function showAlert(target, type, message) {
        let alertBox = $(target);
        alertBox.removeClass("d-none alert-success alert-danger").addClass("alert alert-" + type).html(message);
    }

    // Login AJAX
    $("#loginForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('login.json') }}", // JSON return route
            method: "POST",
            data: $(this).serialize(),
            success: function(res) {
                if (res.status === "success") {
                    showAlert("#login-alert", "success", res.message);
                    setTimeout(() => window.location.href = res.redirect, 1500);
                } else {
                    showAlert("#login-alert", "danger", res.message);
                }
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = Object.values(xhr.responseJSON.errors).flat().join("<br>");
                    showAlert("#login-alert", "danger", errors);
                } else {
                    showAlert("#login-alert", "danger", "Something went wrong!");
                }
            }
        });
    });

    // Register AJAX
    $("#registerForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('register.json') }}", // JSON return route
            method: "POST",
            data: $(this).serialize(),
            success: function(res) {
                if (res.status === "success") {
                    showAlert("#register-alert", "success", res.message);
                    setTimeout(() => window.location.href = res.redirect, 1500);
                } else {
                    showAlert("#register-alert", "danger", res.message);
                }
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = Object.values(xhr.responseJSON.errors).flat().join("<br>");
                    showAlert("#register-alert", "danger", errors);
                } else {
                    showAlert("#register-alert", "danger", "Something went wrong!");
                }
            }
        });
    });
});
</script>
