<?php
require_once('../helpers/init.php');

$topics = getTopics();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Print the POST array for debugging
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $topic = isset($_POST['topic']) ? $_POST['topic'] : '';
    $question = isset($_POST['question']) ? $_POST['question'] : '';
    $options = isset($_POST['options']) ? $_POST['options'] : [];
    $correctAnswer = isset($_POST['correctAnswer']) ? $_POST['correctAnswer'] : '';


    // Check if all required fields are filled
    if (!empty($question) && !empty($options) && !empty($correctAnswer) && !empty($topic)) {
        // Prepare options as a pipe-separated string
        $options_str = implode('|', $options);

        // Insert into database
        $query = "INSERT INTO quizquestions (tid,question, options, correctAnswer) VALUES ('$topic','$question', '$options_str', '$correctAnswer')";
        if (mysqli_query($link, $query)) {
            echo "Question added successfully!";
        } else {
            echo "Error: " . mysqli_error($link);
        }
    } else {
        echo "All fields are required.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quizzes</title>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
            <div class="col-12 col-md-8 col-lg-6">
                <h1 class="text-center mb-4">Add Quizzes</h1>
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="question">Question:</label><br>
                        <textarea name="question" id="question" cols="40" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="options">Options:</label><br>
                        <input type="text" name="options[]" placeholder="Option 1">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="options[]" placeholder="Option 2">

                    </div>
                    <div class="mb-3">
                        <input type="text" name="options[]" placeholder="Option 3">

                    </div>
                    <div class="mb-3">
                        <input type="text" name="options[]" placeholder="Option 4">

                    </div>
                    <div class="mb-3">
                        <label for="correctAnswer">Correct Answer:</label><br>
                        <input type="text" name="correctAnswer" id="correctAnswer">

                    </div>
                    <label for="topic">Topic:</label><br>
                    <select name="topic" id="topic">
                        <?php foreach ($topics as $key => $value) : ?>
                            <option value="<?php echo $value['tid']; ?>"><?php echo $value['topicName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Add Quiz" class="custom-btn">
                </form>
</body>

</html>