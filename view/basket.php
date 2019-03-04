<?php

require  "navigation.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Кошница</title>
</head>
<body>
<h1 style="margin-left: 110px">Потребителска кошница</h1>
<div class="container" >
    <div class="row" >
        <div class="col-xs-8" >
            <div class="panel panel-info" style="border: 1px solid gray" style="width: 100%" >
                <div class="panel-heading"  style="background-color: gray" >
                    <div class="panel-title" >
                        <div class="row">

                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block" style="background-color: red">
                                    <a href="../index.php">Добави още продукти</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="<?php echo $_SESSION["img"]; ?>">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong><?php echo $_SESSION["tehnika"]["model"]; ?> </strong></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h4>Цена</h4>
                                <h6><strong><?php echo $_SESSION["tehnika"]["price"]."лв."; ?></strong></h6>
                            </div>

                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>


                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Общо за плащане:
                                <strong>
                                    <?php $allPrice = 0;
                                          $allPrice  += $_SESSION["tehnika"]["price"];
                                          echo $allPrice."лв.";
                                    ?>
                                </strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-success btn-block" style="background-color: red">
                                Поръчай
                            </button>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
