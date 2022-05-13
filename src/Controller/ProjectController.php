<?php

namespace App\Controller;

use App\Entity\Tire;
use App\Repository\ProjectRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->render('project/about.html.twig');
    }

    /**
     * @Route("/proj/reset", name="reset_proj_db")
     * @throws Exception
     */
    public function resetProjDb(
        ProjectRepository $projectRepository
    ): Response {
        $projectRepository->resetDatabase();
        $projectRepository->populateDatabase();

        return $this->redirectToRoute('app_project');
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

        $brand = $request->request->get('brand');
        $model = $request->request->get('model');
        $width = $request->request->get('width');
        $profile = $request->request->get('profile');
        $rimSize = $request->request->get('rimsize');

        /**
         * @phpstan-ignore-next-line
         */
        $tire = new Tire($brand, $model, $width, $profile, $rimSize);

        // tell Doctrine you want to (eventually) save the Product
        // (no queries yet)
        $entityManager->persist($tire);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('tires_show_all');
    }

    /**
     * @Route("/proj/register_form", name="register_tire_form")
     */
    public function registerTireForm(): Response
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
            ->findAllSortedByBrand();

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
     */
    public function updateTire(
        ProjectRepository $projectRepository,
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $id = $request->request->get('id');
        $entityManager = $doctrine->getManager();
        $tire = $projectRepository->find($id);

        /**
         * @phpstan-ignore-next-line
         */
        $tire->setBrand($request->request->get('brand'));
        /**
         * @phpstan-ignore-next-line
         */
        $tire->setModel($request->request->get('model'));
        /**
         * @phpstan-ignore-next-line
         */
        $tire->setWidth($request->request->get('width'));
        /**
         * @phpstan-ignore-next-line
         */
        $tire->setProfile($request->request->get('profile'));
        /**
         * @phpstan-ignore-next-line
         */
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

        /**
         * @phpstan-ignore-next-line
         */
        $entityManager->remove($tire);
        $entityManager->flush();

        return $this->redirectToRoute('tires_show_all');
    }

    /**
     * @Route(
     *     "/docs/metrics",
     *     name="docs_metrics",
     *     )
     */
    public function docsMetrics(): Response
    {
        return $this->redirect('metrics/index.html');
    }

    /**
     * @Route(
     *     "/docs/phpdoc",
     *     name="docs_phpdoc",
     *     )
     */
    public function phpDocs(): Response
    {
        return $this->redirect('api/index.html');
    }

    /**
     * @Route(
     *     "/docs/phpunit",
     *     name="docs_phpunit",
     *     )
     */
    public function coverage(): Response
    {
        return $this->redirect('coverage/index.html');
    }
}
