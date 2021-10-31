
    <?php include '../../db/db.php' ?>
<?php 
$id = ( isset( $_REQUEST['id']) && !empty( $_REQUEST['id']))?$_REQUEST['id']:"";
$sql = "SELECT * from category where id=".$id."";
$sql_categories="SELECT * from category";
$query = $connect->query($sql_categories);

$query->setFetchMode(PDO::FETCH_OBJ);
$categories    = $query->fetchall();
// echo "<pre>";
// print_r($categories);
// echo "</pre>";

// die();

    if ($_SERVER['REQUEST_METHOD']=='POST')
{

    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $id_category = $_POST['id_category'];

    
    if($name == "" )
    {
      
        echo "Vui lòng nhập dữ liệu";
         
        }
    else
    {
        $created_at= $update_at = date('Y:m:d H:s:i');
        // lưu vào database
        $sql = "UPDATE products SET name='".$name."',price='".$price."',image='".$image."',content='".$content."',id_category='".$id_category."' where products.id=".$id." ";
    echo $sql;
        $productlist = $connect->query($sql);
        echo $sql;
    
    
    
    // trả về dữ liệu
    
    header("Location: index.php");
    }
 } ?>


<?php include "../layout/header.php"?>
<h2 class="text-center">Thêm mới sản phẩm </h2>
</div>
<div class="panel-body">
    <form action="" method="post">
        <div class="form-group">
            <label for="usr">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="usr">Giá sản phẩm:</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="usr">Hình ảnh:</label>
            <input type="text" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="usr">Content:</label>
            <textarea type="text" row="5" class="form-control" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="usr">Danh mục sản phẩm:</label>
            <select type="text" class="form-control" name="id_category">
                <option>--Lựa chọn danh mục--</option>
<?php
//Lấy tất cả từ bảng thể loại
  $sql    = "SELECT * FROM category";
 //thực hiện truy vấn
 $categorylist  = $connect->query( $sql ); 
  ?>
<?php foreach($categories as $key => $category): ?>
                  <option value="<?= $category->id?>"> <?=  $category->name ?></option> 
<?php endforeach ; ?>

            </select>
        </div>



        <button class="btn btn-success" type="submit">Lưu</button>
</div>
</form>
</div>
</tbody>
</table>

</div>
</body>

</html>