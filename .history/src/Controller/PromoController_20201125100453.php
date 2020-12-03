<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Repository\GroupeRepository;
use App\Repository\PromoRepository;
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

        // gestion apprenants
        $new_promo->setApprenants($apiService->creatApprenant($data[1]['apprenants']));

        // geston formateur
        $new_promo->setFormateurs($apiService->retrivesFormateur($data[1]['formateurs']));

        // gestion des groupes
        $new_promo->setGroupes($apiService->creatGroupe($data[1]['groupes']));

        $em->persist($new_promo);
        $em->flush();

        return $this->json(['message' => 'Succes']);
    }

    /**
     * @Route("/promo/{id}/groupes/{di}", name="get_promo_id_group_id")
     */
    public function getPromoIdGroupId(int $id, int $di, GroupeRepository $repo_gr): Response
    {
        $reslt = $repo_gr->findOneByIdGroupeIdPromo($di,$id);

        dd($reslt);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }

    /**
     * @Route("/promo/{id}/groupes/{di}/apprenants", name="get_promo_id_group_id")
     */
    public function getPromoIdGroupIdApprenants(int $id, int $di, GroupeRepository $repo_gr): Response
    {
        $reslt = $repo_gr->findOneByIdGroupeIdPromo($di,$id);

        dd($reslt);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }


    /**
     * @Route("/promo/{id}/referentielsssss", name="update_promo_id_ref")
    */
    public function updatePromoIdRef(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }
 
    /**
     * @Route("/promo/{id}/apprenants", name="update_promo_id_appre", methods={"PUT"})
     */
    public function updatePromoIdAppre(int $id, Request $request, PromoRepository $repo_promo): Response
    {

        
        $fichier= $request->files->get("fichier");
        if ($fichier){
            eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MDYyOTUwNDEsImV4cCI6MTYwNjI5ODY0MSwicm9sZXMiOlsiUk9MRV9BRE1JTiJdLCJ1c2VybmFtZSI6ImFkbWluXzIwMjEifQ.GQgGAYEe0ZBnCCyDm39OL0e3I-WYLOqE5FsNzkp1bOWvXg_VC61EKvpGo2oTHUvGRvLW1a9zFleaycqepUT66ETjvbeDFI5dd150s6VwgMEtkFMyZRAcmcg98sDhY8vX1FFQZ41-gegD2Ju54U7ipp9BEueB0M3CVcZau-XWM_5PxB1Xk_zjI7YUSyEQWXdL4fsqvOtOeDhsggIgfnEaP8KPNEtjUX84oKh9ZQyoRV8Pc-fzIK_2BLMoBCVc76A_pLp6txhEYRCtyphI6rXkfOm2Cj1z_baluj8AW77dl8gCEoqmk7bVVqVXV_RizSSgxmBxru6FDOi5UiWaRuJGZt_lUhUTV3gY-_Uo2YSJTM8LvH14_ylc74SvTTglKgY1djOaXOK0fOaN0jGwjVCZxqhbqQXrFwBuIYl8zO896xgmFrK4HXESY2WAsZAajb_DBKQRmWRYNVUGTowAwhPg-y5nsyeM75R9GWN0O8trPNgk5bxSCsFOjatyeoRZ99r3PqToOtek0j1NS7cQ0t81ItWWLIx7vSqBOD7bZzmFHIvGrUoAoA3Fyu8Ff1xHc7INKew0rpEO3vHgk5jvILBZARfUn8NbbOVo0kF7lPSG5DBwZKORIvZjV15OFW_N-kMjJIrwYOmp-ZVgnv1S1WCAwQnqoJwd-4BFl5fiweCH_lk
            $array = \PhpOffice\PhpSpreadsheet\IOFactory::load($fichier->getRealPath());

            dd($array);
        }
        
       



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
