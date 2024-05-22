<?php

define('ROOT', __DIR__);

// Load all dependencies
require_once(ROOT . '/vendor/autoload.php');

// Get the dotenv dependency
use Symfony\Component\Dotenv\Dotenv;

// Create an instance of the dotenv class
$dotenv = new Dotenv();
// Load the .env file
$dotenv->load(ROOT . '/.env');

// Load the News & Comment managers
require_once(ROOT . '/utils/NewsManager.php');
require_once(ROOT . '/utils/CommentManager.php');

// Loop through all news by creating/getting the instance of the NewsManager and executing the listNews() method
foreach (NewsManager::getInstance()->listNews() as $news) {
	// Print the title of the news
	echo ("############ NEWS " . $news->getTitle() . " ############\n");
	// Print the body of the news
	echo ($news->getBody() . "\n");

	// Loop through all comments
	foreach (CommentManager::getInstance()->listComments() as $comment) {
		// Print the comments for the specific news (current item in the loop)
		if ($comment->getNewsId() == $news->getId()) {
			echo ("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}

$commentManager = CommentManager::getInstance();
$c = $commentManager->listComments();
echo "\n" . "Total Number of comments: " . count($c);