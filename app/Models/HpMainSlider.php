<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HpMainSlider extends Model
{
    use HasFactory;

    protected $fillable = [
                            'name',
                            'details',
                            'image1', 
                            'image2', 
                            'image3', 
                            'image4', 
                            'image5', 
                            'image6', 
                            'image7', 
                            'image8', 
                            'image9', 
                            'image10', 

                            'heading1a',
                            'heading2a',
                            'heading3a',
                            'heading4a',
                            'heading5a',
                            'heading6a',
                            'heading7a',
                            'heading8a',
                            'heading9a',
                            'heading10a',
                            

                            'heading1b',
                            'heading2b',
                            'heading3b',
                            'heading4b',
                            'heading5b',
                            'heading6b',
                            'heading7b',
                            'heading8b',
                            'heading9b',
                            'heading10b',

                            'link1',
                            'link2',
                            'link3',
                            'link4',
                            'link5',
                            'link6',
                            'link7',
                            'link8',
                            'link9',
                            'link10',

                            'detail1',
                            'detail2',
                            'detail3',
                            'detail4',
                            'detail5',
                            'detail6',
                            'detail7',
                            'detail8',
                            'detail9',
                            'detail10',

                            'status',
                            'show_on_hp'];
}
