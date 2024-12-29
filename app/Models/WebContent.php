<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebContent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'web_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_header_cover_title',
        'main_header_title',
        'main_header_cardi_title',
        'main_header_cardi_desc',
        'main_header_cardii_title',
        'main_header_cardii_desc',
        'main_header_cardiii_title',
        'main_header_cardiii_desc',
        'main_header_cardiv_title',
        'main_header_cardiv_desc',
        'main_header_cardv_title',
        'main_header_cardv_desc',
        'main_header_cardvi_title',
        'main_header_cardvi_desc',
        'main_header_center_title',
        'main_header_center_text',
        'main_header_center_left_top_title',
        'main_header_center_left_top_title_desc',
        'main_header_center_left_bottom_title',
        'main_header_center_left_bottom_title_desc',
        'main_header_center_left_right_title',
        'main_header_center_left_right_title_desc',
        'main_header_footer_title',
        'main_header_footer_text',
    ];
}
