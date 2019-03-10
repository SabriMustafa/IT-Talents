<?php
require_once "navigation.php";

?>

<body>

<div style="margin-right: 100px;float: right">
    <form action="/IT-Talents/index.php?target=product&action=editProduct" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$productId?>">
        <table>

            <tr>
                <td>Product Name</td>
                <td><input type="text" name="name" value="<?=$productData["name"]?>"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" value="<?=$productData["price"]?>"></td>
            </tr>
            <tr>
                <td>Product Model</td>
                <td><input type="text" name="model" value="<?=$productData["model"]?>"></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="quantity" value="<?=$productData["quantity"]?>"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="category">
                        <option value="Choose">Choose</option>
                        <?php


                        foreach ($subCategories as $subCategory) { ?>
                            <option value="<?= $subCategory["id"] ?>" <?php echo $selected_category == $subCategory["name"] ? "selected " : ""; ?> >
                                <?= $subCategory["name"] ?></option>
                        <?php }; ?>
                    </select></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td><select name="brand">


                        <option value="Choose-brand">Choose</option>
                        <?php foreach ($brands as $brand) { ?>
                            <option value="<?= $brand["id"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                                <?= $brand["name"] ?></option>
                        <?php }; ?>


                    </select></td>
            </tr>

                <td>Upload images</td>
                <td><input type="file" name="files[]" multiple/></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="action" value="Edit Product">
                </td>
            </tr>
        </table>
    </form >
    <form action="/IT-Talents/index.php?target=product&action=insertSpecification" method="post">
    <div>
        <input type="hidden" name="id" value="<?=$productId?>">
        <table>
        <tr>
            <td>Specification name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Specification value</td>
            <td><input type="text" name="value"></td>
        </tr>
        <tr>
        <td>
            <input type="submit" name="actionn" value="Add Specifications">
        </td>
        </tr>
        </table>
    </div>
    </form>
    <div>

</body>
</html>
