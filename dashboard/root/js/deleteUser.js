$(document).ready(function () {
  $(".table1").on("click", "#deleteUser", function () {
    var button = $(this);
    var userID = button.siblings("#userID").val();

    // Send AJAX request to update userStatus
    $.ajax({
      url: "pages/dashboard/deleteUser.php",
      type: "POST",
      data: { userID: userID },
      success: function (response) {
        if (response === "success") {
          alert("User " + userID + ": Successfully Deleted.");
          button.closest(".table1Row").remove();
        } else {
          alert("Failed to delete user. Please try again.");
        }
      },
      error: function () {
        alert("An error occurred. Please try again later.");
      },
    });
  });
});
