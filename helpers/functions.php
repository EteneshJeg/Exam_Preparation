<?php
require_once("../helpers/init.php");

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
    echo "Topic added successfully."; 
    } else {
    echo "Error occurred while adding study material: " . mysqli_error($link);
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
      return './StudyMaterial/StudyMaterial' . $topicId . '.php';
    case 'Practice Questions':
      return 'PracticeQuestions/PracticeQuestions' . $topicId . '.php';
    case 'Quizzes':
      return 'quiz' . $topicId . '.php';
    default:
      return '#';
  }
}

//add study material function
function addStudyMaterial($image, $materialUrl, $topic)
{
  global $link;

  $image = cleanUp($image);
  $materialUrl = cleanUp($materialUrl);
  $topic = cleanUp($topic);

  $query_text = "INSERT INTO studymaterial (image, material, tid) VALUES (?, ?, ?)";
  $query = mysqli_prepare($link, $query_text);
  mysqli_stmt_bind_param($query, 'ssi', $image, $materialUrl, $topic);
  mysqli_stmt_execute($query);

  $affectedRows = mysqli_stmt_affected_rows($query);
  if ($affectedRows > 0) {
    echo "<h3>Study material added successfully.</h3>";
  } elseif ($affectedRows === 0) {
    echo "<h3>Failed to add study material.</h3>";
  } else {
    echo "<h3>Error occurred while adding study material: </h3>" . mysqli_error($link);
  }

  mysqli_stmt_close($query);
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
    echo "<h3>Practice question added successfully.</h3>";
  } elseif ($affectedRows === 0) {
    echo "<h3>Failed to add practice question.</h3>";
  } else {
    echo "<h3>Error occurred while adding practice question:</h3> " . mysqli_error($link);
  }
}

// add Quiz 
function addQuiz($question, $options, $correctAns, $topic)
{
  global $link;

  // Clean up inputs
  $question = cleanUp($question);
  $topic = cleanUp($topic);
  $correctAns = cleanUp($correctAns);

  // Implode options array into a string with '|' delimiter
  $optionsString = implode('|', array_map('cleanUp', $options));

  // Prepare the SQL query
  $query_text = "INSERT INTO quizquestions (tid, question, options, correctAnswer) VALUES (?, ?, ?, ?)";
  $query = mysqli_prepare($link, $query_text);

  // Bind parameters and execute query
  mysqli_stmt_bind_param($query, 'isss', $topic, $question, $optionsString, $correctAns);
  $result = mysqli_stmt_execute($query);

  // Check if the query was successful
  if ($result) {
    echo "Quiz added successfully.";
  } else {
    echo "Failed to add quiz: " . mysqli_error($link);
  }

  // Close the statement
  mysqli_stmt_close($query);
}
