<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()">
    <i class="fa-solid fa-arrow-left"></i> Main Page
  </button>
</div>

<div class="container">
  <h5 class="mb-3">Change Password</h5>

  <div class="card">
    <div class="card-body">
      <form id="facultySettingsForm">
        <div class="mb-3">
          <label class="form-label">Old Password</label>
          <input type="password" class="form-control" name="old_password" required />
        </div>
        <div class="mb-3">
          <label class="form-label">New Password</label>
          <input type="password" class="form-control" name="new_password" required />
        </div>
        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" required />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>