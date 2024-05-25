<?php

class CommentManager
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
		require_once(ROOT . '/class/Comment.php');
	}

	/**
     * Retrieves the singleton instance of the CommentManager class.
     * If no instance exists, it creates one. Otherwise, it returns the existing instance.
     *
     * @return CommentManager The singleton instance of the CommentManager class.
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
     * Lists all comments entries from the database.
     * This method fetches news records from the database and instantiates Comment objects for each entry.
     *
     * @return array An array of Comment objects representing all news entries.
     */
	public function listComments()
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `comment`');

		$comments = [];
		foreach($rows as $row) {
			$n = new Comment();
			$comments[] = $n->setId($row['id'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at'])
			  ->setNewsId($row['news_id']);
		}

		return $comments;
	}

	/**
     * Adds a new comment for a news entry to the database.
     * This method inserts a new comment record into the database with the specified body and associates it with a news entry.
     *
     * @param string $body The content of the comment.
     * @param int $newsId The ID of the news entry the comment is associated with.
     * @return int The ID of the newly inserted comment.
     */
	public function addCommentForNews($body, $newsId)
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES(?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$body, date('Y-m-d'), $newsId]);
		return $db->lastInsertId();
	}

	/**
     * Deletes a comment from the database.
     * This method removes a comment by ID.
     *
     * @param int $id The ID of the comment to delete.
     * @return int The number of rows deleted from the database.
     */
	public function deleteComment($id)
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM `comment` WHERE `id`=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount();
	}
}