<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/main.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/input.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/productList.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Product List</h1>
        <div class="header-buttons">
            <form action="<?=ROOT?>addproduct/index" method="GET">
                <button type="submit" class="blue-button"> Add Product </button>
            </form>
            <button class="red-button" id="delete-product-btn" form="mass_delete"> Delete Selected </button>
        </div>
    </header>

    <form action="<?=ROOT?>home/massDelete" method="POST" id="mass_delete">
        <div class="Product-List">
            <?php $data['Product']->DisplayAllProducts() ?>
        </div>
    </form>
</body>
</html>