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
    public string $id;
    public string $name;
    public string $target;
    /** @var string[] */
    public array $secondaryMuscles;
    /** @var string[] */
    public array $instructions;

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
        string $target,
        array $secondaryMuscles,
        array $instructions
    ) {
        $this->bodyPart = $bodyPart;
        $this->equipment = $equipment;
        $this->gifUrl = $gifUrl;
        $this->id = $id;
        $this->name = $name;
        $this->target = $target;
        $this->secondaryMuscles = $secondaryMuscles;
        $this->instructions = $instructions;
    }
}
