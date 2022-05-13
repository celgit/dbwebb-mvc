<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BookController extends AbstractController
{
    #[Route('/books', name: 'app_books')]
    public function index(): Response
    {
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    /**
     * @Route(
     *     "/books/register",
     *     name="register_book",
     *     methods={"POST"} )
     */
    public function registerBook(
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        /**
         * @phpstan-ignore-next-line
         */
        $book->setTitle($request->request->get('title'));
        /**
         * @phpstan-ignore-next-line
         */
        $book->setIsbn($request->request->get('isbn'));
        /**
         * @phpstan-ignore-next-line
         */
        $book->setAuthor($request->request->get('author'));
        /**
         * @phpstan-ignore-next-line
         */
        $book->setImageUrl($request->request->get('image_url'));

        $entityManager->persist($book);

        $entityManager->flush();

        return $this->redirectToRoute('books_show_all');
    }

    /**
     * @Route("/books/register_form", name="register_book_form")
     */
    public function registerBookForm(): Response
    {
        return $this->render('books/register_book_form.html.twig');
    }

    /**
     * @Route(
     *     "/books/show",
     *     name="books_show_all",
     *     methods={"GET"})
     */
    public function showAllBooks(
        BookRepository $bookRepository
    ): Response {
        $books = $bookRepository
            ->findAll();

        $data = [
            'books' => $books
        ];

        return $this->render('books/show_all_books.html.twig', $data);
    }

    /**
     * @Route(
     *     "/books/show/{id}",
     *     name="books_by_id",
     *     methods={"GET"})
     */
    public function showBookById(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository
            ->find($id);

        $data = [
            'book' => $book
        ];

        return $this->render('books/book_details.html.twig', $data);
    }

    /**
     * @Route("/books/update_form/{id}", name="books_update_form")
     */
    public function updateBookForm(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository
            ->find($id);

        $data = [
            'book' => $book
        ];

        return $this->render('books/update_book_form.html.twig', $data);
    }

    /**
     * @Route(
     *     "/books/update/{id}",
     *     name="books_update",
     *     methods={"POST"})
     * @throws Exception
     */
    public function updateBook(
        BookRepository $bookRepository,
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $id = $request->request->get('id');
        $entityManager = $doctrine->getManager();
        $book = $bookRepository->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }

        /**
         * @phpstan-ignore-next-line
         */
        $book->setTitle($request->request->get('title'));
        /**
         * @phpstan-ignore-next-line
         */
        $book->setIsbn($request->request->get('isbn'));
        /**
         * @phpstan-ignore-next-line
         */
        $book->setAuthor($request->request->get('author'));
        /**
         * @phpstan-ignore-next-line
         */
        $book->setImageUrl($request->request->get('image_url'));
        $entityManager->flush();

        $data = [
            'id' => $id
        ];

        return $this->redirectToRoute('books_by_id', $data);
    }

    /**
     * @Route(
     *     "/books/delete/{id}",
     *     name="books_delete_by_id",
     *     methods={"POST"})
     */
    public function deleteBookById(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('books_show_all');
    }
}
