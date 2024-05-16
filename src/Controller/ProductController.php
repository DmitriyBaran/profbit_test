<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\ProductService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator,  Request $request): Response
    {
        $repository = $entityManager->getRepository(Product::class);

        $sortField = $request->query->get('sort', 'p.id');
        $sortOrder = $request->query->get('order') ?? 'DESC';

        $queryBuilder = $repository->createQueryBuilder('p');
        $queryBuilder->orderBy($sortField, $sortOrder);

        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('product/index.html.twig', [
            'pagination' => $pagination,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
        ]);
    }

    #[Route('/product_info', name: 'product_info')]
    public function getProductInfo(ProductService $productService) : Response
    {
        $productInfo = $productService->getProductInfo();

        return $this->render('product/info.html.twig', [
            'productInfo' => $productInfo,
        ]);
    }

}
