<?php

class Comment
{
    /**
     * Initialize properties.
     */
    private $id;
    private $body;
    private $createdAt;
    private $newsId;

    /**
     * Constructor with optional parameters.
     *
     * @param int|null $id
     * @param string|null $body
     * @param string|null $createdAt
     * @param int|null $newsId
     */
    public function __construct(?int $id = null, ?string $body = null, ?string $createdAt = null, ?int $newsId = null)
    {
        $this->id = $id;
        $this->body = $body;
        $this->createdAt = $createdAt;
        $this->newsId = $newsId;
    }

    /**
     * Getters
     * Getters should be written first, before setters
     */

    /**
     * Getter for the ID property.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter for the Body property.
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Getter for the CreatedAt property.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Getter for the NewsId property.
     */
    public function getNewsId(): int
    {
        return $this->newsId;
    }

    /**
     * Setters
     * Setters should be written after getters
     */

    /**
     * Setter for the Id property.
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Setter for the Body property.
     */
    public function setBody(string $body): Comment
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Setter for the CreatedAt property.
     */
    public function setCreatedAt(string $createdAt): Comment
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Setter for the NewsId property.
     */
    public function setNewsId(int $newsId): Comment
    {
        $this->newsId = $newsId;
        return $this;
    }
}
