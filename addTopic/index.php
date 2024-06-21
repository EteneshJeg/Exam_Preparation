<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Topics</title>
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
        <div style="display: inline;"> <a class="navbar-brand" style="color: #E76F40; margin:40px;" href="../FrontendExam/home/home.html">
                /<span>Home</span>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <h1 class="text-center mb-4">Add topic</h1>

                <form action="/addTopic/added.php" method="post">
                    <div class="mb-3">
                        <label for="topicName" class="form-label">Topic name:</label><br>
                        <input type="text" name="topicName" class="form-control" required>
                    </div>
                    <br><br>
                    <input type="submit" value="Add topic" class="custom-btn">
                </form>
            </div>
        </div>
    </div>
</body>

</html>