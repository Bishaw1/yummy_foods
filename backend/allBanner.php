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


                <a href="./editBanner.php?id=<?=$banner["id"]?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="../controller/bannerDelete.php?id=<?=$banner['id'] ?>" class="btn btn-sm btn-danger deleteBtn">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>


    </table>
</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script> 
$(function(){
    //*jquery
    let deleteBtn= $('.deleteBtn')
    deleteBtn.click(function(event){
        event.preventDefault()
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = $(this).attr.('href')
  }
})
    
    })


})
</script>

<?php
include './inc/footer_index.php';
unset($_SESSION['errors']);
?>