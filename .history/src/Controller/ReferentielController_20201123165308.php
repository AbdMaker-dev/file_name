<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/api/admins")
     */
class ReferentielController extends AbstractController
{
    /**
     * @Route("/referentiels", name="referentiel")
     */
    public function addReferentiel(Request $request, SerializerInterface $serializer, CompetenceRepository $repo_competence, Ent $em): Response
    {
        // security du route
        if (in_array("ROLE_APPRENANT", $this->getUser()->getRoles())) {
            return $this->json([
                'message' => 'Acces no autoriser',
            ]);
        }

        $data = json_decode($request->getContent(), true);

        $competences = $data['competences'];

        unset($data['competences']);

        $new_ref = $this->serializer->denormalize($data, "App\Entity\Referentiel");

        foreach ($competences as $key => $value) {
            $new_ref->addReferentiel($repo_competence->find($value));
        }

        dd($new_ref);

        $em->persist($new_ref);
        $em->flush();

        return $this->json([
            'message' => 'Succes'
        ]);
    }
}
