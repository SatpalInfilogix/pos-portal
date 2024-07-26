<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use File;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function getCategories(Request $request)
    {
        $maxItemsPerPage = 10;

        // Base query
        $categoriesQuery = Category::select(['id', 'name', 'image', 'status']);

        // Search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $categoriesQuery->where('name', 'like', '%' . $searchValue . '%');
        }

        // Ordering
        if ($request->has('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumn]['data'];
            $categoriesQuery->orderBy($column, $orderDirection);
        }

        // Pagination
        $totalRecords = $categoriesQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = $request->input('start', 0) / $perPage;
        $categories = $categoriesQuery->skip($currentPage * $perPage)->take($perPage)->get();

        // Respond with data
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords, // This should reflect the filtered count if filtering is applied
            "data" => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/category/'), $filename);
        }

        Category::create([
            'name'          => $request->category_name,
            'image'         => 'uploads/category/'. $filename,
            'created_by'    => Auth::id(),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id) 
    {
        $category = Category::where('id', $id)->first(); // Fetch the product by ID

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::where('id', $id)->first();
        $oldCategoryImage = NULL;
        if($category != '') {
            $oldCategoryImage = $category->image;
        }

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/category/'), $filename);

            $image_path = public_path($oldCategoryImage);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $category->update([
            'name'          => $request->category_name,
            'image'         =>  isset($filename) ? 'uploads/category/'. $filename : $oldCategoryImage,
        ]);
        
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category) {
            if($category->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            // $status = 1; // Assuming this marks the category as "deleted"
            $category->update([
                    'status' => $status
            ]);

            return response()->json(['status' => 'success', 'categoryStatus' => $status, 'message' => 'Category deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Category not found.'], 404);
        }
    }

}
