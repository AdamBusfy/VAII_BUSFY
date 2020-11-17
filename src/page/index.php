<?php include "../bootstrap.php" ?>
<?php include "layout/header.php" ?>
<?php include "layout/navbar.php" ?>
<?php include "layout/flashMessage.php" ?>
<?php include "../class/GalleryStorage.php" ?>

<?php
$galleryStorage = new GalleryStorage();

if (isset($_POST['delete']) && !empty($_POST['id'])) {
    if ($galleryStorage->deleteItem($_POST['id'])) {
        $_SESSION['flashMessage'] = 'Delete successful!';
    }
    header("Location: index.php");
    exit;
}

if (isset($_POST['search'])) {
    $searchText = $_POST['searchText'] ?? '';
    $searchedItems = $galleryStorage->loadItemsThatContainsText($searchText);
    //var_dump($testItems);
    //var_dump($searchText);
}
if (empty($searchedItems)) {
    $items = $galleryStorage->loadAllItems();
} else {
    $items = $searchedItems;
}
//var_dump($items);
//echo $_GET['id'];
?>
    <div class="row">
        <?php foreach ($items as $item): ?>
            <?php
           // var_dump($item);
            $data = ($item['photo']);
            //var_dump($data);
            // echo $data;
            // echo $item['photo'];
            ?>

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2" >
                <div class="item mb-3 zoom" id="demo">
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this photo')">
                        <input onclick="this.form.submit()" type="hidden" name="id" value="<?= $item['id'] ?>" />
                        <button type="submit" class="delete-button" name="delete">
                            <span>&#215;</span>
                        </button>
                    </form>
                    <img src="data:image;base64,<?= $data ?>" class="item-image" alt="photo"/>
                    <div class="item-text">
                        <div class="item-title text-oneliner" title="photo"><?php echo $item['title'] ?></div>
                        <div class="item-description text-oneliner"
                             title="description"><?= !empty($item['text']) ? $item['text'] :'&nbsp;' ?></div>
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