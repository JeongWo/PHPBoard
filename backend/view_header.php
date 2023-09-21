<h1 class="text-center"> 제목 : <?=$rows['title']?></h1>
<div class="border p-3 mt-3">
    <?php require "view_details.php"; ?>

    <?php if(isset($image_path) && !empty($image_path)) { ?>
        <img src="<?=$image_path?>" width="100%" height="auto">
    <?php } ?>
    
    <p class="lead"><?=$rows['content']?></p>
</div>