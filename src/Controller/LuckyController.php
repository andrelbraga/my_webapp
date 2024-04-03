<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\MessageGenerator;
use Psr\Log\LoggerInterface;

class LuckyController extends AbstractController
{
  public function __construct(
    private LoggerInterface $logger,
  ) {
  }

  #[Route('/lucky/number')]
  public function number(MessageGenerator $messageGenerator): Response
  {
    $message = $messageGenerator->getHappyMessage();
    $number = random_int(0, 100);
    
    $this->logger->info($number);

    return $this->json([
      'number' => $message,
    ]);
  }
}