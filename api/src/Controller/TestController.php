<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Client;
use App\Entity\Credit;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
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

    #[Route(path:'create-client', name: 'create_client')]
    public function createClient(Request $request): JsonResponse
    {
        $requestData=json_decode($request->getContent(),true);
        if(!isset($requestData['name'],$requestData['phoneNumber'],$requestData['adress'],$requestData['pasportNumber'],$requestData['credits'])){
            throw new Exception("Invalid Request Data");
        }

        //Достаем обьект категории по id
//        $credits=$this->entityManager->getRepository(Credit::class)->findBy($requestData['credits']);
//
//        if(!$credits){
//            throw new Exception("Category with id ". $requestData['category'] ."not found");
//        }

        $client=new Client();
        $client->setName($requestData['name']);
        $client->setAdress($requestData['adress']);
        $client->setPhoneNumber($requestData['phoneNumber']);
        $client->setPasportNumber($requestData['pasportNumber']);
        $client->setCredits($requestData['credits']);
        $this->entityManager->persist($client);
        $this->entityManager->flush();
        return new JsonResponse($client,Response::HTTP_CREATED);
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
