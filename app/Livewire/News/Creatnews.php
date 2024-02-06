<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Creatnews extends Component

    {
        use WithFileUploads;
        public String $imageName = '';
        public string $logoName = '';

        #[Validate('required|max:50')]
        public $title;
        #[Validate('required|min:50|max:65535')]
        public $description;

        #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
        public $logo;

        #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

        public $thumbnail;

        #[Validate('required|max:50')]
        public $featured;


        #[Validate('boolean')]
         public $is_visible = true;

        #[Validate('required|max:100')]
        public $author;

        #[Validate('required|date|unique:news,date')]
        public $date;


        #[Validate('nullable|url')]
        public $links;


        #[Validate('nullable|max:200')]
        public $tags;


        public function create()
        {
            $validated = $this->validate();


            if(!empty($this->thumbnail))
            {
                $this->imageName = time().'.'.$this->thumbnail->extension();
                $this->thumbnail->storeAs('new', $this->imageName, 'public');
            }

            if(!empty($this->logo))
            {
                $this->logoName = time().'.'.$this->logo->extension();
                $this->logo->storeAs('new', $this->logoName, 'public');
            }

            $validated['logo']= 'new/'.$this->logoName;
            $validated['image']= 'new/'.$this->imageName;

            News::create($validated);
            session()->flash('success', 'new created successfully');
            return redirect()->route('news.index');
        }
        public function cancel()
        {
        return redirect()->route('news.index');
        }

        public function render()
        {
        return view('livewire.news.creatnews');
        }
    }

