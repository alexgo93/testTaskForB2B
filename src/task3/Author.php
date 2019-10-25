<?php

namespace Task3;

/**
 * Class User
 */
class Author
{
    /**
     * @var $id
     */
    private $id;

    // other properties

    /**
     * @param string $post
     */
    public function createPost(string $content): void
    {
        return new Post($content, $id);
    }

    /**
     * @return array
     */
    public function getAllAuthorPost(): array
    {
        // query request for getting posts
    }
}