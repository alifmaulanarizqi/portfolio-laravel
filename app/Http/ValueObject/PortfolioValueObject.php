<?php

namespace App\Http\ValueObject;

class PortfolioValueObject {
    public ?int $id;
    public ?string $category;
    public ?string $title;
    public ?string $imageThumbnail;

    function __construct(?int $id, ?string $category, ?string $title, ?string $imageThumbnail) {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->imageThumbnail = $imageThumbnail;
    }
}
