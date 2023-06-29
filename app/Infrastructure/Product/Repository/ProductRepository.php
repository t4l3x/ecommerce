<?php
declare(strict_types=1);

namespace App\Infrastructure\Product\Repository;
use App\Infrastructure\Product\Eloquent\Product as ProductModel;
use App\Domain\Product\Entities\Product;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use Illuminate\Support\Collection;
class ProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product): Product
    {
        $productModel = new ProductModel();

        // This assumes your Product domain entity has getters for these properties.
        // If not, adjust as necessary.
        $productModel->name = $product->name;
        $productModel->description = $product->description;
        $productModel->price = $product->price;

        $productModel->save();

        // Here you might populate the domain entity with data from the Eloquent model.
        // For instance, if your database generates IDs, you might set the ID on the
        // domain entity after the Eloquent model is saved.

        return $product;
    }

    public function findById(int $id): ?Product
    {
        $productModel = ProductModel::where('id',$id);

        if (!$productModel) {
            return null;
        }

        // Here you would convert the Eloquent model to a domain entity.
        // This is pseudo-code - adjust according to your actual domain entity.
        return new Product($productModel->name, $productModel->description, $productModel->price);
    }

    public function findAll(): array
    {
        // Here, we're returning a Collection of Eloquent models. Ideally, you should
        // convert these to domain entities. However, that might not be practical
        // if you're dealing with large amounts of data. Adjust according to your needs.
        return ProductModel::all()->toArray();
    }

    public function delete(Product $product): void
    {
        $id = $product->getId();
        ProductModel::destroy($id);
    }
}
