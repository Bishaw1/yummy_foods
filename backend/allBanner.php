<?php
include './inc/header_index.php';
require_once '../inc/env.php';
$query="SELECT * FROM banners";
$response = mysqli_query($conn,$query); 
$banners = mysqli_fetch_all($response,1);

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h2>All Banner here</h2>
<table class="table table-responsive">
        <tr>
            <th>#</th>
            <th>Banner Title</th>
            <th>Banner Desc</th>
            <th>Banner Img</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php
        foreach($banners as $key=>$banner){
        
        ?>

        <tr>
            <td>
                <?=++$key?>
            </td>
            <td>
                <?=$banner['title']?>
            </td>
            <td>
                <?=strlen($banner['detail'] ) > 20 ? substr($banner['detail'],0,15) 
                . ".....":$banner['detail']?>
            </td>
            <td>
                <img width="140px" src="<?="../uploads/".$banner['banner_img']?>" alt="">
                
            </td>
            <td>
                <span class = "btn btn-sm btn-<?=$banner["status"]== 1 ? "success" : "danger"  ?>"><?=$banner["status"]== 1 ? "Activate" : "Deactivate"  ?></span>
            </td>
            <td>
                <a href="../controller/bannerStatus.php?
                id=<?=$banner['id']?>"class="btn btn-sm btn-warning">
                <?=$banner["status"]== 1 ? "Deactivate" : 
                "Activate"  ?></a>


                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>


    </table>
</main>

<?php
include './inc/footer_index.php';
unset($_SESSION['errors']);
?>