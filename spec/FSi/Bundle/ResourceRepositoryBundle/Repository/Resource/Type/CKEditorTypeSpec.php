<?php

namespace spec\FSi\Bundle\ResourceRepositoryBundle\Repository\Resource\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Validator\Constraints\NotBlank;

class CKEditorTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('resource_group.resource_ckeditor');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('FSi\Bundle\ResourceRepositoryBundle\Repository\Resource\Type\CKEditorType');
    }

    function it_is_resource()
    {
        $this->shouldImplement('FSi\Bundle\ResourceRepositoryBundle\Repository\Resource\Type\ResourceInterface');
    }

    function it_return_text_entity_field()
    {
        $this->getResourceProperty()->shouldReturn('textValue');
    }

    function it_return_valid_name()
    {
        $this->getName()->shouldReturn('resource_group.resource_ckeditor');
    }

    function it_return_form_builder(FormFactory $factory, FormBuilder $form)
    {
        $factory->createNamedBuilder('textValue', 'ckeditor', null, array(
            'label' => false,
            'required' => false,
        ))->shouldBeCalled()->willReturn($form);

        $this->getFormBuilder($factory)->shouldReturnAnInstanceOf('Symfony\Component\Form\FormBuilder');
    }

    function it_return_form_builder_with_validation_constraints(FormFactory $factory, FormBuilder $form, NotBlank $constraint)
    {
        $this->addConstraint($constraint);

        $factory->createNamedBuilder('textValue', 'ckeditor', null, array(
            'label' => false,
            'required' => false,
            'constraints' => array(
                $constraint
            )
        ))->shouldBeCalled()->willReturn($form);

        $this->getFormBuilder($factory)->shouldReturnAnInstanceOf('Symfony\Component\Form\FormBuilder');
    }

    function it_return_form_builder_with_form_options_added_to_resource_definition(FormFactory $factory, FormBuilder $form)
    {
        $this->setFormOptions(array(
            'attr' => array(
                'class' => 'class-name'
            )
        ));

        $factory->createNamedBuilder('textValue', 'ckeditor', null, array(
            'label' => false,
            'required' => false,
            'attr' => array(
                'class' => 'class-name'
            )
        ))->shouldBeCalled()->willReturn($form);

        $this->getFormBuilder($factory)->shouldReturnAnInstanceOf('Symfony\Component\Form\FormBuilder');
    }
}
