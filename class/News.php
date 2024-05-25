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
    public function __construct(?int $id = null, ?string $title = null, ?string $body = null, ?string $createdAt = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->createdAt = $createdAt;
    }

    /**
     * Getters
     * Getters should be written first, before setters
     */

    /**
     * Getter for the Id property.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter for the Title property.
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * Setters
     * Setters should be written after getters
     */

    /**
     * Setter for the Id property.
     */
    public function setId(int $id): News
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Setter for the Title property.
     */
    public function setTitle(string $title): News
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Setter for the Body property.
     */
    public function setBody(string $body): News
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Setter for the CreatedAt property.
     */
    public function setCreatedAt(string $createdAt): News
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
