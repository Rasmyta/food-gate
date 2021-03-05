<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Dish;

class DishComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $restaurantId;
    public $search = "";
    public $category = "";
    public $sortField = "name";
    public $sortDirection = 'asc';
    public $showDeleteModal = false;
    public $showModal = false;
    public $upload;
    public $deleteId = '';
    public Dish $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    public function rules()
    {
        return [
            'editing.name' => 'required',
            'editing.category_id' => 'required',
            'editing.restaurant_id' => 'required',
            'editing.price' => 'required|numeric',
            'editing.description' => 'string|nullable',
            'upload' => 'nullable|image'
        ];
    }


    public function mount($restaurant)
    {
        $this->restaurantId = $restaurant->id;
        $this->editing = $this->makeBlankDish();
    }

    public function makeBlankDish()
    {
        return  $this->editing = Dish::make([
            'restaurant_id' => $this->restaurantId,
            'category_id' => Category::first()->id // important to put one by default
        ]);
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->category . '%')->get();

        $dishes = Dish::where('restaurant_id', $this->restaurantId)
            ->search($this->search)->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        return view('livewire.dish-component', ['dishes' => $dishes, 'categories' => $categories]);
    }

    public function edit(Dish $dish)
    {
        if ($this->editing->isNot($dish)) $this->editing = $dish;
        $this->category = $dish->getCategory->name;
        $this->showModal = true;
    }

    public function create()
    {
        // Initializing editing object and cleaning modal fields
        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankDish();
            $this->upload = "";
            $this->category = "";
        }

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();

        $this->upload && $this->editing->update([
            'photo_path' => $this->upload->store('/', 'diskdishes')
        ]);

        $this->showModal = false;
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        Dish::findOrFail($this->deleteId)->delete();
        $this->showDeleteModal = false;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }
}
