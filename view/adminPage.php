<?php

use \model\ProductDao as Dao;

$productDao=new Dao();
$brands=$productDao->getAllBrands();
var_dump($brands);
$selected_brand=null;
$selected_category=null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="../index.php?target=product&action=insertProduct" method="post" enctype="multipart/form-data">
    <input type="hidden" name="target" value="user">
    <table>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="password" name="price" ></td>
        </tr>
        <tr>
            <td>Product Model</td>
            <td><input type="text" name="model" ></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="text" name="quantity" ></td>
        </tr>
        <tr>
            <td>Sub Category</td>
            <td><select name="category">
            <option value="Choose" <?php echo $selected_category == null ? "selected " : "" ?>>Choose</option>
            <?php foreach ($categories as $category){ ?>
                <option value="<?= $category ?>" <?php echo $selected_category == $category ? "selected " : ""; ?> > <?= $category ?></option>
            <?php }; ?>
                </select></td>
        </tr>
        <tr>
            <td>Brand</td>
            <td><select name="brand">


                    <option value="Choose-brand" <?php echo $selected_brand == null ? "selected " : "" ?>>Choose</option>
                    <?php foreach ($brands as $brand){ ?>
                        <option value="<?= $brand ?>" <?php echo $selected_brand == $brand ? "selected " : ""; ?> > <?= $brand ?></option>
                    <?php }; ?>


                </select></td>
        </tr>
        <tr>
            <td>Image1</td>
            <td><input type="file" name="first-image" ></td>
        </tr>
        <tr>
            <td>Image2</td>
            <td><input type="file" name="second-image" ></td>
        </tr>
        <tr>
            <td>Image3</td>
            <td><input type="file" name="third-image" ></td>
        </tr>
        <tr>
            <td>Image4</td>
            <td><input type="file" name="fourth-image" ></td>
        </tr>


        <tr>
            <td>
                <input type="submit" name="action" value="Upload Product">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
