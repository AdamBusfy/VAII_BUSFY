<?php include "../bootstrap.php" ?>
<?php include "layout/header.php" ?>
<?php include "layout/navbar.php" ?>
<?php include "layout/flashMessage.php" ?>
<?php include "../class/GalleryStorage.php" ?>

<?php
$galleryStorage = new GalleryStorage();

if (isset($_POST['create'])) {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $photo = $_FILES['photo'] ?? [];
    //var_dump($photo);
    if ($galleryStorage->addItem($title, $description, $photo)) {
        $_SESSION['flashMessage'] = 'Upload successful!';
    }
    header('Location: addnew.php');
    exit;
}
?>
    <div class="row">
        <div class="offset-md-2 offset-xl-3 col-md-8 col-xl-6">
            <div class="p-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formControlText">Title</label>
                        <input name="title" type="text" class="form-control" id="formControlText" required>
                    </div>

                    <div class="form-group">
                        <label for="formControlDescription">Description</label>
                        <textarea name="description" class="form-control" id="formControlDescription"
                                  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formControlFile">Upload photo</label>
                        <input name="photo" type="file" class="form-control-file" accept="image/png,image/jpeg"
                               id="formControlFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="create">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php include "layout/footer.php" ?>