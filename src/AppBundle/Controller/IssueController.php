<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\QuestionType;
use AppBundle\Model\Answer;
use AppBundle\Model\Question;
use Doctrine\Common\Collections\ArrayCollection;

class IssueController extends Controller
{
    /**
     * @Route("/", name="show_question")
     * @Template()
     */
    public function showQuestionAction(Request $request)
    {
        $question = new Question(1, 'Question', new ArrayCollection(array(
                new Answer(1, 'answer1'),
                new Answer(2, 'answer2'),
                new Answer(3, 'answer3'),
                new Answer(4, 'answer4')
            )));
        $form = $this->createForm(QuestionType::class, $question);
        
        return array(
            'questionText' => $question->getQuestionText(),
            'form' => $form->createView()
        );
    }
}