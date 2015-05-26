<?php

namespace Acme\DemoBundle\Tests\Form;

use \Symfony\Component\Form\Test\TypeTestCase;
use \Symfony\Component\Validator\Validation;

/**
 * @author gnat
 */
class UserTypeTest extends TypeTestCase
{
    public function testUserType()
    {
		$formData = array('email'=>'user@example.net');
        $type = new \Acme\DemoBundle\Form\UserType();
        $this->assertEquals('acme_demobundle_user', $type->getName());

        $form = $this->factory->create($type);
        $form->submit($formData);

        $object = $form->getData();

        $this->assertInstanceOf('\Acme\DemoBundle\Entity\User', $object);
        $view     = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $violations = $validator->validate($object);
        $this->assertCount(0, $violations);
    }
}
