<?php

namespace App\Controller;

use App\Entity\CardEntity;
use App\Form\CardType;
use App\Repository\CardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(CardRepository $cardRepository): Response
    {
        $cards = $cardRepository->findAll();
        return $this->render('main/index.html.twig', [
            'cards' => $cards,
        ]);
    }

    /**
     * @Route("/card/{id}", name="singleCard")
     */
    public function singleCard(string $id, CardRepository $cardRepository): Response
    {
        $card = $cardRepository->findOneBy(['id' => $id]);
        return $this->render('main/singleCard.html.twig', [
            'card' => $card,
        ]);
    }

    /**
     * @Route("/card", name="cardCreation")
     */
    public function createCard(EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(CardType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $card = $form->getData();

            $uploadedFile = $form['image']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );

            $card->setImage($newFilename);
            $em->persist($card);
            $em->flush();

            return $this->redirectToRoute('main');
        }
        return $this->render('main/card.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
