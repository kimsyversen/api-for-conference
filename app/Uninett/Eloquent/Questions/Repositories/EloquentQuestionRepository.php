<?php namespace Uninett\Eloquent\Questions\Repositories;


use Carbon\Carbon;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Questions\Question;
use Uninett\Eloquent\Ratings\Events\QuestionWasPosted;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Exceptions\QuestionValidationException;

class EloquentQuestionRepository {

    use EventGenerator;

    /**
     * @var Session
     */
    private $session;

    /**
     * @param $session_id
     * @return Session
     */
    private function getSession($session_id)
    {
        return $this->session ?: $this->session = Session::with('conference')->findOrFail($session_id);
    }

    public function postQuestion($conference_id, $session_id, $user_id, $question)
    {
        $errors = $this->getCreateQuestionErrors($conference_id, $session_id, $user_id);

        if (! empty($errors))
            throw new QuestionValidationException('post_question_validation', $errors, 422);

        $questionModel = new Question([
            'user_id' => $user_id,
            'text' => $question
        ]);

        $this->getSession($session_id)->questions()->save($questionModel);

        $this->raise(new QuestionWasPosted($questionModel));

        return $questionModel;
    }


    public function getCreateQuestionErrors($conference_id, $session_id, $user_id)
    {
        $statuses = $this->getCreateQuestionStatuses($conference_id, $session_id, $user_id);

        $errors = [];

        if ($statuses[0]['code'] != 0)
            foreach ($statuses as $status)
            {
                $errors[] = [$status['message']];
            }

        return $errors;
    }

    public function getCreateQuestionStatuses($conference_id, $session_id, $user_id)
    {
        $statuses = [];

        // Can only post questions if the session is within the conference
        if ($this->getSession($session_id)->conference->id != $conference_id)
            $statuses[] = [
                'code' => 1,
                'message' => 'The session is not hosted by the current conference.'
            ];

        // Can only post questions after session has started
        $now = Carbon::now();
        if (! ($this->getSession($session_id)->start_time < $now))// && $now < $this->getSession($session_id)->end_time))
            $statuses[] = [
                'code' => 2,
                'message' => 'Can only post questions after session has started'
            ];

        // TODO: Can only post questions to sessions you are attending
        // TODO: Can only post questions to conference you are attending

        if (empty($statuses))
            $statuses[] = [
                'code' => 0,
                'message' => 'The user can post a question to this session.'
            ];

        return $statuses;
    }


}