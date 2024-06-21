<?php
require_once("../helpers/init.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correctAnswers = 0;
    $totalQuestions = count($_POST);

    foreach ($_POST as $qid => $user_answer) {
        $question_id = str_replace('question_', '', $qid);
        $query = "SELECT correctAnswer FROM quizquestions WHERE qid = $question_id"; // Adjusted to use qid
        $result = mysqli_query($link, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row && $row['correctAnswer'] === $user_answer) {
                $correctAnswers++;
            }
        } else {
            echo "Error: " . mysqli_error($link);
        }
    }

    $percentage = ($correctAnswers / $totalQuestions) * 100;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Unbounded', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .result-container {
            text-align: center;
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5em;
            color: #666;
            margin: 10px 0;
        }

        .score,
        .total,
        .percentage {
            font-weight: bold;
            color: #E76F40;
        }

        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #E76F40;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-button:hover {
            background-color: #d06536;
        }
    </style>
</head>

<body>
    <div class="result-container">
        <h1>Quiz Results</h1>
        <p>You got <span class="score"><?php echo $correctAnswers; ?></span> out of <span class="total"><?php echo $totalQuestions; ?></span> correct.</p>
        <p>Your score: <span class="percentage"><?php echo round($percentage, 2); ?>%</span></p>
        <a href="../FrontendExam/home/home.html" class="home-button">Go to Home</a>
    </div>
</body>

</html>