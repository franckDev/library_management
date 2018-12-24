<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
 */
class Book
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="books")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=255)
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=255)
     */
    private $editor;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="blob")
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="encrypt_name", type="string", length=255)
     */
    private $encryptName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set kind
     *
     * @param string $kind
     *
     * @return Book
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set editor
     *
     * @param string $editor
     *
     * @return Book
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Book
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        if ($this->shortDescription <> null)
            return stream_get_contents($this->shortDescription);
        else
            return $this->shortDescription;
    }

    /**
     * Set encryptName
     *
     * @param string $encryptName
     *
     * @return Book
     */
    public function setEncryptName($encryptName)
    {
        if($encryptName != "")
            $this->encryptName = $encryptName;

        return $this;
    }

    /**
     * Get encryptName
     *
     * @return string
     */
    public function getEncryptName()
    {
        return $this->encryptName;
    }
    
    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Book
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }
    
    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    
}

