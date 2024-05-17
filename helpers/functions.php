<?php

require_once("init.php");

//clean up

function cleanUp($data)
{
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  $data = trim($data);

  return $data;
}

//Register function
function registerUser($fname, $lname, $email, $password, $role)
{
  global $link;

  $fname = cleanUp($fname);
  $lname = cleanUp($lname);
  $email = cleanUp($email);
  $password = md5($password);
  $joined_date = date("Y-m-d H:i:s");
  $uHash = md5($email);

  $query_text = "INSERT INTO users (email, fName, lName, password, joined_date, uHash, role) VALUES (?, ?, ?, ?, Now(), ?, ?)";
  $query = mysqli_prepare($link, $query_text);
  mysqli_stmt_bind_param($query, 'ssssss', $email, $fname, $lname, $password, $uHash, $role);
  $result = mysqli_stmt_execute($query);

  return $result; // Return true on success, false on failure
}
// Login 

// check if user name and password is correct 

function loginUser($email, $password, $role)
{
  global $link;
  $email = cleanUp($email); // Assuming cleanUp() function is defined and accessible
  $password = md5($password);

  $fetched_Data = array();

  $query_text = "SELECT * FROM Users WHERE email = ? AND password = ? AND role = ?";

  // Prepare the query
  $stmt = mysqli_prepare($link, $query_text);
  if (!$stmt) {
    die("Error: " . mysqli_error($link));
  }

  // Bind the parameters
  mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $email,
    $password,
    $role
  );

  // Execute the query
  $result = mysqli_stmt_execute($stmt);
  if (!$result) {
    die("Error: " . mysqli_stmt_error($stmt));
  }

  // Get the result set
  $query = mysqli_stmt_get_result($stmt);

  if ($query) {
    while (($row = mysqli_fetch_assoc($query))) {
      $fetched_Data = $row;
    }
  }
  // Close the statement
  mysqli_stmt_close($stmt);

  return $fetched_Data;
}


//add topic

function addTopic($topic)
{
  global $link;
  $topic = cleanUp($topic);

  //Insert data
  $query_text = "INSERT INTO Topics (topicName) VALUES ('$topic')";
  $query = mysqli_query($link, $query_text);

  //Handle if there is error 
  if ($query) {
    //If there is anything you want to do after the user is registered
  } else {
    //Handle  error here 
  }
}

// get topics 

function getTopics()
{
  global $link;
  $fetched_Data = array();

  $query_text = "SELECT * FROM Topics";
  $query = mysqli_query($link, $query_text);
  if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
      $fetched_Data[] = $row;
    }
  }
  return $fetched_Data;
}

function getTopicsForSections()
{
  global $link;
  $html = ''; // Initialize an empty string to store HTML content

  // Define categories for each <h2> section
  $categories = array('Study Material', 'Practice Questions', 'Quizzes');

  // Prepare the query to fetch all topics
  $query_text = "SELECT * FROM Topics";
  $query = mysqli_query($link, $query_text);

  if ($query) {
    $topics = mysqli_fetch_all($query, MYSQLI_ASSOC); // Fetch all topics as an associative array

    // If there are topics fetched
    if (!empty($topics)) {
      // Iterate through each category
      foreach ($categories as $index => $category) {
        $html .= '<div>';
        $html .= '<h2 onclick="toggleTopics(' . $index . ')">' . $category . '</h2>'; // Add onclick event to toggle topics
        $html .= '<ul id="topics' . $index . '" style="display:none;">'; // Set id for topics list

        // Iterate through each topic
        foreach ($topics as $topic) {
          // Generate a unique link for each topic within the current category
          $link = generateLink($category, $topic['tid']);
          $html .= '<li><a href="' . $link . '">' . $topic['topicName'] . '</a></li>';
        }

        $html .= '</ul>';
        $html .= '</div>';
      }
    }
  }

  return $html;
}

function generateLink($category, $topicId)
{
  // Define unique page URLs based on category and topic ID
  switch ($category) {
    case 'Study Material':
      return './StudyMaterial' . $topicId . '.php';
    case 'Practice Questions':
      return 'PracticeQuestions' . $topicId . '.php';
    case 'Quizzes':
      return 'Quiz2/index' . $topicId . '.html';
    default:
      return '#';
  }
}

//add study material

function addStudyMaterial($description, $materialUrl, $topic)
{
  global $link;

  $description = cleanUp($description);
  $topic = cleanUp($topic);

  $query_text = "INSERT INTO studymaterial (tid, description, material) VALUES (?, ?, ?)";
  $query = mysqli_prepare($link, $query_text);
  mysqli_stmt_bind_param($query, 'iss', $topic, $description, $materialUrl);
  mysqli_stmt_execute($query);

  if (mysqli_stmt_affected_rows($query) > 0) {
    echo "Study material added successfully.";
  } else {
    echo "Failed to add study material.";
  }
}


//add practice questions

function addPracticeQuestion($question, $answer, $topic)
{
  global $link;

  $question = cleanUp($question);
  $answer = cleanUp($answer);
  $topic = cleanUp($topic);

  $query_text = "INSERT INTO practicequestions (tid, question, answer) VALUES (?, ?, ?)";
  $query = mysqli_prepare($link, $query_text);
  mysqli_stmt_bind_param($query, 'iss', $topic, $question, $answer);
  mysqli_stmt_execute($query);

  $affectedRows = mysqli_stmt_affected_rows($query);
  if ($affectedRows > 0) {
    echo "Practice question added successfully.";
  } elseif ($affectedRows === 0) {
    echo "Failed to add practice question.";
  } else {
    echo "Error occurred while adding practice question: " . mysqli_error($link);
  }
}



// add Quiz 

function addQuiz($quiz, $topic)
{
  global $link;

  $quiz = cleanUp($quiz);
  $topic = cleanUp($topic);

  $query_text = "INSERT INTO quizzes (tid, quiz) VALUES (?, ?)";
  $query = mysqli_prepare($link, $query_text);
  mysqli_stmt_bind_param($query, 'is', $topic, $quiz);
  mysqli_stmt_execute($query);

  $affectedRows = mysqli_stmt_affected_rows($query);
  if (
    $affectedRows > 0
  ) {
    echo "Quiz added successfully.";
  } elseif ($affectedRows === 0) {
    echo "Failed to add quiz.";
  } else {
    echo "Error occurred while adding quiz: " . mysqli_error($link);
  }
}
