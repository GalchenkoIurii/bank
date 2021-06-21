<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title_lt',
        'title_en',
        'title_ru',
        'description_lt',
        'description_en',
        'description_ru',
        'content_lt',
        'content_en',
        'content_ru',
        'image',
    ];

    public static function getFormattedContent($content)
    {
        $content = preg_replace("/\[block\](.*?)\[\/block\]/si",
            "<div class=\"block-info\">$1</div>", $content);

        $content = preg_replace("/\[h\](.*?)\[\/h\]/si",
            "<p class=\"block-info__title\">$1</p>", $content);

        $content = preg_replace("/\[p\](.*?)\[\/p\]/si",
            "<p class=\"block-info__text\">$1</p>", $content);

        return $content;
    }
}
