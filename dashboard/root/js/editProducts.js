$(document).ready(function () {
  $("#addProductBtn").click(function () {
    $("#addProductImg").removeAttr("src");
    $("#addProductModal").css("display", "flex");
    $("body").addClass("no-scrollbar");
  });

  $(".productActions").on("click", "#editProduct", function () {
    let button = $(this);
    let productID = button.siblings("#productID").val();
    $("#editProductModal").css("display", "flex");

    $.ajax({
      url: "pages/dashboard/productID.php",
      type: "POST",
      data: { prodID: productID },
      success: function (response) {
        let data = JSON.parse(response);
        $("#editProdID").val(data.id);
        $("#editProdName").val(data.name);
        $("#editProdVar").val(data.variant);
        $("#editProdPrice").val(data.price);
        $("#editProdStocks").val(data.stocks);
        $("#EditproductImg").attr(
          "src",
          "/jurassicpotph/media/products/" + data.pfp
        );
        $("#editProdDesc").text(data.description);
        $("#inputProdPFP").val("");

        $("body").addClass("no-scrollbar");
      },
      error: function (xhr, status, error) {
        console.error("Error:", xhr.status, error);
      },
    });

    $("#editProductModal").css("display", "flex");
  });

  $(".productActions").on("click", "#deleteProduct", function () {
    let button = $(this);
    let prodID = button.siblings("#productID").val();

    $.ajax({
      url: "pages/dashboard/deleteProduct.php",
      type: "POST",
      data: { prodID: prodID },
      success: function (response) {
        if (response === "success") {
          alert("Product Deleted");
          location.reload();
        } else {
          alert("Error Occured");
        }
      },
    });
  });

  $("#editProdSaveBtn").click(function () {
    if ($("#inputProdPFP").val()) {
      let file = $("#inputProdPFP").prop("files")[0];
      let productID = $("#editProdID").val();

      var reader = new FileReader();

      reader.onload = function (e) {
        var imageSrc = e.target.result;
        console.log(imageSrc);
        $("#EditproductImg").attr("src", imageSrc); // Set the src attribute of the <img> tag
        var fileName = file.name; // Get the file name

        // AJAX request to upload the file
        var formData = new FormData();
        formData.append("file", file);

        $.ajax({
          url: "pages/dashboard/saveImgToDir.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            console.log(response);
          },
          error: function (xhr, status, error) {
            console.error("Error uploading file:", error);
          },
        });

        $.ajax({
          url: "pages/dashboard/saveImgToDb.php",
          type: "POST",
          data: {
            img: fileName,
            prodID: productID,
          },
          success: function (response) {
            console.log(response);
          },
          error: function (xhr, status, error) {
            console.error("Error uploading file:", error);
          },
        });
      };

      reader.readAsDataURL(file);
    } else {
      // No file is selected
      console.log("No file selected");
    }

    let productID = $("#editProdID").val();
    let productName = $("#editProdName").val();
    let productVar = $("#editProdVar").val();
    let productPrice = $("#editProdPrice").val();
    let productStock = $("#editProdStocks").val();
    let productDesc = $("#editProdDesc").val();

    $.ajax({
      url: "pages/dashboard/productSaveEdit.php",
      type: "POST",
      data: {
        prodID: productID,
        prodName: productName,
        prodVar: productVar,
        prodPrice: productPrice,
        prodStock: productStock,
        prodDesc: productDesc,
      },
      success: function (response) {
        if (response === "success") {
          alert("Product Successfully Updated");
          location.reload();
        } else {
          alert("Error Occured");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", xhr.status, error);
      },
    });
  });

  $("#editProdCancelBtn").click(function () {
    $("#editProductModal").hide();
    $("body").removeClass("no-scrollbar");
  });

  $(window).on("click", function (event) {
    if ($(event.target).is("#editProductModal")) {
      $("#editProductModal").hide();
      $("body").removeClass("no-scrollbar");

      $("#editProdID").val("");
      $("#editProdName").val("");
      $("#editProdVar").val("");
      $("#editProdPrice").val("");
      $("#editProdStocks").val("");
      $("#editproductImg").attr("");
      $("#editProdDesc").text("");
      $("#inputProdPFP").val("");
    }
    if ($(event.target).is("#addProductModal")) {
      $("#addProductModal").hide();
      $("body").removeClass("no-scrollbar");

      $("#addProdID").val("");
      $("#addProdName").val("");
      $("#addProdVar").val("");
      $("#addProdPrice").val("");
      $("#addProdStocks").val("");
      $("#addProductImg").removeAttr("src");
      $("#addProdDesc").text("");
      $("#addProdPFP").val("");
    }
  });
});
