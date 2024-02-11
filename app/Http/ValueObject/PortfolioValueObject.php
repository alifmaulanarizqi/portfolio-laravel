<?php

namespace App\Http\ValueObject;

class PortfolioValueObject {
    public ?int $id;
    public ?string $category;
    public ?string $title;
    public ?string $imageThumbnail;
    public ?string $desc;

    function __construct(?int $id, ?string $category, ?string $title, ?string $imageThumbnail, ?string $desc) {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->imageThumbnail = $imageThumbnail;
        $this->desc = $desc;
    }
}
