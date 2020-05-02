<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\SubCategory;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Validator;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::where('status',1)->orderBy('created_at','desc')->paginate(9);

        return view('products.index')
            ->with('products', $products);
    }

    public function approved(Request $request)
    {
        $products = Product::where('status',2)->orderBy('created_at','desc')->paginate(9);

        return view('products.approved')
            ->with('products', $products);
    }
    public function approval($id)
    {
        $product = $this->productRepository->find($id);
        $product->status =2;
        $product->save();
        return redirect(route('products.index'))->withSuccess('Product approved successfully');

    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
       $conditions=['New(not used)','Used Few times','Excellent','Good','Not working'];
       $delivery_area=['within my area','within my city','anywhere in Nepal'];
$sub_categories=SubCategory::select('id','name')->pluck('name','id')->toArray();
        return view('products.create',compact('conditions','delivery_area','sub_categories'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'expiry_time' => ["required" , "max:255", "in:month,day,Year"]
        ]);

        $input['status']=0;

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        $conditions=['New(not used)','Used Few times','Excellent','Good','Not working'];
        $delivery_area=['within my area','within my city','anywhere in Nepal'];
        $sub_categories=SubCategory::select('id','name')->pluck('name','id')->toArray();
        return view('products.edit',compact('conditions','delivery_area','sub_categories','product'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'expiry_time' => ["required" , "max:255", "in:month,day,Year"]
        ]);
        dd($validator);
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
