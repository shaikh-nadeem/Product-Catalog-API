<?php 

namespace App\Repositories;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface {
    public function all() {
        return Product::paginate(10);
    }
    public function find($id) {
        return Product::findOrFail($id);
    }
    public function create(array $data) {
        return Product::create($data);
    }
    public function update($id, array $data) {
        return Product::where('id', $id)->update($data);
    }
    public function delete($id) {
        return Product::destroy($id);
    }
}
