<?php include "../bootstrap.php" ?>
<?php include "layout/header.php" ?>
<?php include "layout/navbar.php" ?>
<?php include "layout/flashMessage.php" ?>
<?php include "../class/GalleryStorage.php" ?>

<?php
$galleryStorage = new GalleryStorage();

if (($_GET['id']) > 0) {
    $galleryStorage->deleteItem($_GET['id']);
}

$items = $galleryStorage->loadAllItems();
//var_dump(($items));
//echo $_GET['id'];
?>

    <div class="row mt-3 ml-3">
        <?php foreach ($items as $item): ?>
            <?php
            //var_dump($item);
            $data = ($item['photo']);
            // echo $data;
            // echo $item['photo'];
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="item mb-3">
                    <button type="button" class="close" aria-label="Close">
                        <a href="index.php?id=<?= $item['id'] ?>" aria-hidden="true">&times;</a>
                    </button>
                    <img src="data:image;base64,<?= $data ?>" class="item-image" alt="photo"/>
                    <div class="item-text">
                        <div class="item-title text-oneliner" title="photo"><?php echo $item['title'] ?></div>
                        <div class="item-description text-oneliner"
                             title="description"><?php echo $item['text'] ?></div>
                        <div class="item-link">
                            <a href="detail.php?id=<?= $item['id'] ?>">Detail</a>
                            <a href="edit.php?id=<?= $item['id'] ?>">Edit</a>

                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>


<?php include "layout/footer.php" ?>