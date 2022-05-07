<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminEditJobCompoent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_salary;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $job_id;

    public function mount($job_slug)
    {
        $job = Job::where('slug', $job_slug)->first();
        $this->name = $job->name;
        $this->slug = $job->slug;
        $this->short_description = $job->short_description;
        $this->description = $job->description;
        $this->regular_salary = $job->regular_salary;
        $this->SKU = $job->SKU;
        $this->stock_status = $job->stock_status;
        $this->featured = $job->featured;
        $this->quantity = $job->quantity;
        $this->image = $job->image;
        $this->category_id = $job->category_id;
        $this->job_id = $job->id;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:jobs',
            'short_description' => 'required',
            'description' => 'required',
            'regular_salary' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'newimage' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required'
        ]);
    }

    public function updateJob()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:jobs',
            'short_description' => 'required',
            'description' => 'required',
            'regular_salary' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'newimage' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required'
        ]);
        $job = Job::find($this->job_id);
        $job->name = $this->name;
        $job->slug = $this->slug;
        $job->short_description = $this->short_description;
        $job->description = $this->description;
        $job->regular_salary = $this->regular_salary;
        $job->SKU = $this->SKU;
        $job->stock_status = $this->stock_status;
        $job->featured = $this->featured;
        $job->quantity = $this->quantity;
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $job->image = $imageName;
        }
        $job->category_id = $this->category_id;
        @$job->save();
        session()->flash('message', 'Job has been updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-job-compoent', ['categories' => $categories])->layout('layouts.base');
    }
}
