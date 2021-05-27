<?php

namespace App\EventDispatcher;

use App\Event\ProductViewEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductViewSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            "product.view" => "sendViewEmail"
        ];
    }

    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function sendViewEmail(ProductViewEvent $productViewEvent)
    {
        $this->logger->info("Email envoyé pour le produit n° " . $productViewEvent->getProduct()->getId());
    }
}