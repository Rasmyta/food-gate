<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Restaurant;

class RestaurantComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = "";
    public $sortField = "name";
    public $sortDirection = 'asc';
    public $showModal = false;
    public $upload;
    public Restaurant $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    public function rules()
    {
        return [
            'editing.name' => 'required',
            'editing.address' => 'required',
            'editing.city' => 'required',
            'editing.phone' => 'required',
            'editing.email' => 'required|email:rfc,filter',
            'editing.latitude' => 'required|numeric',
            'editing.longitude' => 'required|numeric',
            'editing.user_id' => 'numeric',
            'upload' => 'image'
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankRestaurant();
    }

    public function render()
    {
        if (Auth::user()->role->name == "Administrator") {
            $restaurants = Restaurant::search($this->search)->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10);
        } else {
            $restaurants = Restaurant::where('user_id', '=', Auth::id())->search($this->search)->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10);
        }
        return view('livewire.restaurant-component', [
            'restaurants' => $restaurants
        ]);
    }

    public function edit(Restaurant $restaurant)
    {
        $this->editing = $restaurant;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();

        $this->upload && $this->editing->update([
            'photo_path' => $this->upload->store('/', 'restaurants')
        ]);

        $this->showModal = false;
    }

    public function create()
    {
        $this->editing = $this->makeBlankRestaurant(); //cleaning modal fields
        $this->showModal = true;
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

    public function makeBlankRestaurant()
    {
        return  $this->editing = Restaurant::make(['user_id' => Auth::id()]);
    }
}
