<?php
require_once "navigation.php";
?>

<body>
<div style="margin-left: 100px;float: left">
    <form action="/IT-Talents/index.php?target=product&action=insertProduct" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="target" value="user">
        <table>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td>Product Model</td>
                <td><input type="text" name="model"></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="quantity"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="category">
                        <option value="Choose">Choose</option>
                        <?php

                        var_dump($subCategories);
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
            <tr>
                <td>Specification name</td>
                <td><input type="text" name="spec-name"></td>
            </tr>
            <tr>
                <td>Specification value</td>
                <td><input type="text" name="spec-value"></td>
            </tr>
            <tr>
                <td>Upload images</td>
                <td><input type="file" name="files[]" multiple/></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="action" value="Upload Product">
                </td>
            </tr>
        </table>
    </form>
</div>
<div style="margin-right: 100px;float: right">
    <form action="/IT-Talents/index.php?target=product&action=insertProduct" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="target" value="user">
        <table>
            <tr>
                <td>Product Id</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td>Product Model</td>
                <td><input type="text" name="model"></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="quantity"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="category">
                        <option value="Choose">Choose</option>
                        <?php

                        var_dump($subCategories);
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
            <tr>
                <td>Specification name</td>
                <td><input type="text" name="spec-name"></td>
            </tr>
            <tr>
                <td>Specification value</td>
                <td><input type="text" name="spec-value"></td>
            </tr>
            <tr>
                <td>Upload images</td>
                <td><input type="file" name="files[]" multiple/></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="action" value="Edit Product">
                </td>
            </tr>
        </table>
    </form>
    <div>
</body>
</html>
