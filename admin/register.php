<?php
include('../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  header('Content-Type: application/json');

  $email = trim($_POST['email'] ?? '');
  $lastname = trim($_POST['lastname'] ?? '');
  $middlename = trim($_POST['middlename'] ?? '');
  $firstname = trim($_POST['firstname'] ?? '');
  $is_enabled = 'enabled';
  $password = trim($_POST['password'] ?? '');
  $confirm_password = trim($_POST['confirm_password'] ?? '');

  if ($password !== $confirm_password) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
    exit();
  }

  $passwordPattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

  if (!preg_match($passwordPattern, $password)) {
    echo json_encode([
      'success' => false,
      'message' => 'Password must be at least 8 characters long, include at least 1 uppercase letter, 1 number, and 1 special character.'
    ]);
    exit();
  }

  $checkStmt = $conn->prepare("SELECT facultyid FROM faculty WHERE email = ?");
  $checkStmt->bind_param("s", $email);
  $checkStmt->execute();
  $checkStmt->store_result();

  if ($checkStmt->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Email already exists.']);
    $checkStmt->close();
    $conn->close();
    exit();
  }
  $checkStmt->close();

  $stmt = $conn->prepare("INSERT INTO faculty 
        (email, lastname, middlename, firstname, is_enabled, password)
        VALUES (?, ?, ?, ?, ?, ?)");

  $stmt->bind_param(
    "ssssss",
    $email,
    $lastname,
    $middlename,
    $firstname,
    $is_enabled,
    $password
  );

  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Faculty successfully registered.']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error occurred during registration.']);
  }

  $stmt->close();
  $conn->close();
  exit();
}
?>

<div class="mb-3">
  <button class="btn btn-success" onclick="location.reload()">
    <i class="fa-solid fa-arrow-left"></i> Main Page
  </button>
</div>

<div class="container">
  <h5 class="mb-3">Register Faculty Member</h5>

  <div class="card">
    <div class="card-body">
      <form id="facultyForm">

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required />
        </div>

        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" class="form-control" name="lastname" required />
        </div>

        <div class="mb-3">
          <label class="form-label">Middle Name</label>
          <input type="text" class="form-control" name="middlename" required />
        </div>

        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" class="form-control" name="firstname" required />
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required />
        </div>

        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" required />
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.querySelector("#facultyForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch("register.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        Toastify({
          text: data.message,
          duration: 3000,
          gravity: "bottom",
          position: "right",
          backgroundColor: data.success ? "green" : "red",
        }).showToast();

        if (data.success) {
          form.reset();
        }
      })
      .catch((error) => {
        Toastify({
          text: "Something went wrong!",
          duration: 3000,
          gravity: "bottom",
          position: "right",
          backgroundColor: "red",
        }).showToast();
        console.error("Error:", error);
      });
  });
</script>