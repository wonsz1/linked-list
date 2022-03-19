<?php

declare(strict_types=1);

namespace Ja1\LinkedList;

class ListNode
{
    private int|string $data;
    private ?ListNode $next = null;

    public function __construct(int|string $data)
    {
        $this->data = $data;
    }

    public function data(): int|string
    {
        return $this->data;
    }

    public function next(): ?ListNode
    {
        return $this->next;
    }

    public function setNext(?ListNode $next)
    {
        $this->next = $next;
    }

}