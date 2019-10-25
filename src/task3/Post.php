<?php

namespace Task3;

/**
 * Class Post
 */
class Post
{
    /**
     * Post constructor.
     * @param int $authorId
     * @param string $content
     */
    public function __construct(int $authorId, string $content)
    {
        $this->authorId = $authorId;
        $this->content = $content;
    }

    /**
     * @var $authorId
     */
    private $authorId;

    /**
     * @var $content
     */
    private $content;

    // other properties

    /**
     * @param int $id
     * @return Author
     */
    public function getPostAuthor(): Author
    {
        // sql request for getting user by userId
    }

    /**
     * @param int $authorId
     */
    public function changePostAuthor(int $authorId)
    {
        // sql request for changing author in post
    }
}