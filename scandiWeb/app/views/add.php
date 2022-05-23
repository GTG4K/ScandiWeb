<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/main.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/input.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/add.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Add Product</h1>
        <div class="header-buttons">
            <button type="submit" form="product_form" class="blue-button"> Save </button>
            <form action="<?=ROOT?>/">
                <button class="red-button"> Back </button>
            </form>
        </div>
    </header>

        <div class="form-box">
        <h2>Enter Product Details</h2>
        <form action="<?=ROOT?>addproduct/new" id="product_form" method="POST">
            <div class="input-box">
                <input type="text" id='sku' name='sku' required>
                <label>SKU</label>
            </div>
            <div class="input-box">
                <input type="text" id='name' name='name' required>    
                <label>Name</label>
            </div>
            <div class="input-box">
                <input type="text" id='price' name='price' required>
                <label>Price</label>
            </div>
            <select name="productType" id="productType" placeholder="productType" onchange="changeForm(this.id, 'additional-details')">
                <option value="1">DVD</option>
                <option value="2">Book</option>
                <option value="3">Furniture</option>
            </select>
            <div id="additional-details">
            <div class="input-box">
                <input type="number" id='size' name='size' required>
                <label>Size</label>
            </div>
            </div>
        </form>
    </div>

    <script src="<?=ASSETS?>js/dynamicForm.js"></script>
</body>
</html>
