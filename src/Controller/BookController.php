<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
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
     * @Route("/books/register", name="register_book")
     */
    public function registerBook(
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        $book->setTitle($request->request->get('title'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setAuthor($request->request->get('author'));
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
     * @Route("/books/show", name="books_show_all")
     */
    public function showAllBooks(
        BookRepository $bookRepository
    ): Response {

        //Fixa twig för detta, som visar upp den.
        $books = $bookRepository
            ->findAll();

        $data = [
            'books' => $books
        ];

        return $this->render('books/show_all_books.html.twig', $data);
    }

    /**
     * @Route("/books/show/{id}", name="books_by_id")
     */
    public function showBookById(
        BookRepository $bookRepository,
        int $id
    ): Response {

        //Fixa twig för detta, som visar upp den.
        $book = $bookRepository
            ->find($id);

        return $this->json($book);
    }

    /**
     * @Route("/books/delete/{id}", name="books_delete_by_id")
     */
    public function deleteBookById(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id '.$id
            );
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('books_show_all');
    }

    /**
     * @Route("/books/update/{id}/{value}", name="book_update")
     */
    public function updateBook(
        ManagerRegistry $doctrine,
        int $id,
        int $title,
        int $isbn,
        int $author,
        int $imgUrl,
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id '.$id
            );
        }

        $book->setValue($title);
        $book->setValue($isbn);
        $book->setValue($author);
        $book->setValue($imgUrl);
        $entityManager->flush();

        return $this->redirectToRoute('books_show_all');
    }
}
