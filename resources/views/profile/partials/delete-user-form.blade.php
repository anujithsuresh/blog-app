<section>

    <p class="text-muted mb-3">
        Once your account is deleted, all data will be permanently removed.
        This action cannot be undone.
    </p>

    <form method="POST"
          action="{{ route('profile.destroy') }}"
          onsubmit="return confirm('Are you sure you want to permanently delete your account?')">

        @csrf
        @method('DELETE')

        <div class="mb-3">
            <label class="form-label fw-semibold text-danger">
                Confirm Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control @error('password','userDeletion') is-invalid @enderror"
                   placeholder="Enter your password"
                   required>

            @error('password','userDeletion')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-danger">
            🗑️ Delete My Account
        </button>

    </form>

</section>
