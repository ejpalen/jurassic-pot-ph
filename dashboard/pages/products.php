<?php
    $productsQ = "SELECT * FROM `products` WHERE `productActiveStatus`='ACTIVE'";
    $productsRow = mysqli_num_rows(mysqli_query($conn, $productsQ));
?>
<div class="w-100 flex">
    <div class="editProductModal" id="editProductModal">
        <div class="editProductModalBox">
            <div class="editProductInnerCont">
                <div class="txt-center w-100 fs-Xb3 bold" style="padding: 0 0 20px 0;"><h1>Edit Product</h1></div>
                <div class="flex w-100 h-100" style="gap: 20px;">
                    <div class="editProductPFP">
                        <img class="productImg" id="EditproductImg" src="/jurassicpotph/media/products/<?=$row['productLOC']?>"/>
                    </div>
                    <div class="editProductInfos">
                        <input type="hidden" id="editProdID" value=""/>
                        <div class="editprod1">
                        <div class="w-100 fs-b2">Product Name
                        <input class="editProductInput" id="editProdName" type="text" value=""/>
                        </div>
                        <div class="w-100 fs-b2">Product Variant
                        <input class="editProductInput" id="editProdVar" type="text" value=""/>
                        </div>
                        </div>
                        <div class="editprod1">
                        <div class="w-100 fs-b2">Product Price
                        <input class="editProductInput" id="editProdPrice" type="number" value=""/>
                        </div>
                        <div class="w-100 fs-b2">Product Stocks
                        <input class="editProductInput" id="editProdStocks" type="number" value=""/>
                        </div>
                        </div>
                        <div class="w-100 fs-b2">Product Description</div>
                        <textarea id="editProdDesc" id="editProdDesc" class="editProducttextArea" rows="2" cols="30"></textarea>
                        <div class="w-100 fs-b2">Product Picture</div>
                        <input type="file" class="editProductInputFile" id="inputProdPFP"/>
                        <div class="editProductOption">
                            <div class="editProdBtn" id="editProdSaveBtn">Save</div>
                            <div class="editProdBtn" id="editProdCancelBtn">Cancel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="editProductModal" id="addProductModal">
        <div class="editProductModalBox">
            <div class="editProductInnerCont">
                <div class="txt-center w-100 fs-Xb3 bold" style="padding: 0 0 20px 0;"><h1>Add Product</h1></div>
                <div class="flex w-100 h-100" style="gap: 20px;">
                    <div class="editProductPFP">
                        <img class="productImg" id="addProductImg"/>
                    </div>
                    <div class="editProductInfos">
                    <div class="editprod1">
                        <div class="w-100 fs-b2">Product Name
                        <input class="editProductInput" id="addProdName" type="text" value=""/>
                        </div>
                        <div class="w-100 fs-b2">Product Variant
                        <input class="editProductInput" id="addProdVar" type="text" value=""/>
                        </div>
                        </div>
                        <div class="editprod1">
                        <div class="w-100 fs-b2">Product Price
                        <input class="editProductInput" id="addProdPrice" type="number" value=""/>
                        </div>
                        <div class="w-100 fs-b2">Product Stocks
                        <input class="editProductInput" id="addProdStocks" type="number" value=""/>
                        </div>
                        </div>
                        <div class="w-100 fs-b2">Product Description</div>
                        <textarea id="addProdDesc" class="editProducttextArea" rows="4" cols="50"></textarea>
                        <div class="w-100 fs-b2">Product Picture</div>
                        <input type="file" class="editProductInputFile" id="addProdPFP"/>
                        <div class="editProductOption">
                            <div class="editProdBtn" id="addProdSaveBtn">Add Product</div>
                            <div class="editProdBtn" id="addProdCancelBtn">Cancel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        
        <div class="homeTitle">
            <h1>Products</h1>
        </div>
        <div class="w-100" style="margin: 30px 0;">
        <h2 class="flex fs-b1 bold">Total Products</h2>
            <p class="flex fs-Xb3 bold"><?= $productsRow?></p>
        </div>
        <div class="w-100" style="margin: 30px 0;">
            <div class="addProductBtn" id="addProductBtn">
                <div class="flex ai-center">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add Product</p>
                </div>
            </div>
        </div>
        <div class="w-100">
            <div class="productsCont">
            <?php
            $query = "SELECT * FROM `products` WHERE `productActiveStatus`='ACTIVE'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="productCard">
                        <div class="productImgCont">
                            <img class="productImg" src="\jurassicpotph\media\products\<?=$row['productLOC']?>"/>
                        </div>
                        <div class="productName">
                            <div class="productCardName">
                                <?= $row['productName']." (".$row['productVar'].")"?>
                            </div>
                            <div class="productCardDesc1">
                                <div><?= "₱ ".number_format($row['productPrice'], 2)?></div>
                                <div><?= $row['stocks']." Stocks"?></div>
                            </div>
                        </div>
                        <div class="productActions">
                            <button class="button2" id="editProduct">Edit</button>
                            <button class="button2" id="deleteProduct">Delete</button>
                            <input type="hidden" id="productID" value="<?= $row['productID'] ?>">
                        </div>
                    </div>
                <?php
                }
            }
            else {
                
            }
            ?>
            </div>
        </div>
    </div>
</div>
<script>
    function redirectToProductPage(productID) {
        window.location.href = 'index.php?page=pages/dashboard/products.php&prodID=' + productID;
    }
    $("#inputProdPFP").change(function() {
        if ($(this).val()) {
            let file = $(this).prop("files")[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imageSrc = e.target.result;
                console.log(imageSrc);
                $("#EditproductImg").attr("src", imageSrc); // Set the src attribute of the <img> tag
                var fileName = file.name; // Get the file name
                console.log("File name: " + fileName);
            };

            reader.readAsDataURL(file); // Read the file as data URL
        } else {
            // No file is selected
            console.log("No file selected");
        }
    });
    $("#addProdPFP").change(function() {
        if ($(this).val()) {
            let file = $(this).prop("files")[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imageSrc = e.target.result;
                console.log(imageSrc);
                $("#addProductImg").attr("src", imageSrc); // Set the src attribute of the <img> tag
                var fileName = file.name; // Get the file name
                console.log("File name: " + fileName);
            };

            reader.readAsDataURL(file); // Read the file as data URL
        } else {
            // No file is selected
            console.log("No file selected");
        }
    });

</script>