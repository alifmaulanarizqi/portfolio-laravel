<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\PortfolioCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    // category
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



    // portfolio
    public function getPortfolio() {
        $porfolios = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio', compact('porfolios'));
    }

    public function addPortfolio() {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio.add-portfolio', compact('categories'));
    }

    public function storePortfolio(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'portfolio_category_id' => 'required',
            'image_thumbnail' => 'required',
            'long_desc' => 'required',
        ]);

        $imageInput = $request->file('image_thumbnail');
        $imageName = hexdec(uniqid()).'.'.$imageInput->getClientOriginalExtension();
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($imageInput)->scale(height: 800)->toJpeg(80)->save(base_path('public/upload/portfolio/'.$imageName));

        $portfolio = new Portfolio;
        $portfolio->title = $request->title;
        $portfolio->image_thumbnail = 'upload/portfolio/'.$imageName;
        $portfolio->portfolio_category_id = $request->portfolio_category_id;
        $portfolio->desc = $request->long_desc;
        $portfolio->client = $request->client;
        $portfolio->project_link = $request->project_link;

        $notif = array();

        if($portfolio->save()) {
            $protfolioId = $portfolio->id;

            $imageProjectInsertData = [];
            $portfolioImage = new PortfolioImage;

            foreach($request->image_project as $imageProject) {
                $imageName = hexdec(uniqid()).'.'.$imageProject->getClientOriginalExtension();
                $image = $manager->read($imageProject)->scale(height: 800)->toJpeg(80)->save(base_path('public/upload/portfolio/'.$imageName));

                array_push(
                    $imageProjectInsertData,
                    [
                        'image' => 'upload/portfolio/'.$imageName,
                        'portfolio_id' => $protfolioId,
                    ]
                );
            }

            $portfolioImage = PortfolioImage::insert($imageProjectInsertData);

            if($portfolioImage) {
                $notif = array(
                    'message' => 'Portfolio added successfully',
                    'alert-type' => 'success',
                );
            } else {
                Portfolio::find($protfolioId)->delete();
                $notif = array(
                    'message' => 'Portfolio added failed',
                    'alert-type' => 'error',
                );
            }
        }

        return Redirect()->route('index.portfolio')->with($notif);
    }

    public function getDetailPortfolio($id) {
        $portfolio = Portfolio::find($id);
        $projectImages = $portfolio->portfolioImages;
        return view('admin.portfolio.detail-portfolio', compact('portfolio', 'projectImages'));
    }

    public function deletePortfolio() {
        $id = $_POST['deleteId'];
        $portfolio = Portfolio::where('id', $id)->first();
        $portfolioImages = $portfolio->portfolioImages;

        $affectedRows = -1;
        if($portfolio->image_thumbnail) {
            $deletedImageFilePath = $portfolio->image_thumbnail;
            if (File::exists(public_path($deletedImageFilePath))) {
                File::delete(public_path($deletedImageFilePath));
            }

            // $affectedRows = $portfolio->delete();
        }

        if(count($portfolioImages) !== 0) {
            foreach($portfolioImages as $portfolioImage) {
                $deletedImageFilePath = $portfolioImage->image;
                if (File::exists(public_path($deletedImageFilePath))) {
                    File::delete(public_path($deletedImageFilePath));
                }
            }
        }

        $affectedRows = $portfolio->delete();
        $affectedRows = PortfolioImage::where('portfolio_id', $id)->delete();

        $notif = array();

        if($affectedRows > 0) {
            $notif = array(
                'message' => 'Portfolio deleted successfully',
                'alert-type' => 'success',
            );
        } else {
            $notif = array(
                'message' => 'Portfolio delete failed',
                'alert-type' => 'error',
            );
        }

        return Redirect()->route('index.portfolio')->with($notif);
    }
}
