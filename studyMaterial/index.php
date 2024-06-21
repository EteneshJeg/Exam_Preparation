<?php
require_once('../helpers/init.php');
if (isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder  = 'images/' . $file_name;

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h2>File uploaded successfully</h2>";
    } else {
        echo "<h2>File not uploaded</h2>";
    }
}
$topics = getTopics();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_POST['image'];
    $materialUrl = $_POST['material_url'];
    $topic = $_POST['topic'];

    // Call the addStudyMaterial function
    addStudyMaterial($image, $materialUrl, $topic);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study material</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap.min.css" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap-icons.css" rel="stylesheet">

    <link href="../FrontendExam/css/templatemo-ebook-landing.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div style="display: inline;"> <a class="navbar-brand" style="color: #E76F40; margin:40px;" href="../FrontendExam/home/homeAdmin.html">
                /<span>Home</span>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <h1 class="text-center mb-4">Add Study Material</h1>

                <form action="/studyMaterial/index.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="material_url" class="form-label">Study Material URL:</label>
                        <input type="text" name="material_url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image:</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <label for="topic">Topic:</label>
                    <select name="topic" id="topic">
                        <?php
                        foreach ($topics as $key => $value) {
                            print '<option value="' . $value['tid'] . '">' . $value['topicName'] . '</option>';
                        }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Add" name="submit" class="custom-btn">
                </form>
            </div>
        </div>
    </div>

</body>

</html>