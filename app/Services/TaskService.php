<?php

namespace App\Services;

class TaskService
{
    private $tasks = [];

    public function __construct()
    {
        // optional: ensures tasks is always an array
        if (!is_array($this->tasks)) {
            $this->tasks = [];
        }
    }

    public function add($name)
    {
        $this->tasks[] = $name;
        return $this->tasks; // optional return para makita updated list
    }
    
    public function getAllTasks()
    {
        return $this->tasks ?? []; // extra safety
    }
}