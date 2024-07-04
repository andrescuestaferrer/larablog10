<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogSocialMedia;
use \Exception;
use Illuminate\Database\QueryException;

if ( !defined('__PUBLIC__') )  define('__PUBLIC__',$_SERVER['DOCUMENT_ROOT']);
require_once(__PUBLIC__.'/traits/CommonFunctions.php');
use Public\traits\CommonFunctions;

class AuthorBlogSocialMediaForm extends Component
{
    // traits
    use CommonFunctions;

    public $blog_social_media ;
    public $facebook_url, $instagram_url, $youtube_url, $linkedin_url;

    public function mount() {
        try {
            $this->blog_social_media = BlogSocialMedia::find(auth('web')->id());
            $this->facebook_url = $this->blog_social_media->bsm_facebook;
            $this->instagram_url = $this->blog_social_media->bsm_instagram;
            $this->youtube_url = $this->blog_social_media->bsm_youtube;
            $this->linkedin_url = $this->blog_social_media->bsm_linkedin;
        } catch (Exception $e) {
            $this->showToastr($e->getMessage() , 'error');
        }
    }

    public function updateBlogSocialMedia() {
        $this->validate([
            'facebook_url'   => 'nullable|url',
            'instagram_url'  => 'nullable|url',
            'youtube_url'    => 'nullable|url',
            'linkedin_url'   => 'nullable|url',
        ]);

        try {
            $update = $this->blog_social_media->update([
                'bsm_facebook'    =>  $this->facebook_url ?? null,
                'bsm_instagram'   =>  $this->instagram_url ?? null,
                'bsm_youtube'     =>  $this->youtube_url ?? null,
                'bsm_linkedin'    =>  $this->linkedin_url ?? null,
            ]);

            if ($update) {
                $this->showToastr('Blog social media has been successfully changed', 'success');
            } else {
                $this->showToastr('Something went wrong changing your blog social media. Try again later.', 'error');
            }
        } catch (QueryException $e) {
            $this->showToastr($e->getMessage() , 'error');
        }

    }

    public function render()
    {
        return view('livewire.author-blog-social-media-form');
    }
}
