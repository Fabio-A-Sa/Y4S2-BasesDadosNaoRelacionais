<html>

<h1>Bookit! - BDRN Lab 1</h1>
<h2>Latest Bookmarks</h2>

<?php

require __DIR__ . '/vendor/autoload.php';

Predis\Autoloader::register();

function showBookmarks($bookmarks, $redis) {
    echo "<ul>";
        foreach ($bookmarks as $bookmark) {
            $url = $redis->hget("bookmark:" . $bookmark, "url");
            $tags = $redis->smembers("bookmark:" . $bookmark . ":tags");
        ?>
        
        <li>
            <h4><?= $url ?></h4>
            <h5>[
            <?php foreach($tags as $tag) {
                echo $tag;
            }; ?>
            ]</h5>
        </li>

    <?php } echo "</ul>";
}

try {

    $redis = new Predis\Client();
    $bookmarks = array();

    // Next ID
    if (!$redis->exists("next_bookmark_id")) {
        $redis->set("next_bookmark_id", "0");
    }

    // With parameters -> show
    if (isset($_GET["tags"])) {
        $tags = explode(",", $_GET["tags"]);
        foreach ($tags as $tag) {
            $bookmarks[] =  "tag:".$tag;
        }

        $bookmarks = $redis->sinter($bookmarks);
    
    // Without parameters -> show last 15, if available
    } else {
        $bookmarks = $redis->zrange("bookmarks", -15, -1);
    }

    showBookmarks($bookmarks, $redis);

} catch (Exception $e) {
    print $e->getMessage();
} ?>

<a href="index.php">Home</a>
<a href="add.html">Add another bookmark!</a>

</html>