<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesFormRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->authorizeResource(Category::class, 'category');
        view()->share("category_menu", "active");
    }

    public function index()
    {
        $categories = Category::paginate(config("system.pagination.per_page"));
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('categories.create', compact("roles"));
    }

    public function store(CategoriesFormRequest $request)
    {
        $data = $request->getData();
        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category was successfully added.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category, CategoriesFormRequest $request)
    {
        $data = $request->getData();
        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category was successfully updated.');    
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category was successfully deleted.');
        } catch (Exception $exception) {
            return redirect()->route('categories.index')->with('error', 'Something Went Wrong.');
        }
    }
}
