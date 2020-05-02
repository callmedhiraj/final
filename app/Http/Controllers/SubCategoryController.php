<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Repositories\SubCategoryRepository;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class SubCategoryController extends AppBaseController
{
    /** @var  SubCategoryRepository */
    private $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepo)
    {
        $this->subCategoryRepository = $subCategoryRepo;

    }

    /**
     * Display a listing of the SubCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subCategories = $this->subCategoryRepository->paginate(10);

        return view('sub_categories.index')
            ->with('subCategories', $subCategories);
    }

    /**
     * Show the form for creating a new SubCategory.
     *
     * @return Response
     */
    public function create()
    {
        $attributes = Attribute::select('id','feature')->pluck('feature','id')->toArray();
        return view('sub_categories.create',compact('attributes'));
    }

    /**
     * Store a newly created SubCategory in storage.
     *
     * @param CreateSubCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSubCategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        $subCategory = $this->subCategoryRepository->create($input);
        if (!$request->has('attribute_id')) {
            $subCategory->attributes()->detach();
            return;
        }
        if ($request->has('attribute_id'))
        {
            $allAttribute = array();

        foreach ($request->attribute_id as $attributeId) {
            if (substr($attributeId, 0, 4) == 'new:') {
                $data['feature'] = substr($attributeId, 4);
                $newattribute = Attribute::create($data);
                $allAttribute[] = $newattribute->id;
                continue;
            }
            $allAttribute[] = $attributeId;
        }

        $subCategory->attributes()->sync($allAttribute);
    }
        Flash::success('Sub Category saved successfully.');

        return redirect(route('subCategories.index'));
    }

    /**
     * Display the specified SubCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        return view('sub_categories.show')->with('subCategory', $subCategory);
    }

    /**
     * Show the form for editing the specified SubCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);
        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }
        $attributes = Attribute::select('id','feature')->pluck('feature','id')->toArray();
        $selected_attributes=DB::table('attribute_sub_category')->where('sub_category_id',$id)->pluck('attribute_id')->toArray();
        return view('sub_categories.edit',compact('attributes','selected_attributes'))->with('subCategory', $subCategory);
    }

    /**
     * Update the specified SubCategory in storage.
     *
     * @param int $id
     * @param UpdateSubCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubCategoryRequest $request)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        $subCategory = $this->subCategoryRepository->update($request->all(), $id);

        if ($request->has('attribute_id')) {
            $allAttribute = array();

            foreach ($request->attribute_id as $attributeId) {
                if (substr($attributeId, 0, 4) == 'new:') {
                    $data['feature'] = substr($attributeId, 4);
                    $newattribute = Attribute::create($data);
                    $allAttribute[] = $newattribute->id;
                    continue;
                }
                $allAttribute[] = $attributeId;
            }

            $subCategory->attributes()->sync($allAttribute);
        }
        Flash::success('Sub Category updated successfully.');

        return redirect(route('subCategories.index'));
    }

    /**
     * Remove the specified SubCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        $this->subCategoryRepository->delete($id);

        Flash::success('Sub Category deleted successfully.');

        return redirect(route('subCategories.index'));
    }
    public function attribute(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $attributes = Attribute::select('id','feature')->get();
        }
        else{

            $attributes = Attribute::select('id','feature')->where('feature', 'like', '%' .$search . '%')->get();
        }

        $response = array();
        foreach($attributes as $attribute){
            $response[] = array(
                "id"=>$attribute->id,
                "text"=>$attribute->feature
            );
        }

        echo json_encode($response);
        exit;
    }
}
