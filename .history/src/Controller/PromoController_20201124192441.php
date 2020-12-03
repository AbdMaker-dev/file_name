<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Services\ApiService;
use DateTime;
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
    public function addPromo(Request $request, SerializerInterface $serializer, ApiService $apiService): Response
    {

        $data = $request->request->all();
        if (count($data)===0) {
            $data = $request->getContent();
        }
        $data['referentiel'] = "/api/admin/referentiels/".$data["referentiel"];

        $_formateurs = $data['formateurs'];
        $_apprenants= $data['apprenants'];
        $_groupes = $data['groupes'];

        $data = $apiService->unsetter($data,['groupes','formateurs','apprenants']);
        $new_promo = $serializer->denormalize($data, "App\Entity\Promo");
        $new_promo->setDateDebut(new DateTime);
        $gr_princi = new Groupe();
        $new_promo->addGroupe($gr_princi->setLibelle("Groupe principal"));
        $new_promo->setApprenants($apiService->creatApprenant($_apprenants));
        $new_promo->setFormateurs($apiService->retrivesFormateur($_formateurs));
        $new_promo->setGroupes($apiService->creatGroupe($tabLibelles))

        dd($new_promo);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
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
