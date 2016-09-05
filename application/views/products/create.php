<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create Product</title>
    </head>
    <body>
        <?php echo form_open('product/save');?>
        <?php echo form_dropdown('product_category_id',(array)$categories, $product->product_category_id);?>
        <?php echo form_hidden('product_id',$product->product_id);?>
        <?php echo form_label('name'); echo form_input('product_name',$product->product_name);?>
        <?php echo form_label('description'); echo form_input('product_description',$product->product_description);?>
        <?php echo form_label('price'); echo form_input('product_price',$product->product_price);?>
        <?php echo form_submit('save','save');?>
        <?php echo form_close();?>
    </body>
</html>
