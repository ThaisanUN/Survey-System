<?php
/*--------------------
https://github.com/jazmy/laravelformbuilder
Licensed under the GNU General Public License v3.0
Author: Jasmine Robinson (jazmy.com)
Last Updated: 12/29/2018
----------------------*/
namespace App\Events\Form;

use App\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class FormUpdated
{
    use Queueable, SerializesModels;

    /**
     * The updated form
     *
     * @var App\Http\Models\Form
     */
    public $form;

    /**
     * Create a new event instance.
     *
     * @param App\Http\Models\Form $form
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }
}