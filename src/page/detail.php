<?php include "../bootstrap.php" ?>
<?php include "layout/header.php" ?>
<?php include "layout/navbar.php" ?>
<?php include "layout/flashMessage.php" ?>
<?php include "../class/GalleryStorage.php" ?>

<?php
$galleryStorage = new GalleryStorage();
$id = $_GET['id'];
$items = $galleryStorage->loadItem($id);
?>

<?php foreach ($items as $item): ?>
    <?php
    $data = ($item['photo']);

    ?>
    <div class="container-fluid">
        <div class="row mt-3 ml-3">
            <div class="offset-md-2 offset-xl-3 col-md-8 col-xl-6">
                <div class="item mb-3">
                    <div class="item-text">
                        <div class="item-title text-oneliner text-center" title="nadpis"><?= $item['title'] ?></div>
                    </div>
                    <img src="data:image;base64,<?= $data ?>" class="item-image" alt="photo"/>
                    <div class="item-text">
                        <div class="item-description detail-text" title="popis"><?= $item['text'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php include "layout/footer.php" ?>