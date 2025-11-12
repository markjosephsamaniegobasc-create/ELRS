<?php
session_start();
include('../conn.php');
$email = $_SESSION['email'] ?? 'Faculty';
$firstname = $_SESSION['firstname'] ?? 'Faculty';

$sql_bsge = "SELECT COUNT(*) AS total FROM student WHERE course = 'bsge'";
$result_bsge = $conn->query($sql_bsge);
$row_bsge = $result_bsge->fetch_assoc();
$bsge_count = $row_bsge['total'] ?? 0;

$sql_bsaben = "SELECT COUNT(*) AS total FROM student WHERE course = 'bsaben'";
$result_bsaben = $conn->query($sql_bsaben);
$row_bsaben = $result_bsaben->fetch_assoc();
$bsaben_count = $row_bsaben['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Faculty</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />

  <style>
    body {
      overflow-x: hidden;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background: linear-gradient(135deg, #4B0000, #560000);
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      top: 56px;
      left: 0;
      width: 220px;
      background: linear-gradient(180deg, #560000, #4B0000);
      padding-top: 1rem;
      z-index: 1030;
      transition: margin 0.3s;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
    }

    .content {
      margin-left: 220px;
      padding: 1rem;
      margin-top: 56px;
      transition: margin 0.3s;
    }

    .navbar-brand,
    .navbar-brand:hover {
      color: white;
    }

    .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.15);
      color: #fff;
    }

    .nav-link {
      color: #f0f0f0;
      padding: 10px 15px;
      border-radius: 0.375rem;
      transition: background 0.3s, color 0.3s;
    }

    .nav-link.active {
      background-color: #4B0000;
      color: white !important;
      font-weight: bold;
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.2);
    }

    .nav-link[aria-expanded="false"] {
      background-color: transparent;
      color: #f0f0f0;
      font-weight: normal;
    }

    .nav-link[aria-expanded="true"] {
      background-color: rgba(255, 255, 255, 0.15);
      color: #fff !important;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .sidebar {
        margin-left: -220px;
      }

      .sidebar.show {
        margin-left: 0;
      }

      .content {
        margin-left: 0;
      }

      .content.shift {
        margin-left: 220px;
      }
    }

    footer {
      margin-left: 220px;
    }

    @media (max-width: 768px) {
      footer {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <button class="btn btn-outline-light d-lg-none me-2" type="button" id="toggleSidebar">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand"><?= htmlspecialchars($firstname) ?></a>

      <ul class="nav nav-pills">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false"><?= htmlspecialchars($email) ?></a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Log out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          href="#reviewerSubmenu" role="button" aria-expanded="false" aria-controls="reviewerSubmenu">
          <span><i class="fa-solid fa-book me-2"></i>Reviewer</span>
          <i class="fa fa-caret-down"></i>
        </a>
        <div class="collapse" id="reviewerSubmenu">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              <a class="nav-link load-page" href="#" data-page="reviewer_bsge.php">
                <i class="fa-solid fa-ruler-vertical me-2"></i>BSGE
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link load-page" href="#" data-page="reviewer_bsaben.php">
                <i class="fa-solid fa-seedling me-2"></i>BSABEN
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          href="#questionerSubmenu" role="button" aria-expanded="false" aria-controls="questionerSubmenu">
          <span><i class="fa-solid fa-question me-2"></i>Questioner</span>
          <i class="fa fa-caret-down"></i>
        </a>
        <div class="collapse" id="questionerSubmenu">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              <a class="nav-link load-page" href="#" data-page="questioner_bsge.php">
                <i class="fa-solid fa-ruler-vertical me-2"></i>BSGE
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link load-page" href="#" data-page="questioner_bsaben.php">
                <i class="fa-solid fa-seedling me-2"></i>BSABEN
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link load-page" href="#" data-page="student_approval.php">
          <i class="fa-solid fa-user-check me-2"></i>Student Approval
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link load-page" href="#" data-page="student_information.php">
          <i class="fa-solid fa-user me-2"></i>Student Information
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link load-page" href="#" data-page="results.php">
          <i class="fa-solid fa-chart-simple me-2"></i>Results
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link load-page" href="#" data-page="scores.php">
          <i class="fa-solid fa-chart-simple me-2"></i>Scores
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link load-page" href="#" data-page="settings.php">
          <i class="fa-solid fa-gear me-2"></i>Settings
        </a>
      </li>
    </ul>
  </div>

  <main>
    <div class="content">
      <div class="alert alert-info" role="alert">
        <span>Welcome back, <?= htmlspecialchars($firstname) ?>! It's great to see
          you again.</span>
      </div>
      <div>
        <h5 class="mb-3">Dashboard</h5>
      </div>
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-3">
                BS in Geodetic Engineering
              </h5>
              <i class="fa-solid fa-users fa-3x mb-3"></i>
              <h5 class="fs-1"><?= $bsge_count ?></h5>
            </div>
          </div>
        </div>

        <div class="col-sm-6 mb-3">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-3">
                BS in Agricultural and Biosystems
                Engineering
              </h5>
              <i class="fa-solid fa-users fa-3x mb-3"></i>
              <h5 class="fs-1"><?= $bsaben_count ?></h5>
            </div>
          </div>
        </div>

        <div class="col-sm-6 mb-3">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-3">Statistics (BSGE)</h5>

              <div class="mb-3">
                <label for="dateFilterBSGE" class="form-label">Filter by Date:</label>
                <input type="date" id="dateFilterBSGE" class="form-control w-auto mx-auto">
              </div>

              <div class="d-flex justify-content-center">
                <div style="width: 300px; height: 300px;">
                  <canvas id="statsChartBSGE"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 mb-3">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-3">Statistics (BSABEN)</h5>

              <div class="mb-3">
                <label for="dateFilterBSABEN" class="form-label">Filter by Date:</label>
                <input type="date" id="dateFilterBSABEN" class="form-control w-auto mx-auto">
              </div>

              <div class="d-flex justify-content-center">
                <div style="width: 300px; height: 300px;">
                  <canvas id="statsChartBSABEN"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer mt-3 mb-3 text-center">
    <div class="container">
      <span>&copy; 2025 Bulacan Agricultural State College, All rights reserved. |
        Privacy Policy | Terms of Service</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      function setupChart(course, chartId, dateInputId) {
        const ctx = document.getElementById(chartId);
        let chartInstance;

        const messageEl = document.createElement("span");
        messageEl.style.display = "none";
        messageEl.style.fontWeight = "bold";
        messageEl.style.color = "gray";
        messageEl.textContent = "No quiz data found for this date.";
        ctx.parentNode.appendChild(messageEl);

        const dateInput = document.getElementById(dateInputId);

        const today = new Date().toISOString().split("T")[0];
        dateInput.value = today;

        function loadStats(selectedDate) {
          fetch(`fetch_statistics.php?date=${selectedDate}&course=${course}`)
            .then(res => res.json())
            .then(data => {
              const passed = data.passed;
              const failed = data.failed;

              messageEl.style.display = "none";
              if (chartInstance) chartInstance.destroy();

              if (passed === 0 && failed === 0) {
                messageEl.style.display = "block";
                return;
              }

              chartInstance = new Chart(ctx, {
                type: "pie",
                data: {
                  labels: ["Passed", "Failed"],
                  datasets: [{
                    data: [passed, failed],
                    backgroundColor: ["green", "red"],
                  }]
                },
                options: {
                  plugins: {
                    title: {
                      display: true,
                      text: `${course} Quiz Results on ${selectedDate}`
                    }
                  }
                }
              });
            })
            .catch(err => {
              console.error("Error:", err);
              messageEl.textContent = "An error occurred while loading data.";
              messageEl.style.display = "block";
            });
        }

        loadStats(today);

        dateInput.addEventListener("change", function () {
          const selectedDate = this.value;
          if (!selectedDate) return;
          loadStats(selectedDate);
        });
      }

      setupChart("BSGE", "statsChartBSGE", "dateFilterBSGE");
      setupChart("BSABEN", "statsChartBSABEN", "dateFilterBSABEN");
    });

    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const content = document.querySelector(".content");

    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("show");
      content.classList.toggle("shift");
    });

    document.querySelectorAll(".load-page").forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();

        document.querySelectorAll(".load-page").forEach((el) => {
          el.classList.remove("active");
        });

        this.classList.add("active");

        const page = this.getAttribute("data-page");

        fetch(page)
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok.");
            }
            return response.text();
          })
          .then((data) => {
            content.innerHTML = data;

            if (page === "settings.php") {
              initAdminSettingsHandler();
            } else if (page === "reviewer_bsge.php") {
              initSubjectBsgeFormHandler();
              initUploadBsgeFormsHandler();
              initLinkBsgeFormHandler();
            } else if (page === "reviewer_bsaben.php") {
              initSubjectBsabenFormHandler();
              initUploadBsabenFormsHandler();
              initLinkBsabenFormHandler();
            } else if (page === "questioner_bsge.php") {
              initQuizBsgeFormHandler();
            } else if (page === "questioner_bsaben.php") {
              initQuizBsabenFormHandler();
            } else if (page === "student_approval.php") {
              initStudentApprovalFormStatusFormHandler();
            }
          })
          .catch((error) => {
            Toastify({
              text: "Error loading page.",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();

            console.error("Error:", error);
          });
      });
    });

    function initAdminSettingsHandler() {
      const form = document.querySelector("#adminSettingsForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("update_password.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
          .catch((err) => {
            Toastify({
              text: "Error updating password.",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    function initSubjectBsgeFormHandler() {
      const form = document.querySelector("#subjectForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch("reviewer_bsge.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
              let modalEl = document.getElementById("addsubjectModal");
              if (modalEl) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
              }
              fetch("reviewer_bsge.php")
                .then(res => res.text())
                .then(html => {
                  document.querySelector(".content").innerHTML = html;
                  initSubjectBsgeFormHandler();
                  initUploadBsgeFormsHandler();
                  initArchiveSubjectBsgeHandler();
                });
            }
          })
          .catch((err) => {
            Toastify({
              text: "Something went wrong!",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    function initLinkBsgeFormHandler() {
      const form = document.querySelector("#linkForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch("reviewer_bsge.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
              let modalEl = document.getElementById("addlinkModal");
              if (modalEl) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
              }
              fetch("reviewer_bsge.php")
                .then(res => res.text())
                .then(html => {
                  document.querySelector(".content").innerHTML = html;
                  initSubjectBsabenFormHandler();
                  initUploadBsabenFormsHandler();
                  initArchiveSubjectBsabenHandler();
                  initLinkBsgeFormHandler();
                });
            }
          })
          .catch((err) => {
            Toastify({
              text: "Something went wrong!",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    function initUploadBsgeFormsHandler() {
      document.querySelectorAll(".uploadForm").forEach((form) => {
        form.addEventListener("submit", function (e) {
          e.preventDefault();

          const formData = new FormData(this);

          fetch("reviewer_bsge.php", {
            method: "POST",
            body: formData,
          })
            .then((res) => res.json())
            .then((data) => {
              Toastify({
                text: data.message,
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: data.success ? "green" : "red",
              }).showToast();

              if (data.success) {
                this.reset();
              }
            })
            .catch((err) => {
              Toastify({
                text: "Error uploading file.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        });
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-subject-bsge") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("reviewer_bsge.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering reviewer.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-subject-bsge") {
          e.preventDefault();
          fetch("reviewer_bsge.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });

    function initSubjectBsabenFormHandler() {
      const form = document.querySelector("#subjectForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch("reviewer_bsaben.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
              let modalEl = document.getElementById("addsubjectModal");
              if (modalEl) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
              }
              fetch("reviewer_bsaben.php")
                .then(res => res.text())
                .then(html => {
                  document.querySelector(".content").innerHTML = html;
                  initSubjectBsabenFormHandler();
                  initUploadBsabenFormsHandler();
                  initArchiveSubjectBsabenHandler();
                });
            }
          })
          .catch((err) => {
            Toastify({
              text: "Something went wrong!",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    function initLinkBsabenFormHandler() {
      const form = document.querySelector("#linkForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch("reviewer_bsaben.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
              let modalEl = document.getElementById("addlinkModal");
              if (modalEl) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
              }
              fetch("reviewer_bsaben.php")
                .then(res => res.text())
                .then(html => {
                  document.querySelector(".content").innerHTML = html;
                  initSubjectBsabenFormHandler();
                  initUploadBsabenFormsHandler();
                  initArchiveSubjectBsabenHandler();
                  initLinkBsabenFormHandler();
                });
            }
          })
          .catch((err) => {
            Toastify({
              text: "Something went wrong!",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    function initUploadBsabenFormsHandler() {
      document.querySelectorAll(".uploadForm").forEach((form) => {
        form.addEventListener("submit", function (e) {
          e.preventDefault();

          const formData = new FormData(this);

          fetch("reviewer_bsaben.php", {
            method: "POST",
            body: formData,
          })
            .then((res) => res.json())
            .then((data) => {
              Toastify({
                text: data.message,
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: data.success ? "green" : "red",
              }).showToast();

              if (data.success) {
                this.reset();
              }
            })
            .catch((err) => {
              Toastify({
                text: "Error uploading file.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        });
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-subject-bsaben") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("reviewer_bsaben.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering reviewer.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-subject-bsaben") {
          e.preventDefault();
          fetch("reviewer_bsaben.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });

    function initQuizBsgeFormHandler() {
      const form = document.querySelector("#QuizForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch("questioner_bsge.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
          .catch((err) => {
            Toastify({
              text: "Something went wrong!",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-question-bsge") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("questioner_bsge.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering quiz.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-question-bsge") {
          e.preventDefault();
          fetch("questioner_bsge.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });

    function initQuizBsabenFormHandler() {
      const form = document.querySelector("#QuizForm");
      if (!form) return;

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch("questioner_bsaben.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
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
          .catch((err) => {
            Toastify({
              text: "Something went wrong!",
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: "red",
            }).showToast();
            console.error(err);
          });
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-question-bsaben") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("questioner_bsaben.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering quiz.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-question-bsaben") {
          e.preventDefault();
          fetch("questioner_bsaben.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });

    function initStudentApprovalFormStatusFormHandler() {
      document
        .querySelectorAll(".status-dropdown .dropdown-item")
        .forEach((item) => {
          item.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            const status = this.getAttribute("data-status");
            const wrapper = this.closest(".status-dropdown");
            const student_number = wrapper.getAttribute(
              "data-student_number"
            );

            const formData = new FormData();
            formData.append("student_number", student_number);
            formData.append("status", status);

            fetch("update_student_approval.php", {
              method: "POST",
              body: formData,
            })
              .then((res) => res.text())
              .then(() => {
                const btn = wrapper.querySelector("button");

                btn.textContent = status.charAt(0).toUpperCase() + status.slice(1);

                btn.classList.remove("btn-success", "btn-warning");

                if (status === "approved") {
                  btn.classList.add("btn-success");
                } else if (status === "unapproved") {
                  btn.classList.add("btn-warning");
                }

                Toastify({
                  text: "Status updated to " + status,
                  duration: 3000,
                  gravity: "bottom",
                  position: "right",
                  backgroundColor: "green",
                }).showToast();
              })
              .catch((err) => {
                Toastify({
                  text: "Failed to update status.",
                  duration: 3000,
                  gravity: "bottom",
                  position: "right",
                  backgroundColor: "red",
                }).showToast();
                console.error(err);
              });
          });
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-student-approval") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("student_approval.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
              initStudentApprovalFormStatusFormHandler();
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering student.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-student-approval") {
          e.preventDefault();
          fetch("student_approval.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
              initStudentApprovalFormStatusFormHandler();
            });
        }
      });
    });

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-student-information") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("student_information.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering student.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-student-information") {
          e.preventDefault();
          fetch("student_information.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });


    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-results") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("results.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering student.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-results") {
          e.preventDefault();
          fetch("results.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });

    document.addEventListener("DOMContentLoaded", () => {
      content.addEventListener("submit", function (e) {
        const form = e.target;
        if (form && form.id === "filter-form-scores") {
          e.preventDefault();

          const formData = new FormData(form);
          const query = new URLSearchParams(formData).toString();

          fetch("scores.php?" + query)
            .then((res) => {
              if (!res.ok) throw new Error("Failed to load filtered data.");
              return res.text();
            })
            .then((html) => {
              content.innerHTML = html;
            })
            .catch((err) => {
              Toastify({
                text: "Error filtering student.",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "red",
              }).showToast();
              console.error(err);
            });
        }
      });

      content.addEventListener("click", function (e) {
        if (e.target.id === "reset-filter-scores") {
          e.preventDefault();
          fetch("scores.php")
            .then((res) => res.text())
            .then((html) => {
              content.innerHTML = html;
            });
        }
      });
    });

    document.addEventListener("click", function (e) {
      if (e.target.closest(".edit-subject")) {
        const subjectName = e.target.closest(".edit-subject").dataset.subject;
        document.getElementById("old_subject_name").value = subjectName;
        document.getElementById("new_subject_name").value = subjectName;
        const modal = new bootstrap.Modal(document.getElementById("editSubjectModal"));
        modal.show();
      }
    });

    document.addEventListener("submit", function (e) {
      if (e.target && e.target.id === "editSubjectForm1") {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("reviewer_bsge.php", {
          method: "POST",
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            console.log("Response:", data);
            Toastify({
              text: data.message,
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: data.success ? "green" : "red"
            }).showToast();

            if (data.success) {
              const modalEl = document.getElementById("editSubjectModal");
              const modalInstance = bootstrap.Modal.getInstance(modalEl);
              if (modalInstance) modalInstance.hide();

              fetch("reviewer_bsge.php")
                .then(res => res.text())
                .then(html => {
                  document.querySelector(".content").innerHTML = html;
                });
            }

          })
          .catch(err => console.error("Edit Error:", err));
      }
    });

    document.addEventListener("submit", function (e) {
      if (e.target && e.target.id === "editSubjectForm2") {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("reviewer_bsaben.php", {
          method: "POST",
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            console.log("Response:", data);
            Toastify({
              text: data.message,
              duration: 3000,
              gravity: "bottom",
              position: "right",
              backgroundColor: data.success ? "green" : "red"
            }).showToast();

            if (data.success) {
              const modalEl = document.getElementById("editSubjectModal");
              const modalInstance = bootstrap.Modal.getInstance(modalEl);
              if (modalInstance) modalInstance.hide();

              fetch("reviewer_bsaben.php")
                .then(res => res.text())
                .then(html => {
                  document.querySelector(".content").innerHTML = html;
                });
            }

          })
          .catch(err => console.error("Edit Error:", err));
      }
    });

    function showToast(message, type = "info") {
      let bgColor;
      switch (type) {
        case "success": bgColor = "green"; break;
        case "error": bgColor = "red"; break;
        case "warning": bgColor = "yellow"; break;
        default: bgColor = "gray";
      }

      Toastify({
        text: message,
        duration: 3000,
        gravity: "bottom",
        position: "right",
        close: true,
        stopOnFocus: true,
        style: { background: bgColor, borderRadius: "8px" }
      }).showToast();
    }

    document.addEventListener("click", (e) => {
      const btn = e.target.closest(".edit-quiz-btn");
      if (!btn) return;

      document.getElementById("editQuizId").value = btn.dataset.id;
      document.getElementById("editQuestion").value = btn.dataset.question;
      document.getElementById("editOption1").value = btn.dataset.option1;
      document.getElementById("editOption2").value = btn.dataset.option2;
      document.getElementById("editOption3").value = btn.dataset.option3;
      document.getElementById("editOption4").value = btn.dataset.option4;
      document.getElementById("editAnswer").value = btn.dataset.answer;
      document.getElementById("editSubject").value = btn.dataset.subject;

      new bootstrap.Modal(document.getElementById("editQuizModal1")).show();
    });

    document.addEventListener("submit", (e) => {
      if (e.target.id !== "EditQuizForm1") return;
      e.preventDefault();

      const formData = new FormData(e.target);

      fetch("update_quiz.php", {
        method: "POST",
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          showToast(data.message, data.success ? "success" : "error");

          if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById("editQuizModal1")).hide();

            setTimeout(() => {
              document.querySelector('#filter-form-question-bsge button[type="submit"]').click();
            }, 1000);
          }
        })
        .catch(err => showToast("Error updating quiz: " + err, "error"));
    });

    function showToast(message, type = "info") {
      let bgColor;
      switch (type) {
        case "success": bgColor = "green"; break;
        case "error": bgColor = "red"; break;
        case "warning": bgColor = "yellow"; break;
        default: bgColor = "gray";
      }

      Toastify({
        text: message,
        duration: 3000,
        gravity: "bottom",
        position: "right",
        close: true,
        stopOnFocus: true,
        style: { background: bgColor, borderRadius: "8px" }
      }).showToast();
    }

    document.addEventListener("click", (e) => {
      const btn = e.target.closest(".edit-quiz-btn");
      if (!btn) return;

      document.getElementById("editQuizId").value = btn.dataset.id;
      document.getElementById("editQuestion").value = btn.dataset.question;
      document.getElementById("editOption1").value = btn.dataset.option1;
      document.getElementById("editOption2").value = btn.dataset.option2;
      document.getElementById("editOption3").value = btn.dataset.option3;
      document.getElementById("editOption4").value = btn.dataset.option4;
      document.getElementById("editAnswer").value = btn.dataset.answer;
      document.getElementById("editSubject").value = btn.dataset.subject;

      new bootstrap.Modal(document.getElementById("editQuizModal2")).show();
    });

    document.addEventListener("submit", (e) => {
      if (e.target.id !== "EditQuizForm2") return;
      e.preventDefault();

      const formData = new FormData(e.target);

      fetch("update_quiz.php", {
        method: "POST",
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          showToast(data.message, data.success ? "success" : "error");

          if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById("editQuizModal2")).hide();

            setTimeout(() => {
              document.querySelector('#filter-form-question-bsaben button[type="submit"]').click();
            }, 1000);
          }
        })
        .catch(err => showToast("Error updating quiz: " + err, "error"));
    });

    document.addEventListener('submit', function (e) {
      if (e.target && e.target.id === 'markSelectedForm1') {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch('questioner_bsge.php', {
          method: 'POST',
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            Toastify({
              text: data.message,
              duration: 3000,
              gravity: 'bottom',
              position: 'right',
              backgroundColor: data.success ? "green" : "red"
            }).showToast();

            if (data.success) {
              loadPage('questioner_bsge.php?search=' + document.querySelector('[name="search"]').value);
            }
          })
          .catch(err => console.error(err));
      }
    });

    document.addEventListener('change', function (e) {
      if (e.target && e.target.id === 'selectAll') {
        const checkboxes = document.querySelectorAll('input[name="selected_quizzes[]"]');
        checkboxes.forEach(cb => cb.checked = e.target.checked);
      }
    });

    document.addEventListener('submit', function (e) {
      if (e.target && e.target.id === 'markSelectedForm2') {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch('questioner_bsaben.php', {
          method: 'POST',
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            Toastify({
              text: data.message,
              duration: 3000,
              gravity: 'bottom',
              position: 'right',
              backgroundColor: data.success ? "green" : "red"
            }).showToast();

            if (data.success) {
              loadPage('questioner_bsaben.php?search=' + document.querySelector('[name="search"]').value);
            }
          })
          .catch(err => console.error(err));
      }
    });

    document.addEventListener('change', function (e) {
      if (e.target && e.target.id === 'selectAll') {
        const checkboxes = document.querySelectorAll('input[name="selected_quizzes[]"]');
        checkboxes.forEach(cb => cb.checked = e.target.checked);
      }
    });

    document.addEventListener('click', function (e) {
      if (e.target && e.target.id === 'unmarkSelectedBtn1') {
        e.preventDefault();

        const allCheckboxes = document.querySelectorAll('input[name="selected_quizzes[]"]');
        const unchecked = Array.from(allCheckboxes).filter(cb => !cb.checked);

        if (unchecked.length === 0) {
          Toastify({
            text: "No quizzes to unmark.",
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: "orange"
          }).showToast();
          return;
        }

        const formData = new FormData();
        unchecked.forEach(cb => formData.append('unselected_quizzes[]', cb.value));

        fetch('questioner_bsge.php', {
          method: 'POST',
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            Toastify({
              text: data.message,
              duration: 3000,
              gravity: 'bottom',
              position: 'right',
              backgroundColor: data.success ? "green" : "red"
            }).showToast();

            if (data.success) {
              loadPage('questioner_bsge.php?search=' + document.querySelector('[name="search"]').value);
            }
          })
          .catch(err => console.error(err));
      }
    });

    document.addEventListener('click', function (e) {
      if (e.target && e.target.id === 'unmarkSelectedBtn2') {
        e.preventDefault();

        const allCheckboxes = document.querySelectorAll('input[name="selected_quizzes[]"]');
        const unchecked = Array.from(allCheckboxes).filter(cb => !cb.checked);

        if (unchecked.length === 0) {
          Toastify({
            text: "No quizzes to unmark.",
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: "orange"
          }).showToast();
          return;
        }

        const formData = new FormData();
        unchecked.forEach(cb => formData.append('unselected_quizzes[]', cb.value));

        fetch('questioner_bsaben.php', {
          method: 'POST',
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            Toastify({
              text: data.message,
              duration: 3000,
              gravity: 'bottom',
              position: 'right',
              backgroundColor: data.success ? "green" : "red"
            }).showToast();

            if (data.success) {
              loadPage('questioner_bsaben.php?search=' + document.querySelector('[name="search"]').value);
            }
          })
          .catch(err => console.error(err));
      }
    });
  </script>
</body>

</html>