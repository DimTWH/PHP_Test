<?php

class Comment
{
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
    public function __construct(?int $id = null,?string $body = null,?string $createdAt = null,?int $newsId = null)
    {
        $this->id = $id;
        $this->body = $body;
        $this->createdAt = $createdAt;
        $this->newsId = $newsId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getNewsId(): int
    {
        return $this->newsId;
    }

    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    public function setBody(string $body): Comment
    {
        $this->body = $body;
        return $this;
    }

    public function setCreatedAt(string $createdAt): Comment
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setNewsId(int $newsId): Comment
    {
        $this->newsId = $newsId;
        return $this;
    }
}