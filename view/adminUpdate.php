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
                <td>Име на продукт</td>
                <td><input type="text" name="name" value="<?=$productData["name"]?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Цена</td>
                <td><input type="text" name="price" value="<?=$productData["price"]?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Модел</td>
                <td><input type="text" name="model" value="<?=$productData["model"]?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Количество</td>
                <td><input type="text" name="quantity" value="<?=$productData["quantity"]?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td><select name="category">
                        <option value="Choose">Избери</option>
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


                        <option value="Choose-brand">Избери</option>
                        <?php foreach ($brands as $brand) { ?>
                            <option value="<?= $brand["id"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                                <?= $brand["name"] ?></option>
                        <?php }; ?>


                    </select></td>
            </tr>

                <td>Качи снимки</td>
                <td><input type="file" name="files[]" multiple/></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="action" value="Промени" class="btn btn-danger">
                </td>
            </tr>
        </table>
    </form >
    <form action="/IT-Talents/index.php?target=product&action=insertSpecification" method="post">
    <div>
        <input type="hidden" name="id" value="<?=$productId?>">
        <table>
        <tr>
            <td>Име на спецификация</td>
            <td><input type="text" name="name" class="form-control"></td>
        </tr>
        <tr>
            <td>Стойност на спецификация</td>
            <td><input type="text" name="value" class="form-control"></td>
        </tr>
        <tr>
        <td>
            <input type="submit" name="actionn" value="Добави спецификация" class="btn btn-danger">
        </td>
        </tr>
        </table>
    </div>
    </form>
    <div>

</body>
</html>
