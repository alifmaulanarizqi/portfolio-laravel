<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\PortfolioCategory;

class PortfolioController extends Controller
{
    public function getCategory() {
        $categories = PortfolioCategory::latest()->get();
        return view('admin.portfolio.portfolio-category', compact('categories'));
    }

    public function addCategory() {
        return view('admin.portfolio.add-portfolio-category');
    }

    public function storeCategory(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:portfolio_categories',
        ]);

        $category = new PortfolioCategory;
        $category->name = $request->name;

        $notif = array();

        if($category->save()) {
            $notif = array(
                'message' => 'Category added successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Category added failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.category')->with($notif);
    }

    public function editCategory($id) {
        $category = PortfolioCategory::find($id);
        return view('admin.portfolio.edit-portfolio-category', compact('category'));
    }

    public function updateCategory(Request $request) {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'required|max:255|unique:portfolio_categories,name,'.$id,
        ]);

        $update = PortfolioCategory::find($id)->update([
            'name' => $request->name,
        ]);

        $notif = array();

        if($update) {
            $notif = array(
                'message' => 'Category updated successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Category update failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.category')->with($notif);
    }

    public function deleteCategory() {
        $id = $_POST['deleteId'];
        $category = PortfolioCategory::where('id', $id)->first();

        $delete = false;
        if($category != null) {
            $delete = $category->delete();
        }

        if($delete) {
            $notif = array(
                'message' => 'Category deleted successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Category delete failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.category')->with($notif);
    }
}
