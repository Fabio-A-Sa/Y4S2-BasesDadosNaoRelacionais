<!DOCTYPE html>
<html>
<head>
    <title>MiniForum</title>
</head>
<body>
    <h1>MiniForum</h1>
    <h2>Topics</h2>
    <?php

    require __DIR__ . '/vendor/autoload.php';
    
    // MongoDB connection
    $mongoClient = new MongoDB\Client();
    $collection = $mongoClient->miniforum->topics;

    // Retrieve and display topics
    $topics = $collection->find();
    foreach ($topics as $topic) {
        echo "<h3>" . $topic['title'] . "</h3>";
        echo "<p><strong>Author:</strong> " . $topic['author'] . "</p>";
        echo "<p>" . $topic['body'] . "</p>";
        
        // Display comments
        echo "<h4>Comments</h4>";
        if (isset($topic['comments'])) {
            foreach ($topic['comments'] as $comment) {
                echo "<p><strong>" . $comment['author'] . ":</strong> " . $comment['text'] . "</p>";
            }
        }

        // Comment form
        echo "<form action='new_comment.php' method='post'>";
        echo "<input type='hidden' name='topic' value='" . $topic['_id'] . "'>";
        echo "<p><label for='comment'>Add Comment:</label><br>";
        echo "<textarea name='comment' id='comment' required></textarea></p>";
        echo "<p><label for='author'>Your Name:</label><br>";
        echo "<input type='text' name='author' id='author' required></p>";
        echo "<p><input type='submit' value='Add Comment'></p>";
        echo "</form>";
    }
    ?>
    <h2>Create New Topic</h2>
    <p><a href="new_topic.html">New Topic</a></p>
</body>
</html>
