<?php
require_once "navigation.php";
?>

<div style="margin-left: 100px;float: left">
    <form action="/IT-Talents/index.php?target=product&action=insertProduct" method="post"
          enctype="multipart/form-data">

        <table>
            <tr>
                <td>Име на Продукт</td>
                <td><input type="text" name="name"  class="form-control"></td>
            </tr>
            <tr>
                <td>Цена</td>
                <td><input type="text" name="price"  class="form-control"></td>
            </tr>
            <tr>
                <td>Модел</td>
                <td><input type="text" name="model"  class="form-control"></td>
            </tr>
            <tr>
                <td>Количество</td>
                <td><input type="text" name="quantity"  class="form-control"></td>
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
                <td>Марка</td>
                <td><select name="brand">


                        <option value="Choose-brand">Избери</option>
                        <?php foreach ($brands as $brand) { ?>
                            <option value="<?= $brand["id"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                                <?= $brand["name"] ?></option>
                        <?php }; ?>


                    </select></td>
            </tr>
            <tr>
                <td>Име на спецификация </td>
                <td><input type="text" name="spec-name"  class="form-control"></td>
            </tr>
            <tr>
                <td>Стойност на спецификация</td>
                <td><input type="text" name="spec-value"  class="form-control"></td>
            </tr>
            <tr>
                <td>Качи снимки</td>
                <td><input type="file" name="files[]" multiple/></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="action" value="Запиши продукт" class="btn btn-danger">
                </td>
            </tr>
        </table>
    </form>
</div>
