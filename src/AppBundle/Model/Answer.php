<?php

namespace AppBundle\Model;

/**
 * Represents a single potential choice within a Question, e.g. in a form
 */
class Answer
{
    /**
     * @var int
     */
    protected $answerId;
    /**
     * @var string 
     */
    protected $answerText;
    /**
     * Question that the Answer is related to
     * @var Question 
     */
    protected $question;
    
    
    /**
     * @param string $answerId Identifier to be unique for the related Question only
     * @param string $answerText
     * @param Question $question
     */
    public function __construct($answerId, $answerText, Question $question = null)
    {
        $this->answerId = $answerId;
        $this->answerText = $answerText;
        $this->question = $question;
    }

    
    public function getAnswerId()
    {
        return $this->answerId;
    }

    public function setAnswerId($answerId)
    {
        $this->answerId = $answerId;
    }

    public function getAnswerText()
    {
        return $this->answerText;
    }

    public function setAnswerText($answerText)
    {
        $this->answerText = $answerText;
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param Question $question
     */
    public function setQuestion(Question $question)
    {
        $this->question = $question;
    }
}