<?php

function typePriority($priority)
{
    $stats = [
        "low" => "<span class='badge bg-info'>Low</span>",
        "normal" => "<span class='badge bg-warning'>Normal</span>",
        "high" => "<span class='badge bg-danger'>High</span>",
    ];

    return $stats[$priority];
}

function notFoundTask()
{
    return <<<Task
    <div class="not-found">
            <h1 class="my-5 display-1 text-center">404</h1>
            <div class="alert alert-warning text-center my-3 p-1 ">Task Not Found</div>
        </div>
    Task;
}
