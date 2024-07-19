<?php
require_once('../helpers/init.php');

$topics = getTopics();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $topic = $_POST['topic'];

    // Call the addPracticeQuestion function
    addPracticeQuestion($question, $answer, $topic);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Practice Question</title>
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
                <h1 class="text-center mb-4">Add Practice Question</h1>

                <form action="/practiceQuestion/index.php" method="post">
                    <div class="mb-3">
                        <label for="question" class="form-label">Question:</label><br>
                        <textarea name="question" id="question" cols="20" rows="5" class="form-control" required></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer:</label><br>
                        <textarea name="answer" id="answer" cols="20" rows="5" class="form-control" required></textarea>
                    </div>
                    <label for="topic" class="form-label">Topic:</label>
                    <select name="topic" id="topic">
                        <?php
                        foreach ($topics as $key => $value) {
                            print '<option value="' . $value['tid'] . '">' . $value['topicName'] . '</option>';
                        }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Add Practice Question" class="custom-btn">
                </form>
            </div>
        </div>
    </div>
</body>

</html>