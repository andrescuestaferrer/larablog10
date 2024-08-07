<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;

if ( !defined('__PUBLIC__') )  define('__PUBLIC__',$_SERVER['DOCUMENT_ROOT']);
require_once(__PUBLIC__.'/traits/CommonFunctions.php');
use Public\traits\CommonFunctions;

class Authors extends Component
{
    // traits
    use CommonFunctions;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $email, $username, $author_type, $direct_publish ;
    public $search;
    public $perPage = 4;

    protected $listeners = [
        'resetForms',
    ] ;

    public function mount() {
        $this->resetPage();
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function resetForms() {
        $this->name = $this->email = $this->username  = $this->author_type = $this->direct_publish = null ;
        $this->resetErrorBag();
    }

    public function render()
    {
        // echo "render".$this->search;
        return view('livewire.authors',[
            'authors' => User::search(trim($this->search))
                 ->where('id','!=', auth()->id())->paginate($this->perPage),
        ]);
    }
    
    public function isOnline($site ="https://youtube.com/") {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }

    public function addAuthor() {
        $this->validate([
            'name'             => 'required',
            'email'            => 'required|email|unique:users,email',
            'username'         => 'required|unique:users,username|min:6|max:20',
            'author_type'      => 'required',
            'direct_publish' => 'required',
        ],[
            'author_type.required'       => __('Choose author type'),
            'direct_publish.required'  => __('Specify author publication access'),
        ]);

        if ($this->isOnline()) {
            $default_password = Random::generate(8);
            $author = new User();
            $author->name           = $this->name;
            $author->email          = $this->email;
            $author->username       = $this->username;
            $author->password       = Hash::make($default_password);
            $author->type           = $this->author_type;
            $author->direct_publish = $this->direct_publish;

            $saved = $author->save();

            $data = array(
                'name'     => $this->name,
                'email'    => $this->email,
                'username' => $this->username,
                'password' => $default_password,
                'url'      => route('author.profile'),
                'txtMail'  => array ( 
                    '01' =>  __('Hi'), 
                    '02' =>  __('Your account has been created on Larablog10'), 
                    '03' =>  __('You can use the following credentials'), 
                    '04' =>  __('Username'), 
                    '05' =>  __('Email'), 
                    '06' =>  __('Password'), 
                    '07' =>  __('Go to your profile page'), 
                    '08' =>  __('Note'), 
                    '09' =>  __('It is important to change this default password after login in to system on the first time'), 
                    '10' =>  __('Thanks'), 
                ),
            );

            $author_email = $this->email ;
            $author_name  = $this->name ;

            if ($saved) {
                Mail::send('new-author-email-template', $data, function($message) use ($author_email, $author_name) {
                    $message->from('noreply@example.com', 'Larablog10');
                    $message->to($author_email, $author_name)
                            ->subject(__('Account creation'));
                });

                $this->showToastr(__('New author has been added to blog') , __('success'));
                $this->name = $this->email = $this->username  = $this->author_type = $this->direct_publish = null ;
                $this->dispatch('hide_add_author_modal');

            } else {
                $this->showToastr(__('Something went wrong saving the new author. Try again later') , __('error'));
            }

        } else {
            $this->showToastr(__('You are offline, check your connection and submit form again later') , __('error'));
        }

    }

}
