<?php 
trait Factory {

    /**
     * @var int
     */
    protected $times = 1;

    /**
     * @param $count
     * @return $this
     */
    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }


    /**
     * Make a new record in the DB
     *
     * @param $type
     * @param array $fields
     * @throws BadMethodCallException
     */
    protected function make($type, array $fields = [])
    {
        while ($this->times--)
        {
            $stub = array_merge($this->getStub(), $fields);

            $type::create($stub);
        }
    }


    /**
     * @throws BadMethodCallException
     */
    public function getStub()
    {
        throw new BadMethodCallException('Create your own getStub method to declare your fields.');
    }
}