<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\SubCategory;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;
use Response;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->paginate(10);

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        $sub_categories = SubCategory::select('id','name')->pluck('name','id')->toArray();
        return view('categories.create',compact('sub_categories'));
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = \Illuminate\Support\Str::slug($input['name']);

        $category = $this->categoryRepository->create($input);
        if (!$request->has('sub_categories_id')) {
            $category->subcategories()->detach();
        }
        if ($request->has('sub_categories_id'))
        {
            $allSubCategory = array();

        foreach ($request->sub_categories_id as $subcategoryid) {
            if (substr($subcategoryid, 0, 4) == 'new:') {
                $data['name'] = substr($subcategoryid, 4);
                $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
                $newsubcategory = SubCategory::create($data);
                $allSubCategory[] = $newsubcategory->id;
                continue;
            }
            $allSubCategory[] = $subcategoryid;
        }

        $category->subcategories()->sync($allSubCategory);
    }


        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        $sub_categories = SubCategory::select('id','name')->pluck('name','id')->toArray();
        $selected_subcategories=DB::table('category_subcategory')->where('category_id',$id)->pluck('sub_category_id')->toArray();
        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit',compact('sub_categories','selected_subcategories'))->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);
        $allSubCategory = array();

        foreach ($request->sub_categories_id as $subcategoryid)
        {
            if (substr($subcategoryid, 0, 4) == 'new:')
            {
                $data['name']=substr($subcategoryid, 4);
                $data['slug']=\Illuminate\Support\Str::slug($data['name']);
                $newsubcategory = SubCategory::create($data);
                $allSubCategory[] = $newsubcategory->id;
                continue;
            }
            $allSubCategory[] = $subcategoryid;
        }

        $category->subcategories()->sync($allSubCategory);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }

    public function subcategory(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $sub_categories = SubCategory::select('id','name')->get();
        }
        else{

            $sub_categories = SubCategory::select('id','name')->where('name', 'like', '%' .$search . '%')->get();
        }

        $response = array();
        foreach($sub_categories as $sub_categorie){
            $response[] = array(
                "id"=>$sub_categorie->id,
                "text"=>$sub_categorie->name
            );
        }

        echo json_encode($response);
        exit;
    }
}
