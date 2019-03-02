
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="/IT-Talents/index.php?target=product&action=insertProduct" method="post" enctype="multipart/form-data">
    <input type="hidden" name="target" value="user">
    <table>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" ></td>
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
            <td>Category</td>
            <td><select name="category">
            <option value="Choose" >Choose</option>
            <?php foreach ($subCategories as $subCategory){ ?>
                <option value="<?= $subCategory["name"] ?>" <?php echo $selected_category == $subCategory["name"] ? "selected " : ""; ?> >
                    <?= $subCategory["name"] ?></option>
            <?php }; ?>
                </select></td>
        </tr>
        <tr>
            <td>Brand</td>
            <td><select name="brand">


                    <option value="Choose-brand" >Choose</option>
                    <?php foreach ($brands as $brand){ ?>
                        <option value="<?= $brand["name"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                            <?= $brand["name"] ?></option>
                    <?php }; ?>


                </select></td>
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
</body>
</html>
