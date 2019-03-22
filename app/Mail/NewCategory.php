<?php

namespace App\Mail;

use App\CatalogCategory;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewCategory extends Mailable
{
    use Queueable, SerializesModels;

    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function build()
    {
        return $this->view('mails.new-category');
    }
}