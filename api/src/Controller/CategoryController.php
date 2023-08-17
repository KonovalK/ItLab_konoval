<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response;

class CategoryController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    #[Route('category-create', name: 'category_create')]
    public function create(Request $request): JsonResponse
    {
        $requestData=json_decode($request->getContent(),true);
        if(!isset($requestData['name'],$requestData['type'])){
            throw new Exception("Invalid Request Data");
        }
        $category=new Category();

        $category->setName($requestData['name']);
        $category->setType($requestData['type']);
        $this->entityManager->persist($category);

        $this->entityManager->flush();
        return new JsonResponse($category, \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    #[Route('getAll', name: 'product_read')]
    public function getAll(Request $request): JsonResponse
    {
        $products=$this->entityManager->getRepository(Product::class)->findAll();
        return new JsonResponse($products);
    }
    #[Route('product/{id}', name: 'product_get_item')]
    public function getItem(string $id): JsonResponse
    {
        $product=$this->entityManager->getRepository(Product::class)->find($id);
        if(!$product){
            throw new Exception("Product with id". $id . "not found");
        }
        return new JsonResponse($product);
    }
    #[Route('productUpdate/{id}', name: 'product_set_item')]
    public function updateItem(string $id): JsonResponse
    {
        /** @var Product $product */
        $product=$this->entityManager->getRepository(Product::class)->find($id);
        if(!$product){
            throw new Exception("Product with id". $id . "not found");
        }
        $product->setName("New name");
        $this->entityManager->flush();
        return new JsonResponse($product);
    }

    #[Route('productDelete/{id}', name: 'product_delete_item')]
    public function deleteItem(string $id): JsonResponse
    {
        /** @var Product $product */
        $product=$this->entityManager->getRepository(Product::class)->find($id);
        if(!$product){
            throw new Exception("Product with id". $id . "not found");
        }
        $this->entityManager->remove($product);
        $this->entityManager->flush();
        return new JsonResponse();
    }
}
