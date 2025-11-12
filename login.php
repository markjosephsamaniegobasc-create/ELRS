<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_number = $_POST['student_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    if ($role === 'admin') {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            header("Location: admin/main_page.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid Admin Credentials";
            header("Location: login.php");
            exit();
        }
    } elseif ($role === 'student') {
        $stmt = $conn->prepare("SELECT * FROM student WHERE student_number = ? AND password = ?");
        $stmt->bind_param("ss", $student_number, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (strtolower($row['status']) === 'unapproved') {
                $_SESSION['error'] = "Your account account is currently pending. Please contact admin.";
                header("Location: login.php");
                exit();
            }

            $_SESSION['studentid'] = $row['studentid'];
            $_SESSION['student_number'] = $row['student_number'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['middlename'] = $row['middlename'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['course'] = $row['course'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['welcome'] = "Welcome back, " . $row['firstname'] . "! It's great to see you again.";
            header("Location: student/main_page.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid Student Credentials";
            header("Location: login.php");
            exit();
        }
    } elseif ($role === 'faculty') {
        $stmt = $conn->prepare("SELECT * FROM faculty WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            $_SESSION['facultyid'] = $row['facultyid'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['middlename'] = $row['middlename'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['course'] = $row['course'];
            header("Location: faculty/main_page.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid Faculty Credentials";
            header("Location: login.php");
            exit();
        }
    } elseif ($role === 'studentregister') {
        $student_number = trim($_POST['student_number'] ?? '');
        $firstname = trim($_POST['firstname'] ?? '');
        $middlename = trim($_POST['middlename'] ?? '');
        $lastname = trim($_POST['lastname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $confirm_password = trim($_POST['confirm_password'] ?? '');
        $course = trim($_POST['course'] ?? '');
        $status = 'unapproved';

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

        $checkStmt = $conn->prepare("SELECT studentid FROM student WHERE student_number = ?");
        $checkStmt->bind_param("s", $student_number);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Student Number already exists.']);
            $checkStmt->close();
            $conn->close();
            exit();
        }
        $checkStmt->close();

        $stmt = $conn->prepare("INSERT INTO student 
            (student_number, firstname, middlename, lastname, email, password, course, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "ssssssss",
            $student_number,
            $firstname,
            $middlename,
            $lastname,
            $email,
            $password,
            $course,
            $status
        );

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Student successfully registered.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error occurred during registration.']);
        }

        $stmt->close();
        $conn->close();
        exit();
    } elseif ($role === 'forgotpassword') {
        $student_number = $_POST['student_number'] ?? '';
        $new_password = $_POST['password'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM student WHERE student_number = ?");
        $stmt->bind_param("s", $student_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if ($new_password === $row['password']) {
                $_SESSION['error'] = "New password must be different from the current password.";
                header("Location: login.php");
                exit();
            }

            $update_stmt = $conn->prepare("UPDATE student SET password = ? WHERE student_number = ?");
            $update_stmt->bind_param("ss", $new_password, $student_number);

            if ($update_stmt->execute()) {
                $_SESSION['success'] = "Password has been successfully updated.";
            } else {
                $_SESSION['error'] = "Failed to update password. Please try again.";
            }
        } else {
            $_SESSION['error'] = "Student account not found.";
        }

        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Unknown role";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <style>
        .basc_logo {
            height: 50px;
            width: 50px;
        }

        .system_logo {
            height: 50px;
            width: 50px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="basc_logo" src="image/basc_logo.png" alt="basc_logo" />
                Bulacan Agricultural State College
            </a>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="d-flex gap-3">
            <!-- Admin Login -->
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adminModal">Admin</button>
                <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="login.php" method="post">
                                <input type="hidden" name="role" value="admin" />
                                <div class="modal-header">
                                    <img class="system_logo" src="image/system_logo.png" alt="system_logo" />
                                    <h5 class="modal-title" id="adminModalLabel">Log in as admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control password-input"
                                                placeholder="Enter Password" required />
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Login -->
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#studentModal">Student</button>
                <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="login.php" method="post">
                                <input type="hidden" name="role" value="student" />
                                <div class="modal-header">
                                    <img class="system_logo" src="image/system_logo.png" alt="system_logo" />
                                    <h5 class="modal-title" id="studentModalLabel">Log in as student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" name="student_number" class="form-control"
                                                placeholder="Enter Student Number" required />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control password-input"
                                                placeholder="Enter Password" required />
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#studentregisterModal">Register</button>
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#forgotpasswordModal">Forgot Password?</button>
                                    <button type="submit" class="btn btn-success">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Faculty Login -->
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#facultyModal">Faculty</button>
                <div class="modal fade" id="facultyModal" tabindex="-1" aria-labelledby="facultyModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="login.php" method="post">
                                <input type="hidden" name="role" value="faculty" />
                                <div class="modal-header">
                                    <img class="system_logo" src="image/system_logo.png" alt="system_logo" />
                                    <h5 class="modal-title" id="facultyModalLabel">Log in as faculty</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control password-input"
                                                placeholder="Enter Password" required />
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Register -->
            <div>
                <div class="modal fade" id="studentregisterModal" tabindex="-1"
                    aria-labelledby="studentregisterModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="RegisterForm">
                                <input type="hidden" name="role" value="studentregister" />
                                <div class="modal-header">
                                    <img class="system_logo" src="image/system_logo.png" alt="system_logo" />
                                    <h5 class="modal-title" id="studentregisterModalLabel">Create Account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Student Number</label>
                                        <input type="text" class="form-control" name="student_number" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" name="middlename" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Course</label>
                                        <select class="form-select" name="course" required>
                                            <option selected>Select Course</option>
                                            <option value="bsge">Bachelor of Science in Geodetic Engineering (BSGE)
                                            </option>
                                            <option value="bsaben">Bachelor of Science in Agricultural and Biosystems
                                                Engineering (BSABEN)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#studentModal">Log in</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Forgot Password -->
            <div>
                <div class="modal fade" id="forgotpasswordModal" tabindex="-1"
                    aria-labelledby="forgotpasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="login.php" method="post">
                                <input type="hidden" name="role" value="forgotpassword" />
                                <div class="modal-header">
                                    <img class="system_logo" src="image/system_logo.png" alt="system_logo" />
                                    <h5 class="modal-title" id="forgotpasswordModalLabel">Forgot Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" name="student_number" class="form-control"
                                                placeholder="Enter Student Number" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control password-input"
                                                placeholder="New Password" required />
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#studentModal">Log in</button>
                                    <button type="submit" class="btn btn-success">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        document.querySelectorAll(".toggle-password").forEach(toggle => {
            toggle.addEventListener("click", function () {
                const input = this.parentElement.querySelector(".password-input");
                const icon = this.querySelector("i");
                input.type = input.type === "password" ? "text" : "password";
                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");
            });
        });

        document.querySelector("#RegisterForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            fetch("login.php", {
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

    <?php if (isset($_SESSION['error'])): ?>
        <script>
            Toastify({
                text: "<?php echo $_SESSION['error']; ?>",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
            }).showToast();
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            Toastify({
                text: "<?php echo $_SESSION['success']; ?>",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "green",
            }).showToast();
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
</body>

</html>