<?php
require_once("../helpers/init.php");
$query = "SELECT * FROM quizquestions WHERE tid = 4"; // Adjust tid as necessary
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Quiz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="../FrontendExam/css/bootstrap.min.css" rel="stylesheet">
    <link href="../FrontendExam/css/bootstrap-icons.css" rel="stylesheet">
    <link href="../FrontendExam/css/templatemo-ebook-landing.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Unbounded', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Section Title */
        .section-title h2 {
            font-size: 2em;
            color: #E76F40;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Question Item */
        .faq-item {
            margin-bottom: 20px;
        }

        .faq-item h3 {
            font-size: 1.5em;
            color: #555;
            margin-bottom: 10px;
        }

        .faq-content {
            display: flex;
            flex-direction: column;
        }

        /* Option Button Styles */
        .option-button {
            display: block;
            padding: 15px;
            margin: 10px 0;
            background-color: #f4f4f9;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
        }

        .option-button:hover {
            background-color: #e6e6e6;
            transform: scale(1.02);
        }

        .option-button.selected {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .option-button.wrong {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        /* Navigation Button Styles */
        .nav-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            background-color: #E76F40;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.2s;
        }

        .nav-button:hover {
            background-color: #d06536;
            transform: scale(1.05);
        }

        /* Navigation Buttons Container */
        #nav-buttons {
            margin-top: 20px;
            text-align: center;
        }

        #next-button,
        #prev-button,
        #submit-button {
            min-width: 100px;
        }
    </style>
</head>

<body>
    <div>
        <div> <a class="navbar-brand" style="color: #E76F40; margin:40px;" href="../FrontendExam/home/home.html">/<span>Home</span></a> </div>
        <section id="faq" class="faq section">
            <div class="container">
                <div class="row">
                    <div class="container section-title mb-2" data-aos="fade-up">
                        <h2>PHP Quiz</h2>
                    </div>
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            <form action="./submit_quiz.php" method="post" id="quiz-form">
                                <?php $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <div class="faq-item" data-correct-answer="<?php echo $row['correctAnswer']; ?>" data-index="<?php echo $i; ?>" style="<?php echo $i > 0 ? 'display:none;' : ''; ?>">
                                        <h3><?php echo $row['question']; ?></h3>
                                        <div class="faq-content">
                                            <?php
                                            $options = explode('|', $row['options']);
                                            foreach ($options as $option) :
                                            ?>
                                                <button type="button" class="option-button" data-value="<?php echo $option; ?>" onclick="selectOption(this, 'question_<?php echo $row['qid']; ?>')">
                                                    <?php echo $option; ?>
                                                </button>
                                            <?php endforeach; ?>
                                            <input type="hidden" name="question_<?php echo $row['qid']; ?>" value="">
                                        </div>
                                    </div>
                                <?php $i++;
                                endwhile; ?>
                                <div class="navigation-buttons">
                                    <button type="button" id="prev-btn" onclick="navigateQuestion(-1)" class="btn custom-btn smoothscroll me-3mb-3" disabled>Previous</button>
                                    <button type="button" id="next-btn" onclick="navigateQuestion(1)" class="btn custom-btn smoothscroll me-3">Next</button>
                                </div>
                                <button type="submit" id="submit-btn" style="display:none;" class="btn custom-btn smoothscroll me-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




    <script>
        let currentQuestionIndex = 0;
        const questions = document.querySelectorAll('.faq-item');

        function selectOption(button, inputName) {
            const parent = button.closest('.faq-item');
            const correctAnswer = parent.getAttribute('data-correct-answer');

            // Disable all buttons in the same question group to prevent changing answers
            const buttons = parent.querySelectorAll('.option-button');
            buttons.forEach(btn => {
                btn.onclick = null;
                btn.classList.remove('selected', 'wrong');
            });

            // Select the clicked button
            if (button.innerText === correctAnswer) {
                button.classList.add('selected');
            } else {
                button.classList.add('wrong');
            }

            // Update the hidden input value
            const hiddenInput = parent.querySelector(`input[name="${inputName}"]`);
            hiddenInput.value = button.getAttribute('data-value');
        }

        function navigateQuestion(direction) {
            // Hide current question
            questions[currentQuestionIndex].style.display = 'none';

            // Update current question index
            currentQuestionIndex += direction;

            // Show next/previous question
            questions[currentQuestionIndex].style.display = 'inline';

            // Handle navigation buttons
            document.getElementById('prev-btn').disabled = currentQuestionIndex <= 0;
            if (currentQuestionIndex === questions.length - 1) {
                document.getElementById('next-btn').style.display = 'none';
                document.getElementById('submit-btn').style.display = 'inline';
            } else {
                document.getElementById('next-btn').style.display = 'inline';
                document.getElementById('submit-btn').style.display = 'none';
            }
        }
    </script>
</body>

</html>