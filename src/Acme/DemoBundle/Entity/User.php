<?php

namespace Acme\DemoBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity
* @UniqueEntity(fields={"email"})
*/
class User
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="id",type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(name="email",type="string")
     */
	private $email;

	public function getId()
	{
		return $id;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}
}
