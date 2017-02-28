<?php

namespace AppBundle\Model;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents a Question within the set, e.g. a single form
 */
class Question
{
    protected $questionId; //= order in which questions appear
    protected $questionsSet;
    protected $questionText;
    protected $answers;
    protected $chosenAnswerId = null; //null = no answer chosen
    
    
    /**
     * @param int $questionId
     * @param string $questionText
     * @param Collection|null $answers
     * @param int|null $chosenAnswerId
     */
    function __construct($questionId, $questionText, Collection $answers = null, $chosenAnswerId = null)
    {
        $this->questionId = $questionId;
        $this->questionText = $questionText;
        if ($answers === null) {
            $answers = new ArrayCollection();
        }
        $this->answers = $answers;
        $this->chosenAnswerId = $chosenAnswerId;
    }

    /**
     * @return QuestionsSet
     */
    public function getQuestionsSet()
    {
        return $this->questionsSet;
    }

    /**
     * @param QuestionsSet $questionsSet
     */
    public function setQuestionsSet(QuestionsSet $questionsSet)
    {
        $this->questionsSet = $questionsSet;
    }
    
    /**
     * @return array
     */
    public function getAnswersTexts()
    {
        return array_map(function($answer) { return $answer->getAnswerText(); },
                         $this->answers->toArray());
    }
    
    /**
     * @return array Array with key as answer text and answer id as value
     */
    public function getAnswersArray()
    {
        $answerArray = array();
        foreach ($this->answers as $answer) {
            $answerArray[$answer->getAnswerText()] = $answer->getAnswerId();
        }
        
        return $answerArray;
    }
    
    public function getQuestionId()
    {
        return $this->questionId;
    }

    public function getQuestionText()
    {
        return $this->questionText;
    }

    public function setQuestionText($questionText)
    {
        $this->questionText = $questionText;
    }

    /**
     * @return Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param Collection $answers
     */
    public function setAnswers(Collection $answers)
    {
        $this->answers = $answers;
    }
    
    public function getChosenAnswerId()
    {
        return $this->chosenAnswerId;
    }

    public function setChosenAnswerId($chosenAnswerId)
    {
        $this->chosenAnswerId = $chosenAnswerId;
    }
}