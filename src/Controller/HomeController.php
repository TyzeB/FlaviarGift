<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/api/order", name="make_order")
     * @param $request
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function makeOrder(Request $request, EntityManagerInterface $entityManager)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $giftcardFmt = $data['gift_card'];
        $whoRecieves = $data['recipient'];
        $duration = $data['duration'];

        $order = new Order();
        $order->setCardPhysical($giftcardFmt === 'handwritten');
        $order->setSendToThem($whoRecieves === 'them');
        $order->setSubscriptionTime($this->getEndDate($duration));
        $order->setUserName($data['user_name']);
        $order->setUserEmail($data['user_email']);

        if ($whoRecieves === 'them') {
            $order->setRecipientEmail($data['recipient_email']);
            if ($giftcardFmt === 'handwritten') {
                $order->setRecipientName($data['recipient_name']);
                $order->setRecipientAddress($data['recipient_address']);
                $order->setRecipientCity($data['recipient_city']);
                $order->setRecipientZipCode($data['recipient_zip_code']);
                $order->setRecipientState($data['recipient_state']);
                $order->setRecipientCountry($data['recipient_country']);
                $order->setGiftCardSendDate(new \DateTime($data['selectedDate']));
            }
        }

        $order->setPersonalMessageName($data['their_name']);   
        $order->setPersonalMessage($data['personal_message']);

        $entityManager->persist($order);
        $entityManager->flush();

        return new Response('Order with id ' . $order->getId() . ' was submitted! Thank you for your purchase.');
    }

    public function getEndDate($duration) {
        $date = new \DateTime();
        if ($duration === 'half_year') {
            $date = $date->modify('+6 months');
        } else {
            $date = $date->modify('+1 year');
        }

        return $date;
    }
}
