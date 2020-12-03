<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Services\ApiService;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
     * @Route("/api/admin")
     */
class PromoController extends AbstractController
{
    /**
     * @Route("/promo", name="add_promo", methods={"POST"})
     */
    public function addPromo(Request $request, SerializerInterface $serializer, ApiService $apiService, EntityManagerInterface $em): Response
    {

        $data = $request->request->all();
        if (count($data)===0) {
            $data = json_decode($request->getContent(), true);
        }

        // gestion referentiel
        $data['referentiel'] = "/api/admin/referentiels/".$data["referentiel"];

        $data = $apiService->unsetter($data,['groupes','formateurs','apprenants']);
        
        // denormalisation de l'obejct promo
        $new_promo = $serializer->denormalize($data[0], "App\Entity\Promo");
        $new_promo->setDateDebut(new DateTime);
        //  creation du groupe  principal
        $gr_princi = new Groupe();
        $new_promo->addGroupe($gr_princi->setLibelle("Groupe principal"));
        // 
        $new_promo->setApprenants($apiService->creatApprenant($data[1]['apprenants']));
        $new_promo->setFormateurs($apiService->retrivesFormateur($data[1]['formateurs']));
        $new_promo->setGroupes($apiService->creatGroupe($data[1]['groupes']));

        $em->persist($new_promo);
        $em->flush();

        return $this->json(['message' => 'Succes']);
    }

    /**
     * @Route("/promoddd", name="get_promo_id_group_id")
     */
    public function getPromoIdGroupId(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }

        /**
     * @Route("/promodfthj", name="update_promo_id_ref")
     */
    public function updatePromoIdRef(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }
 
    /**
     * @Route("/promogghbnm", name="update_promo_id_pppre")
     */
    public function updatePromoIdAppre(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }   
    
    /**
     * @Route("/promoaswx", name="update_promo_id_Form")
     */
    public function updatePromoIdForm(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }  
    
    
    /**
     * @Route("/promopplmj", name="update_promo_id_groupd_id")
     */
    public function updatePromoIdGroupdId(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }      
}
