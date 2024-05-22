<?php

class News
{
    private $id;
    private $title;
    private $body;
    private $createdAt;

    /**
     * Constructor with optional parameters.
     *
     * @param int|null $id
     * @param string|null $title
     * @param string|null $body
     * @param string|null $createdAt
     */
    public function __construct(?int $id = null,?string $title = null,?string $body = null,?string $createdAt = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setId(int $id): News
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): News
    {
        $this->title = $title;
        return $this;
    }

    public function setBody(string $body): News
    {
        $this->body = $body;
        return $this;
    }

    public function setCreatedAt(string $createdAt): News
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}