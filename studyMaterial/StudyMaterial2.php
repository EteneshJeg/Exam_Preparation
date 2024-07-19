<?php
require_once("../helpers/init.php");
$query = "SELECT * FROM studymaterial WHERE tid=2";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Materials2</title>
    <link rel="stylesheet" href="styles.css">
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap.min.css" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./styles.css">
    <link href="../FrontendExam/css/templatemo-ebook-landing.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }

        .section-title h2 {
            font-size: 2em;
            color: #E76F40;
            text-align: center;
            margin-bottom: 20px;
        }

        .books-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .book-item {
            width: 30%;
            background-color: #fff;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .book-item img {
            max-width: 100%;
            height: 150px;
            border-radius: 10px;
        }

        .download-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 54px;
            background-color: #E76F40;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.2s;
        }

        .download-button:hover {
            background-color: #d06536;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div> <a class="navbar-brand" style="color: #E76F40; margin:40px;" href="../FrontendExam/home/home.html">
            /<span>Home</span>
        </a>
    </div>
    <div class="container">
        <div class="section-title">
            <h2>CSS Study Materials</h2>
        </div>
        <div class="books-container">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="book-item">
                    <a href="<?php echo htmlspecialchars($row['material']); ?>">
                        <?php if (!empty($row['image'])) : ?>
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Study Material Image">
                        <?php endif; ?></a>
                    <a href="<?php echo htmlspecialchars($row['material']); ?>" download class="download-button">Download</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>