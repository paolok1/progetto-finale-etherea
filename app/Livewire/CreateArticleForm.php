<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{
            // use WithFileUploads;

        #[Validate('required|min:5')]
        public $title; 
        #[Validate('required|min:10')]
        public $description;
        #[Validate('required|numeric')]
        public $price; 
        #[Validate('required')]
        public $category; 
        public $article;
        public $images = [];
        public $temporary_images;

        public function store()
        {
            $this->validate();
            $this->article = Article::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category,
                'user_id' => Auth::id()
                
                ]);
                // if (count($this->images) > 0) {
                //     foreach ($this->images as $image) {

                //         $newFileName = "articles/{$this->article->id}";
                //         $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);


                //         RemoveFaces::withChain([
                //             new ResizeImage($newImage->path, 300, 300),
                //             new GoogleVisionSafeSearch($newImage->id),
                //             new GoogleVisionLabelImage($newImage->id)

                //         ])->dispatch($newImage->id);
                //     }
                //     File::deleteDirectory(storage_path('/app/livewire-tmp'));
                // }
                session()->flash('success', 'Articolo creato correttamente!');
                $this->cleanForm();
        }




    public function render()
    {
        return view('livewire.create-article-form');
    }
}
