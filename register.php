<?php 
if ($_SERVER['REQUEST_METHOD']=='POST')
{

    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    // $email = $_POST['email'];
    // $password = $__POST['password'];
}
?>
<?php include "./header.php"?>
    <form action="" method="post">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I'm not a robot</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php include "./footer.php"?>
