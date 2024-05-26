<?php

class NewsManager
{
	/**
	 * Initialize properties.
	 */
	private static $instance = null;

	/**
     * Private constructor to enforce the use of the singleton pattern.
     */
	private function __construct()
	{
		require_once(ROOT . '/utils/DB.php');
		require_once(ROOT . '/utils/CommentManager.php');
		require_once(ROOT . '/class/News.php');
	}

	/**
     * Retrieves the singleton instance of the NewsManager class.
     * If no instance exists, it creates one. Otherwise, it returns the existing instance.
     *
     * @return NewsManager The singleton instance of the NewsManager class.
     */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
     * Lists all news entries from the database.
     * This method fetches news records from the database and instantiates News objects for each entry.
     *
     * @return array An array of News objects representing all news entries.
     */
	public function listNews()
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `news`');

		$news = [];
		foreach($rows as $row) {
			$n = new News();
			$news[] = $n->setId($row['id'])
			  ->setTitle($row['title'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at']);
		}

		return $news;
	}

	/**
     * Adds a new news entry to the database.
     * This method inserts a new news record into the database with the specified title and body.
     *
     * @param string $title The title of the news entry.
     * @param string $body The content of the news entry.
     * @return int The ID of the newly inserted news entry.
     */
	public function addNews(string $title, string $body)
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES(?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$title, $body, date('Y-m-d')]);
		return $db->lastInsertId();
	}

	/**
     * Deletes a news entry and its associated comments from the database.
     * This method removes a news entry by ID and deletes all comments associated with that news entry.
     *
     * @param int $id The ID of the news entry to delete.
     * @return int The number of rows deleted from the database.
     */
	public function deleteNews(int $id)
	{
		$comments = CommentManager::getInstance()->listComments();
		$idsToDelete = [];

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$idsToDelete[] = $comment->getId();
			}
		}

		foreach($idsToDelete as $id) {
			CommentManager::getInstance()->deleteComment($id);
		}

		$db = DB::getInstance();
		$sql = "DELETE FROM `news` WHERE `id`=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount();
	}
}