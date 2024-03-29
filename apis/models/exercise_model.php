<?php
class ExerciseList
{
    /** @var RootObject[] */
    public array $exerciseList;

    /**
     * @param RootObject[] $rootObject
     */
    public function __construct(array $exerciseList)
    {
        $this->exerciseList = $exerciseList;
    }
}

class Exercise
{
    public string $bodyPart;
    public string $equipment;
    public string $gifUrl;
    public int $id;
    public string $name;


    /**
     * @param string[] $secondaryMuscles
     * @param string[] $instructions
     */
    public function __construct(
        string $bodyPart,
        string $equipment,
        string $gifUrl,
        string $id,
        string $name,
    ) {
        $this->bodyPart = $bodyPart;
        $this->equipment = $equipment;
        $this->gifUrl = $gifUrl;
        $this->id = $id;
        $this->name = $name;
    }
}
