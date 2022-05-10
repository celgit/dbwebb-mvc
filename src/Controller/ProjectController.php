<?php

namespace App\Controller;

use App\Entity\Tire;
use App\Repository\ProjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Exception;

class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'app_project')]
    public function index(): Response
    {
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    /**
     * @Route("/proj/about", name="proj_about")
     */
    public function projAbout(): Response
    {
        return $this->render('project/proj-about.html.twig');
    }

    /**
     * @Route(
     *     "/proj/register",
     *     name="register_tire",
     *     methods={"POST"} )
     */
    public function registerTire(
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $entityManager = $doctrine->getManager();

        $tire = new Tire();
        $tire->setBrand($request->request->get('brand'));
        $tire->setModel($request->request->get('model'));
        $tire->setWidth($request->request->get('width'));
        $tire->setProfile($request->request->get('profile'));
        $tire->setRimSize($request->request->get('rimsize'));

        // tell Doctrine you want to (eventually) save the Product
        // (no queries yet)
        $entityManager->persist($tire);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('tires_show_all');
    }

    /**
     * @Route("/projk/register_form", name="register_tire_form")
     */
    public function registerBookForm(): Response
    {
        return $this->render('project/register_tire_form.html.twig');
    }

    /**
     * @Route(
     *     "/proj/show",
     *     name="tires_show_all",
     *     methods={"GET"})
     */
    public function showAllTires(
        ProjectRepository $projectRepository
    ): Response {
        $tires = $projectRepository
            ->findAll();

        $data = [
            'tires' => $tires
        ];

        return $this->render('project/show_all_tires.html.twig', $data);
    }

    /**
     * @Route(
     *     "/proj/show/{id}",
     *     name="tires_by_id",
     *     methods={"GET"})
     */
    public function showTireById(
        ProjectRepository $projectRepository,
        int $id
    ): Response {
        $tire = $projectRepository
            ->find($id);

        $data = [
            'tire' => $tire
        ];

        return $this->render('project/tire_details.html.twig', $data);
    }

    /**
     * @Route("/proj/update_form/{id}", name="tires_update_form")
     */
    public function updateTireForm(
        ProjectRepository $projectRepository,
        int $id
    ): Response {
        $tire = $projectRepository
            ->find($id);

        $data = [
            'tire' => $tire
        ];

        return $this->render('project/update_tire_form.html.twig', $data);
    }

    /**
     * @Route(
     *     "/proj/update/{id}",
     *     name="tires_update",
     *     methods={"POST"})
     * @throws Exception
     */
    public function updateTire(
        ProjectRepository $projectRepository,
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $id = $request->request->get('id');
        $entityManager = $doctrine->getManager();
        $tire = $projectRepository->find($id);

        if (!$tire) {
            throw $this->createNotFoundException(
                'No tire found for id ' . $id
            );
        }
        
        error_log(print_r("BRAAAAAAAAAAAAAAAND", true));
        error_log(print_r($request->request->get('brand'), true));

        $tire->setBrand($request->request->get('brand'));
        $tire->setModel($request->request->get('model'));
        $tire->setWidth($request->request->get('width'));
        $tire->setProfile($request->request->get('profile'));
        $tire->setRimSize($request->request->get('rimsize'));
        $entityManager->flush();

        $data = [
            'id' => $id
        ];

        return $this->redirectToRoute('tires_by_id', $data);
    }

    /**
     * @Route(
     *     "/proj/delete/{id}",
     *     name="tires_delete_by_id",
     *     methods={"POST"})
     */
    public function deleteTireById(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $tire = $entityManager->getRepository(Tire::class)->find($id);

        if (!$tire) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }

        $entityManager->remove($tire);
        $entityManager->flush();

        return $this->redirectToRoute('tires_show_all');
    }
}
