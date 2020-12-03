<?php

namespace App\Controller;

use DateTime;
use App\Entity\Groupe;
use App\Repository\ApprenantRepository;
use App\Repository\FormateurRepository;
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
        if (count($data) === 0) {
            $data = json_decode($request->getContent(), true);
        }

        // gestion referentiel
        $data['referentiel'] = "/api/admin/referentiels/" . $data["referentiel"];

        $data = $apiService->unsetter($data, ['groupes', 'formateurs', 'apprenants']);

        // denormalisation de l'obejct promo
        $new_promo = $serializer->denormalize($data[0], "App\Entity\Promo");
        $new_promo->setDateDebut(new DateTime);

        //  creation du groupe  principal
        $gr_princi = new Groupe();
        $new_promo->addGroupe($gr_princi->setLibelle("Groupe principal"));

        // gestion apprenants
        $new_promo->setApprenants($apiService->creatApprenant($data[1]['apprenants'], $request->files->get("fichier")));

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
        $reslt = $repo_gr->findOneByIdGroupeIdPromo($di, $id);

        dd($reslt);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }

    /**
     * @Route("/promo/{id}/groupes/{di}/apprenants", name="get_promo_id_group_id")
     */
    public function getPromoIdGroupIdApprenants(int $id, int $di, GroupeRepository $repo_gr, SerializerInterface $serializer): Response
    {
        $reslt = $repo_gr->findOneByIdGroupeIdPromo($di, $id);

        $reslt = $serializer->serialize($reslt, "")

        dd($reslt);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PromoController.php',
        ]);
    }


    /**
     * @Route("/promo/{id}/apprenants", name="update_promo_id_appre", methods={"PUT"})
     */
    public function updatePromoIdAppre(int $id, Request $request, PromoRepository $repo_promo, ApprenantRepository $repo_appre, ApiService $apiService, EntityManagerInterface $em): Response
    {
        // security du route
        if (!in_array("ROLE_ADMIN", $this->getUser()->getRoles())){
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }

        // recuperation des email envoyer
        $data = json_decode($request->getContent(), true);
        if ($data == null) {
            $data = $request->request->all()["apprenants"];
        }

        // recuperation du promo
        $promo = $repo_promo->find($id);

        // ajout des nouveaux apprenants
        $Apprenants_add = $apiService->creatApprenant(isset($data["add"]) ? $data["add"] : [], $request->files->get("fichier"));
        $promo->setApprenants($Apprenants_add);

        // suppresion des apprenants dans la promo
        foreach (isset($data["remove"]) ? $data["remove"] : [] as $key => $emailAppre){
            $appre = $repo_appre->findOneByEmail($emailAppre);
            if ($appre) {
                $promo->removeApprenant($appre);
            }
        }

        $em->flush();

        return $this->json(['message' => 'Updated']);
    }

    /**
     * @Route("/promo/{id}/formateurs", name="update_promo_id_Form", methods={"PUT"})
     */
    public function updatePromoIdForm(int $id, Request $req, PromoRepository $repo_promo, EntityManagerInterface $em, FormateurRepository $repo_forma): Response
    {

        // security du route
        if (!in_array("ROLE_ADMIN", $this->getUser()->getRoles()) && !in_array("ROLE_FOMATEUR", $this->getUser()->getRoles())) {
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }
        $promo = ($repo_promo->find($id));
        $data = json_decode($req->getContent(), true);

        foreach ($data["formateurs"] as $key => $value) {
            if ($value['action'] == "remove") {
                $promo->removeFormateur($repo_forma->find($value['id']));
            } else {
                $promo->addFormateur($repo_forma->find($value['id']));
            }
        }
        $em->flush();

        return $this->json([
            'message' => 'Succes'
        ]);
    }


    /**
     * @Route("/promo/{id}/groupes/{di}", name="update_promo_id_groupd_id", methods={"PUT"})
     */
    public function updatePromoIdGroupdId(int $id, int $di, PromoRepository $repo_promo, EntityManagerInterface $em, GroupeRepository $repo_groupe): Response
    {
        //  modifier statu du group

        $promo = $repo_promo->find($id);
        $groupe = $repo_groupe->find($di);

        if ($promo == null or !$promo->getGroupes()->contains($groupe)) {
            return $this->json([
                'message' => 'Ce groupe n\'est pas dans le promo'
            ]);
        }

        $groupe->setStatut(!$groupe->getStatut());

        $em->flush();

        return $this->json([
            'message' => 'Updated !!!'
        ]);
    }
    
}
