<?php 

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ProductController extends Controller {
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request) {
        try {
            $products = $this->productRepository->all();
            return response()->json($products, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to fetch products'], 500);
        }
    }

    public function store(ProductRequest $request) {
        try {
            $product = $this->productRepository->create($request->validated());
            return response()->json($product, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to create product'], 500);
        }
    }

    public function show($id) {
        try {
            $product = $this->productRepository->find($id);
            return response()->json($product, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to fetch product'], 500);
        }
    }

    public function update(ProductRequest $request, $id) {
        try {
            $this->productRepository->update($id, $request->validated());
            return response()->json(['message' => 'Updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to update product'], 500);
        }
    }

    public function destroy($id) {
        try {
            $this->productRepository->delete($id);
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to delete product'], 500);
        }
    }
}
