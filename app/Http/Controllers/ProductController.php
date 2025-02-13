<?php 


namespace App\Http\Controllers;
use App\Repositories\ProductRepositoryInterface;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller {
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request) {
        $products = $this->productRepository->all();
        return response()->json($products);
    }

    public function store(ProductRequest $request) {
        $product = $this->productRepository->create($request->validated());
        return response()->json($product, 201);
    }

    public function show($id) {
        $product = $this->productRepository->find($id);
        return response()->json($product);
    }

    public function update(ProductRequest $request, $id) {
        $this->productRepository->update($id, $request->validated());
        return response()->json(['message' => 'Updated successfully']);
    }

    public function destroy($id) {
        $this->productRepository->delete($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
