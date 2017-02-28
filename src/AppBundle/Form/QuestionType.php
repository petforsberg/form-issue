<?php

namespace AppBundle\Form;

use AppBundle\Model\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    private $questionClass;
    private $expanded;
    private $multiple;

    
    /**
     * @param type $questionClass
     * @param type $expanded
     * @param type $multiple
     */
    public function __construct($questionClass = Question::class, $expanded = true, $multiple = false)
    {
        $this->questionClass = $questionClass;
        $this->expanded = $expanded;
        $this->multiple = $multiple;
    }
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = $builder->getData()->getAnswers(); // = ArrayCollection
        $builder->add('answers', ChoiceType::class, array('choices' => $choices,
                    'expanded' => $this->expanded, 'multiple' => $this->multiple,
                    'choice_label' => function ($answer, $key) {
//you may want to uncomment these as well
//dump($key);
//dump($answer);
                        return $answer->getAnswerText();
                    },
                    'choice_value' => function ($answer) {
//check this value
dump($answer);
                        return null;//$answer->getAnswerId(); //anything different than null causes an error
                    }));
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => $this->questionClass
        ]);
    }
}