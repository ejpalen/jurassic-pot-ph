$(document).ready(function () {
  $("#addProdSaveBtn").click(function () {
    let productName = $("#addProdName").val();
    let productVar = $("#addProdVar").val();
    let productPrice = $("#addProdPrice").val();
    let productStock = $("#addProdStocks").val();
    let productDesc = $("#addProdDesc").val();
    if (
      productName === "" ||
      productVar === "" ||
      productPrice === "" ||
      productStock === "" ||
      productDesc === ""
    ) {
      alert("Please Complete the form");
    } else {
      if ($("#addProdPFP").val()) {
        var file = $("#addProdPFP").prop("files")[0];

        var reader = new FileReader();

        reader.onload = function (e) {
          var imageSrc = e.target.result;
          console.log(imageSrc);
          $("#addProductImg").attr("src", imageSrc); // Set the src attribute of the <img> tag
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
            url: "pages/dashboard/addProduct.php",
            type: "POST",
            data: {
              prodName: productName,
              prodVar: productVar,
              prodPrice: productPrice,
              prodStock: productStock,
              prodDesc: productDesc,
              prodPFP: fileName,
            },
            success: function (response) {
              console.log(response);
              if (response === "success") {
                alert("Product Successfully Added");
                location.reload();
              } else {
                alert("Error has occured");
              }
            },
            error: function (xhr, status, error) {
              console.error("Error uploading file:", error);
            },
          });
        };

        reader.readAsDataURL(file);
      } else {
        console.log("No file selected");
      }
    }
  });
});
