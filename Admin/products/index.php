<?php session_start(); ?>
<?php include "../layout/header.php"?>
<?php if (isset($_SESSION['success'])) : ?>
<p><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
<p><?= $_SESSION['error']; unset($_SESSION['error']);  ?></p>
<?php endif; ?>

<h2 class="text-center"> Quản Lý Sản Phẩm </h2>
</div>

<?php //Lấy tất cả từ bảng thể loại
 $sql    = "SELECT products.id, products.name, products.price, products.image, products.updated_at, category.name categoryname from products left join category on products.id_category=category.id";
 //thực hiện truy vấn
 $productlist  = $connect->query( $sql );
 //tùy chọn kiểu trả về
 $productlist->setFetchMode(PDO::FETCH_OBJ);
 //lấy tất cả kết quả
 $rows   = $productlist->fetchAll();?>
<a class="btn btn-success" href="create.php">Thêm danh mục </a>
<table class="table">
    <thead>
        <tr class="p-3 mb-2 bg-danger text-white">
            <th scope="col" width="50px">ID</th>
            <th scope="col">Imge</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            
            <th scope="col">CategoryName</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $key => $products): ?>

        <tr>
            <td> <?php echo $products->id ;   ?> </td>
            <td> <img src="<?php echo $products->image ; ?>" style="max-width: 100px"/> </td>
            <td> <?php echo $products->name ; ?> </td>
            <td> <?php echo $products->price ; ?> </td>
          

            <td> <?php echo $products->categoryname ; ?> </td>
            <td> <?php echo $products->updated_at ; ?> </td>
            </td>
            <td>
                <a class="btn btn-primary" href="update.php?id=<?= $products->id ;?>">Edit</a> <a class="btn btn-danger"
                    href="delete.php?id=<?= $products->id ;?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endforeach ; ?>
        </div>
    </tbody>
</table>

</div>
</body>

</html>