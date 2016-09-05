<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Products</title>
    </head>
    <body>
        <table>
            <thead>S.No</thead>
            <thead>Name</thead>
            <thead>Description</thead>
            <thead>Price</thead>
            <thead>Category</thead>
            <thead>Operations</thead>

            <?php $index = 1;?>
            <?php foreach ($products as $product):?>
                <tr>
                    <td><?=$index++?></td>
                    <td><?= $product->product_name?></td>
                    <td><?= $product->product_description?></td>
                    <td><?= $product->product_price?></td>
                    <td><?= $product->product_category_id?></td>
                    <td><?= anchor("product/edit/{$product->product_id}",'Edit')?> | <?= anchor("product/delete/{$product->product_id}",'Delete')?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>
