<?php

/**
 * (c) Fabryka Stron Internetowych sp. z o.o <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FSi\Bundle\ResourceRepositoryBundle\Repository\Resource\Type;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Validator\Constraints\Email;

class DateType extends AbstractType
{
    /**
     * @var \Symfony\Component\Form\FormBuilder
     */
    protected $formBulder;

    /**
     * {@inheritdoc}
     */
    public function getResourceProperty()
    {
        return 'dateValue';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFormType()
    {
        return 'date';
    }
}