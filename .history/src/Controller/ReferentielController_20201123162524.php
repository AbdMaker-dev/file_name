<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
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
    public function addReferentiel(Request $request, SerializerInterface $serializer, CompetenceRepository $repo_competence): Response
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
            $new_ref->addReferentiel($repo_competence->find())
        }

        dd($data);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ReferentielController.php',
        ]);
    }
}
