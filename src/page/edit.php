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

<?php
if (isset($_POST['edit'])) {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $photo = $_FILES['photo'] ?? [];
    //var_dump($photo);

    if ($galleryStorage->updateItem($id, $title, $description, $photo)) {
        $_SESSION['flashMessage'] = 'Edit successful!';
    }
    header("Location: index.php");
    exit;
}
?>


<?php foreach ($items as $item): ?>
    <?php
    $data = ($item['photo']);

    ?>

    <div class="row">
        <div class="offset-md-2 offset-xl-3 col-md-8 col-xl-6">
            <div class="p-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formControlText">Title</label>
                        <input name="title" type="text" class="form-control" id="formControlText"
                               value="<?= $item['title'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="formControlDescription">Description</label>
                        <textarea name="description" class="form-control" id="formControlDescription"
                                  rows="3"><?= $item['text'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formControlFile">Upload photo</label>
                        <input name="photo" type="file" class="form-control-file" accept="image/png,image/jpeg"
                               id="formControlFile">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="edit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

