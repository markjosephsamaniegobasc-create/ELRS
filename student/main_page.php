<?php
session_start();
include('../conn.php');
$email = $_SESSION['email'] ?? 'Student';
$firstname = $_SESSION['firstname'] ?? 'Student';
$studentCourse = $_SESSION['course'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student</title>

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

    .form-check-label strong {
      margin-right: 6px;
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
            <?php if ($studentCourse === 'bsge'): ?>
              <li class="nav-item">
                <a class="nav-link load-page" href="#" data-page="reviewer_bsge.php">
                  <i class="fa-solid fa-ruler-vertical me-2"></i>BSGE
                </a>
              </li>
            <?php elseif ($studentCourse === 'bsaben'): ?>
              <li class="nav-item">
                <a class="nav-link load-page" href="#" data-page="reviewer_bsaben.php">
                  <i class="fa-solid fa-seedling me-2"></i>BSABEN
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          href="#questionerSubmenu" role="button" aria-expanded="false" aria-controls="questionerSubmenu">
          <span><i class="fa-solid fa-question me-2"></i>Quiz</span>
          <i class="fa fa-caret-down"></i>
        </a>
        <div class="collapse" id="questionerSubmenu">
          <ul class="nav flex-column ms-3">
            <?php if ($studentCourse === 'bsge'): ?>
              <li class="nav-item">
                <a class="nav-link load-page" href="#" data-page="quiz.php?course=bsge">
                  <i class="fa-solid fa-ruler-vertical me-2"></i>BSGE
                </a>
              </li>
            <?php elseif ($studentCourse === 'bsaben'): ?>
              <li class="nav-item">
                <a class="nav-link load-page" href="#" data-page="quiz.php?course=bsaben">
                  <i class="fa-solid fa-seedling me-2"></i>BSABEN
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
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
      <div>
        <h5 class="mb-3">Dashboard</h5>
      </div>
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-3">
                Reviewer
              </h5>
              <div class="mb-3">
                <i class="fa-solid fa-book fa-3x"></i>
              </div>
              <div>
                <?php if ($studentCourse === 'bsge'): ?>
                  <a class="load-page btn btn-success" href="#" data-page="reviewer_bsge.php">View Materials</a>
                <?php elseif ($studentCourse === 'bsaben'): ?>
                  <a class="load-page btn btn-success" href="#" data-page="reviewer_bsaben.php">View Materials</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-3">
                Quiz
              </h5>
              <div class="mb-3">
                <i class="fa-solid fa-question fa-3x"></i>
              </div>
              <div>
                <?php if ($studentCourse === 'bsge'): ?>
                  <a class="load-page btn btn-success" href="#" data-page="quiz.php?course=bsge">Take Quiz</a>
                <?php elseif ($studentCourse === 'bsaben'): ?>
                  <a class="load-page btn btn-success" href="#" data-page="quiz.php?course=bsaben">Take Quiz</a>
                <?php endif; ?>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script>
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

    (() => {
      const contentEl = document.querySelector(".content");

      let quizState = null;
      let timeLeft = 0;
      let totalTime = 0;
      let timerId = null;
      let timerStarted = false;

      function formatTime(seconds) {
        const h = Math.floor(seconds / 3600);
        const m = Math.floor((seconds % 3600) / 60);
        const s = seconds % 60;

        if (h > 0) {
          return `${h} hr ${m} min ${s} sec`;
        }
        else if (m > 0) {
          return `${m} min ${s} sec`;
        }
        else {
          return `${s} sec`;
        }
      }

      function startTimer() {
        clearInterval(timerId);
        timeLeft = totalTime;

        const timerDisplay = document.getElementById('quizTimer');
        timerDisplay.textContent = formatTime(timeLeft);

        timerId = setInterval(() => {
          timeLeft--;
          timerDisplay.textContent = formatTime(timeLeft);

          if (timeLeft <= 0) {
            clearInterval(timerId);
            timerDisplay.textContent = 'Time’s up!';
            submitQuiz();
          }
        }, 1000);
      }

      function renderQuestion() {
        if (!quizState) return;
        const q = quizState.questions[quizState.index];

        const progress = document.getElementById("quizProgress");
        const subjEl = document.getElementById("quizSubject");
        if (progress) progress.textContent = `${quizState.index + 1}/${quizState.total}`;
        if (subjEl) subjEl.textContent = quizState.subject;

        const qText = document.getElementById("quizQuestion");
        const opts = document.getElementById("quizOptions");
        if (!qText || !opts) return;

        qText.textContent = q.question;
        opts.innerHTML = "";

        const optionKeys = ["option1", "option2", "option3", "option4"];
        optionKeys.forEach((key, i) => {
          const id = `opt_${quizState.index}_${i + 1}`;
          const checked = quizState.answers[quizState.index] === key ? "checked" : "";

          const letter = String.fromCharCode(65 + i);

          const wrapper = document.createElement("div");
          wrapper.className = "btn-group mb-2 w-100";
          wrapper.innerHTML = `
    <input type="radio" class="btn-check" name="answer" id="${id}" value="${key}" autocomplete="off" ${checked}>
    <label class="btn btn-outline-primary w-100" for="${id}">
      <strong>${letter}.</strong> ${escapeHtml(q[key])}
    </label>
  `;
          opts.appendChild(wrapper);
        });

        const nextBtn = document.getElementById("nextBtn");
        const submitBtn = document.getElementById("submitBtn");
        const backBtn = document.getElementById("backBtn");

        const atFirst = quizState.index === 0;
        const atLast = quizState.index === (quizState.total - 1);

        if (backBtn) backBtn.classList.toggle("d-none", false);
        if (nextBtn) nextBtn.classList.toggle("d-none", atLast);
        if (submitBtn) submitBtn.classList.toggle("d-none", !atLast);

        document.getElementById("quizBody")?.classList.remove("d-none");
        document.getElementById("quizResult")?.classList.add("d-none");
      }

      function computeScore() {
        let score = 0;
        if (!quizState) return score;
        quizState.questions.forEach((q, i) => {
          const chosen = quizState.answers[i];
          if (chosen && q.answer && String(chosen).toLowerCase() === String(q.answer).toLowerCase()) {
            score++;
          }
        });
        return score;
      }

      function resetQuizUI() {
        document.getElementById("quizProgress") && (document.getElementById("quizProgress").textContent = "");
        document.getElementById("quizSubject") && (document.getElementById("quizSubject").textContent = "");
        document.getElementById("quizQuestion") && (document.getElementById("quizQuestion").textContent = "");
        document.getElementById("quizOptions") && (document.getElementById("quizOptions").innerHTML = "");
        document.getElementById("quizBody") && document.getElementById("quizBody").classList.remove("d-none");
        document.getElementById("quizResult") && document.getElementById("quizResult").classList.add("d-none");
        document.getElementById("quizScore") && (document.getElementById("quizScore").textContent = "0");

        const backBtn = document.getElementById("backBtn");
        const nextBtn = document.getElementById("nextBtn");
        const submitBtn = document.getElementById("submitBtn");
        if (nextBtn) nextBtn.classList.remove("d-none");
        if (submitBtn) submitBtn.classList.add("d-none");
      }

      function escapeHtml(str) {
        return String(str)
          .replaceAll("&", "&amp;")
          .replaceAll("<", "&lt;")
          .replaceAll(">", "&gt;")
          .replaceAll('"', "&quot;")
          .replaceAll("'", "&#039;");
      }

      contentEl.addEventListener("click", async (e) => {
        const btn = e.target.closest(".take-quiz-btn");
        if (!btn) return;

        const subject = btn.getAttribute("data-subject") || "";
        const course = btn.getAttribute("data-course") || "";
        if (!subject) return;

        const subjEl = document.getElementById("quizSubject");
        if (subjEl) subjEl.textContent = subject;

        try {
          const res = await fetch(`fetch_quiz.php?course=${encodeURIComponent(course)}&subject_name=${encodeURIComponent(subject)}`);
          const data = await res.json();

          if (!data.success) {
            const quizBody = document.getElementById("quizBody");
            if (quizBody) {
              quizBody.innerHTML = `<p class="text-center text-danger">${data.message}</p>`;
            }
            document.getElementById("quizResult")?.classList.add("d-none");
            document.getElementById("backBtn")?.classList.add("d-none");
            document.getElementById("nextBtn")?.classList.add("d-none");
            document.getElementById("submitBtn")?.classList.add("d-none");
            return;
          }

          totalTime = (data.timer ?? 0) > 0 ? data.timer * 3600 : 30;
          if (!timerStarted) {
            startTimer();
            timerStarted = true;
          }

          quizState = {
            subject,
            course,
            questions: data.questions,
            total: data.questions.length,
            index: 0,
            answers: new Array(data.questions.length).fill(null),
          };

          renderQuestion();
        } catch (err) {
          console.error(err);
          Toastify({
            text: "Failed to load quiz.",
            duration: 3000, gravity: "bottom", position: "right", backgroundColor: "red",
          }).showToast();
        }
      });

      contentEl.addEventListener("change", (e) => {
        if (!quizState) return;
        if (e.target && e.target.name === "answer") {
          const chosen = e.target.value;
          quizState.answers[quizState.index] = chosen;

          const q = quizState.questions[quizState.index];

          fetch("save_quiz_result.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
              question: q.question,
              option1: q.option1,
              option2: q.option2,
              option3: q.option3,
              option4: q.option4,
              answer: q.answer,
              answered: chosen,
              subject_name: quizState.subject
            })
          })
            .then(res => res.json())
            .then(data => {
              if (!data.success) {
                console.error("Failed to save question answer:", data.message);
              }
            })
            .catch(err => console.error(err));
        }
      });

      contentEl.addEventListener("click", (e) => {
        if (!quizState) return;

        if (e.target && e.target.id === "nextBtn") {
          e.preventDefault();
          if (quizState.answers[quizState.index] == null) {
            Toastify({
              text: "Please select an option.",
              duration: 2000, gravity: "bottom", position: "right", backgroundColor: "red",
            }).showToast();
            return;
          }
          quizState.index++;
          renderQuestion();
        }

        if (e.target && e.target.id === "backBtn") {
          e.preventDefault();
          if (quizState.index > 0) {
            quizState.index--;
            renderQuestion();
          }
        }

        if (e.target && e.target.id === "submitBtn") {
          e.preventDefault();
          if (quizState.answers[quizState.index] == null) {
            Toastify({
              text: "Please select an option.",
              duration: 2000, gravity: "bottom", position: "right", backgroundColor: "red",
            }).showToast();
            return;
          }

          clearInterval(timerId);

          const score = computeScore();
          const scoreEl = document.getElementById("quizScore");
          if (scoreEl) scoreEl.textContent = `${score}/${quizState.total}`;

          const subject = document.getElementById("quizSubject").innerText;
          const finalScore = document.getElementById("quizScore").innerText;

          fetch("save_final_score.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
              subject_name: subject,
              score: finalScore
            })
          })
            .then(res => res.json())
            .then(data => {
              if (data.success) {
                console.log("Score saved:", data.message);
                Toastify({
                  text: "Score saved successfully!",
                  duration: 3000,
                  gravity: "bottom",
                  position: "right",
                  backgroundColor: "green",
                }).showToast();
              } else {
                console.error(data.message);
                Toastify({
                  text: "Failed to save score.",
                  duration: 3000,
                  gravity: "bottom",
                  position: "right",
                  backgroundColor: "red",
                }).showToast();
              }
            })
            .catch(err => console.error(err));

          document.getElementById("quizBody")?.classList.add("d-none");
          document.getElementById("quizResult")?.classList.remove("d-none");

          document.getElementById("nextBtn")?.classList.add("d-none");
          document.getElementById("submitBtn")?.classList.add("d-none");
          document.getElementById("backBtn")?.classList.add("d-none");
        }
      });

      document.addEventListener("hidden.bs.modal", (ev) => {
        if (ev.target && ev.target.id === "quizModal") {
          quizState = null;
          resetQuizUI();
          clearInterval(timerId);
          timerStarted = false;
        }
      });

    })();
  </script>

  <?php if (isset($_SESSION['welcome'])): ?>
    <script>
      Toastify({
        text: "<?= $_SESSION['welcome'] ?>",
        duration: 4000,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#28a745",
      }).showToast();
    </script>
    <?php unset($_SESSION['welcome']); ?>
  <?php endif; ?>
</body>

</html>