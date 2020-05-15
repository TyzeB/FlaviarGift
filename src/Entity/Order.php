<?php

namespace App\Entity;

use App\Repository\RecipientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipientRepository::class)
 * @ORM\Table(name="`Order`")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientCity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientState;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientZipCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipientCountry;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $giftcardSendDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $personalMessageName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $personalMessage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $subscriptionTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cardPhysical;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sendToThem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function getRecipientEmail(): ?string
    {
        return $this->recipientEmail;
    }

    public function setRecipientEmail(string $recipientEmail): self
    {
        $this->recipientEmail = $recipientEmail;

        return $this;
    }

    public function getRecipientName(): ?string
    {
        return $this->recipientName;
    }

    public function setRecipientName(string $recipientName): self
    {
        $this->recipientName = $recipientName;

        return $this;
    }

    public function getRecipientAddress(): ?string
    {
        return $this->recipientAddress;
    }

    public function setRecipientAddress(string $recipientAddress): self
    {
        $this->recipientAddress = $recipientAddress;

        return $this;
    }

    public function getRecipientCity(): ?string
    {
        return $this->recipientCity;
    }

    public function setRecipientCity(string $recipientCity): self
    {
        $this->recipientCity = $recipientCity;

        return $this;
    }

    public function getRecipientState(): ?string
    {
        return $this->recipientState;
    }

    public function setRecipientState(string $recipientState): self
    {
        $this->recipientState = $recipientState;

        return $this;
    }

    public function getRecipientZipCode(): ?string
    {
        return $this->recipientZipCode;
    }

    public function setRecipientZipCode(string $recipientZipCode): self
    {
        $this->recipientZipCode = $recipientZipCode;

        return $this;
    }

    public function getRecipientCountry(): ?string
    {
        return $this->recipientCountry;
    }

    public function setRecipientCountry(string $recipientCountry): self
    {
        $this->recipientCountry = $recipientCountry;

        return $this;
    }

    public function getGiftCardSendDate(): ?\DateTimeInterface
    {
        return $this->giftcardSendDate;
    }

    public function setGiftCardSendDate(?\DateTimeInterface $giftcardSendDate): self
    {
        $this->giftcardSendDate = $giftcardSendDate;

        return $this;
    }

    public function getPersonalMessageName(): ?string
    {
        return $this->personalMessageName;
    }

    public function setPersonalMessageName(?string $personalMessageName): self
    {
        $this->personalMessageName = $personalMessageName;

        return $this;
    }

    public function getPersonalMessage(): ?string
    {
        return $this->personalMessage;
    }

    public function setPersonalMessage(?string $personalMessage): self
    {
        $this->personalMessage = $personalMessage;

        return $this;
    }

    public function getSubscriptionTime(): ?\DateTimeInterface
    {
        return $this->subscriptionTime;
    }

    public function setSubscriptionTime(\DateTimeInterface $subscriptionTime): self
    {
        $this->subscriptionTime = $subscriptionTime;

        return $this;
    }

    public function getCardPhyiscal(): ?bool
    {
        return $this->cardPhysical;
    }

    public function setCardPhysical(bool $cardPhysical): self
    {
        $this->cardPhysical = $cardPhysical;

        return $this;
    }

    public function getSendToThem(): ?bool
    {
        return $this->sendToThem;
    }

    public function setSendToThem(bool $sendToThem): self
    {
        $this->sendToThem = $sendToThem;

        return $this;
    }
}
