<?php

namespace App\Controller;

use DateTime;
use App\Entity\Groupe;
use App\Services\ApiService;
use App\Repository\PromoRepository;
use App\Repository\GroupeRepository;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        // $fichier= $request->files->get("fichier");
        // if ($fichier){
        //     // dd($fichier);
            
        //     $array = \PhpOffice\PhpSpreadsheet\IOFactory::load($fichier->getRealPath());
        //     $this->createDataFromSpreadsheet($spreadsheet);

        //     dd($array);
        // }
        $emailApprenat = array();
        if (!empty($request->files->get('fichier'))) {
            $filename = $request->files->get('fichier')->getRealPath();
            $emailApprenatEx = $this->readFileExcel($filename);
            dd("oki");
            foreach ($emailApprenatEx as $value) {
                $emailApprenat[] = $value[0];
            }
        }
        dd($emailApprenat);
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }   
    
    /**
     * @Route("/promo/{id}/formateurs", name="update_promo_id_Form", methods={"PUT"})
     */
    public function updatePromoIdForm(int $id, Request $req, PromoRepository $repo_promo): Response
    {
        $promo = ($repo_promo->find($id));

        $data = json_decode($req->getContent(), true);

        dd($data);

        foreach ($data as $key => $value) {
            if ($data['']) {
                # code...
            }
        }

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
    
    // public function readFileExcel($filename)
    // {
    //     $reader = \PHPExcel_IOFactory::createReaderForFile($filename);
    //     $reader->setReadDataOnly(true);
    //     $wb = $reader->load($filename);
    //     $ws = $wb->getSheet(0);
    //     $rows = $ws->toArray();
    //     return $rows;
    // }
}
