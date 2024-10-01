document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const role = document.getElementById("role").value;

    if (username && password) {
        document.getElementById("login-section").style.display = "none";
        document.getElementById("dashboard").style.display = "block";
        document.getElementById("userRole").textContent = role;

        if (role === "student") {
            document.getElementById("student-section").style.display = "block";
        } else {
            document.getElementById("teacher-section").style.display = "block";

            if (role === "classTeacher") {
                document.getElementById("edit-marks-heading").style.display = "block";
                document.getElementById("update-marks").style.display = "block";
                document.getElementById("edit-notices-heading").style.display = "block";
            } else if (role === "subjectTeacher") {
                document.getElementById("edit-marks-heading").style.display = "block";
                document.getElementById("update-marks").style.display = "block";
            }
        }
    } else {
        alert("Please enter valid credentials");
    }
});

// Functionality for teachers to update attendance and marks
document.getElementById("update-attendance").addEventListener("click", function () {
    const studentId = document.getElementById("edit-attendance-id").value;
    const newAttendance = document.getElementById("edit-attendance-value").value;
    alert(`Attendance for Student ID ${studentId} updated to ${newAttendance}%`);
});

document.getElementById("update-marks").addEventListener("click", function () {
    const studentId = document.getElementById("edit-marks-id").value;
    const newMarks = document.getElementById("edit-marks-value").value;
    alert(`Marks for Student ID ${studentId} updated to ${newMarks}`);
});

// Class teacher can post notices
document.getElementById("post-notice").addEventListener("click", function () {
    const newNotice = document.getElementById("new-notice").value;
    alert(`New notice posted: ${newNotice}`);
});
