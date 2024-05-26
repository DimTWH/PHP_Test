<?php

define('ROOT', __DIR__);

// Load all dependencies
require_once(ROOT . '/vendor/autoload.php');

// Configuration loading
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(ROOT . '/.env');

// Load the News & Comment managers
require_once(ROOT . '/utils/NewsManager.php');
require_once(ROOT . '/utils/CommentManager.php');

/**
 * Fetch all news entries from the database.
 * This function retrieves all news records from the database and returns them as an array of News objects.
 *
 * @return array An array of News objects representing all news entries.
 */
function getAllNews()
{
	$newsManager = NewsManager::getInstance();
	$news = $newsManager->listNews();
	return $news;
}

/**
 * Like the function above, fetch all comments from the database.
 * This function retrieves all comment records from the database and returns them as an array of Comment objects.
 *
 * @return array An array of Comment objects representing all comments.
 */
function getAllComments()
{
	$commentManager = CommentManager::getInstance();
	$comments = $commentManager->listComments();
	return $comments;
}

/**
 * Displays a news article.
 * Outputs the title, body, and associated comments of a given news article.
 *
 * @param News $news The news article to display.
 */
function displayNews(News $news)
{
	echo "\n############ NEWS " . $news->getTitle() . " ############\n";
	echo $news->getBody() . "\n\n";

	// Display comments for the current news item
	$comments = getAllComments();
	foreach ($comments as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			echo "Comment " . $comment->getId() . " : " . $comment->getBody() . "\n";
		}
	}
}

/**
 * Main logic
 * Iterates over all news articles and displays them using the displayNews function.
 */
function main()
{
	// Get news to display
	$allNews = getAllNews();
	foreach ($allNews as $news) {
		displayNews($news);
	}
}

main();
