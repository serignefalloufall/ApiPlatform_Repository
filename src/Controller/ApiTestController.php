<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TestRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Validator\Validator\ValidatorInterface;




use Symfony\Component\HttpFoundation\JsonResponse;






class ApiTestController extends AbstractController
{
    /**
     * @Route("/api/test", name="api_test_index", methods={"GET"})
     */
    //methods={"GET"} pour preciser que cette route ne marche que lorsqu'on arive avec la methode GET

    public function index(TestRepository $testRepository)
    {
        //ici on rercupere les info le transforme en json
        return $this->json($testRepository->findAll(), 200, [], ['groups'=>'test:read']);      
    }


    /**
     * @Route("/api/test", name="api_test_store", methods={"POST"})
     */
    public function store(Request $request, SerializerInterface $serializer, EntityManagerInterface $em,
    ValidatorInterface $validator)
    {
        $jsonRecu = $request->getContent();

        try
        {
            $test = $serializer->deserialize($jsonRecu, Test::class, 'json');

            $error = $validator->validate($test);

            if(count($error) > 0)
            {
                return $this->json($error, 400);
            }

            $em->persist($test);

            $em->flush();

            return $this->json($test, 201, [], ['groups'=>'test:read']);
            
        }catch(NotEncodableValueException $e){

            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }

    }

}
