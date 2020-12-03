<?php

namespace App\Controller;

use App\Entity\EtatBrief;
use App\Repository\BriefRepository;
use App\Repository\EtatBriefRepository;
use App\Repository\PromoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/promos/{id}/briefs", name="promo_id_briefs", methods={"GET"})
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
     * @Route("/formateur/{id}/briefs/broullons", name="getFormateurIdBriefsBroullon", methods={"GET"})
     */
    public function getFormateurIdBriefsBroullon(int $id, BriefRepository $repo_brief, EtatBriefRepository $repo_etat, SerializerInterface $serializer): Response
    {

        $etat = $repo_etat->findOneByLibelle("BROULLON");

        $brief = $repo_brief->findByEtatBrief($id, $etat->getId());

        if (!$etat or !$brief) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $reslt = $serializer->serialize($brief, "json", ["groups"=>"briefs:read"]);
        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    } 
    
    /**
     * @Route("/formateur/{id}/briefs/valide", name="getFormateurIdBriefsValider", methods={"GET"})
     */
    public function getFormateurIdBriefsValider(int $id, BriefRepository $repo_brief, EtatBriefRepository $repo_etat, SerializerInterface $serializer): Response
    {

        $etat = $repo_etat->findOneByLibelle("VALIDE");

        $brief = $repo_brief->findByEtatBrief($id, $etat->getId());

        if (!$etat or !$brief) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $reslt = $serializer->serialize($brief, "json", ["groups"=>"briefs:read"]);
        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    }     


        /**
     * @Route("/promo/{id}/briefs/{di}", name="getPromoIdBriefsId", methods={"GET"})
     */
    public function getPromoIdBriefsId(int $id, int $di, PromoRepository $repo_promo, SerializerInterface $serializer): Response
    {

        $promo_groups = $repo_promo->findOneByPomoIBriefId($id,$di);

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
     * @Route("/briefs/{di}", name="postBriefsId", methods={"POST"})
     */
    public function postBriefsId(int $id, BriefRepository $repo_brief, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $brief = $repo_brief->findOneById($id);

        if (!$brief) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $new_brief = $brief;

        $new_brief->setId(null);

        $em->persist($new_brief);
        $em->flush();

        $reslt = $serializer->serialize($new_brief, "json", ["groups"=>"briefs:read"]);

        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    }

    /**
     * @Route("/briefs", name="postBriefs", methods={"POST"})
     */
    public function postBriefs(Request $request, BriefRepository $repo_brief, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {

        $data = json_decode($request->getContent(), true);
        if (!$data) {
            $data = $request->request->all();
        }

        $avatar = $request->files->get("image");
        if ($avatar){
            $avatar = fopen($avatar->getRealPath(), "rb");
            $data["image"] = $avatar;
        }

        $

        dd($data);


        if (!$brief) {
            return $this->json([
                'message' => 'not found!!!'
            ]);
        }

        $new_brief = $brief;

        $new_brief->setId(null);

        $em->persist($new_brief);
        $em->flush();

        $reslt = $serializer->serialize($new_brief, "json", ["groups"=>"briefs:read"]);

        return $this->json([
            'message' => 'oki',
            'code' => 200,
            'result' => $reslt
        ]);
    }    

}
