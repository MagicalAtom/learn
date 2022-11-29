<?php

namespace mswco\Category\Repositories;

use mswco\Category\Models\Category;

class CategoryRepository
{

    public function all()
    {
        $all = Category::all();
        return $all;
    }

    public function delete($id)
    {
        Category::query()->findOrFail($id)->delete();
    }
    public function update($category,$request){
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
    }

    public function create($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->save();
    }

}
