<?php
include "Database.php";

class GalleryStorage
{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function loadAllItems()
    {
        $images = $this->database->getConnection()->query("SELECT * FROM item");
        $this->database->getConnection()->close();

        return $images;
    }

    public function loadItem(int $id)
    {
        $image = $this->database->getConnection()->query("SELECT * FROM item where id='$id'");
        $this->database->getConnection()->close();

        return $image;
    }

    public function deleteItem(int $id)
    {
        $image = $this->database->getConnection()->query("DELETE FROM item WHERE id='$id'");
        $this->database->getConnection()->close();
        header("Location: index.php");
        return $image;
    }

    public function updateItem(int $id, string $title, string $description, array $photo): bool
    {
        $photoPath = $photo['tmp_name'] ?? '';

        if (!empty($photoPath)) {
            $mimeType = mime_content_type($photoPath);
            //var_dump($mimeType);
            $allowTypes = ['image/jpg', 'image/png', 'image/jpeg'];

            if (in_array($mimeType, $allowTypes)) {
                $photoData = file_get_contents($photoPath);
                if (!empty($title) && !empty($photoData)) {
                    require_once('class/Database.php');

                    $database = new Database();
                    $photoData = base64_encode($photoData);

                    $photoCondition = '';

                    if (!empty($photoData)) {
                        $photoCondition = ", photo='$photoData'";
                    }

                    $result = $database->getConnection()->query(
                        "UPDATE item SET title='$title', text='$description'$photoCondition WHERE id='$id'"
                    );
                    $database->getConnection()->close();
                    return TRUE;
//            var_dump(mysqli_error($database->getConnection()));
                }
            }
        } else {
            $database = new Database();
            if (!empty($photoData)) {
                $photoCondition = ", photo='$photoData'";
            }

            $result = $database->getConnection()->query(
                "UPDATE item SET title='$title', text='$description' WHERE id='$id'"
            );
            $database->getConnection()->close();
            return TRUE;
//            var_dump(mysqli_error($database->getConnection()));
        }
    }

    public function addItem(string $title, string $description, array $photo): bool
    {
        $photoPath = $photo['tmp_name'] ?? '';

        $mimeType = mime_content_type($photoPath);
        //var_dump($mimeType);
        $allowTypes = ['image/jpg', 'image/png', 'image/jpeg'];

        if (in_array($mimeType, $allowTypes)) {
            $photoData = file_get_contents($photoPath);
            if (!empty($title) && !empty($photoData)) {
                require_once('class/Database.php');
                $database = new Database();

                $photoData = base64_encode($photoData);
                $result = $database->getConnection()->query(
                    "INSERT into item (title, text, photo) VALUES ('$title', '$description', '$photoData')"
                );
                $database->getConnection()->close();

//            var_dump(mysqli_error($database->getConnection()));
                return TRUE;
            }
        }
    }
}

