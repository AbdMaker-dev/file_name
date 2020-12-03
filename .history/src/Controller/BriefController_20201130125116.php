<?php

namespace App\Controller;

use App\Repository\PromoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/api/formateur")
*/
class BriefController extends AbstractController
{
    /**
     * @Route("/promo/{id}/groupe/{di}/briefs", name="promo_id_groupe_id_briefs", methods={"GET"})
     */
    public function getPromoIdGroupeIdBriefs(int $id, int $di, PromoRepository $repo_promo, SerializerInterface $serializer): Response
    {

        $promo_groups = $repo_promo->findOneByPomoIdGroupeId($id,$di);

        if (!$promo_groups) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $reslt = $serializer->serialize($promo_groups, "json", ["groups"=>"groupe_briefs:read"]);
        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    }

    /**
     * @Route("/promos/{id}/briefs", name="promo_id_groupe_id_briefs", methods={"GET"})
     */
    public function getPromoIdBriefs(int $id, PromoRepository $repo_promo, SerializerInterface $serializer): Response
    {

        $promo = $repo_promo->findOneById($id);

        if (!$promo) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $reslt = $serializer->serialize($promo, "json", ["groups"=>"groupe_briefs:read"]);
        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    }

    /**
     * @Route("/formateur/{id}/briefs/broullons", name="getFormateurIdBriefs", methods={"GET"})
     */
    public function getFormateurIdBriefs(int $id, PromoRepository $repo_promo, SerializerInterface $serializer): Response
    {

        $promo = $repo_promo->findOneById($id);

        if (!$promo) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $reslt = $serializer->serialize($promo, "json", ["groups"=>"groupe_briefs:read"]);
        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    }    
}
