<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string',
            'description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $category = Category::create($validatedData);
            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Category created',
                'data'    => $category,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to create category',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json($category);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Category not found',
                'error'   => $e->getMessage(),
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string',
            'description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $category = Category::findOrFail($id);
            $category->update($validatedData);
            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Category updated',
                'data'    => $category,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to update category',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Category deleted',
        ]);
    }
}
