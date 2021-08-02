<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $category = 1;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|exists:App\Models\Category,id',
        'description' => 'required|min:4',
    ];

    /**
     * Renders the component for creating an idea
     * @return Application|Factory|View
     */
    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-idea', [
            'categories' => $categories
        ]);
    }

    /**
     * Processes the request for creating a new idea
     * @return RedirectResponse
     */
    public function createIdea(): RedirectResponse
    {
        if (!auth()->check()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        Idea::query()->create([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category,
            'status_id' => 1,
            'user_id' => auth()->id(),
        ]);

        session()->flash('success_message', 'Idea was added successfully.');

        $this->reset();

        return redirect()->route('ideas.index');
    }
}
