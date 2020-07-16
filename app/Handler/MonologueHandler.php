<?php

namespace App\Handler;

use Carbon\Carbon;
use App\Models\Speaker;
use App\Models\Monologue;
use App\Enum\DateFormatEnum;
use App\Models\Transcription;
use App\Models\MonologueElement;
use \Spatie\WebhookClient\ProcessWebhookJob;

/**
 * 
 */
class MonologueHandler extends ProcessWebhookJob
{
    /**
     * @var Transcription
     */
    protected $transcription;

    /**
     * Handles the incoming webhook for the transcription.
     */
    public function handle()
    {
        $dataArray = json_decode($this->webhookCall, true);
        $request = json_decode($dataArray['payload']['transcription']);
        
        $speakers = $request->speakers;
        $monologues = $request->monologues;

        $this->transcription = Transcription::create();
        $this->saveSpeakers($speakers);
        $this->saveMonologues($monologues);
    }

    /**
     * @param array
     */
    protected function saveSpeakers(array $speakers)
    {
        $speakerArray = [];
        
        foreach ($speakers as $speaker) {
            $speakerArray[] = new Speaker([
                'full_name' => $speaker->name,
            ]);
        }

        $this->transcription->speakers()->saveMany($speakerArray);
    }

    /**
     * @param array $monologues
     */
    protected function saveMonologues(array $monologues)
    {
        $speakers = $this->transcription->speakers()->pluck('full_name', 'id')->toArray();

        foreach ($monologues as $monologue) {
            $speakerId = array_search($monologue->speaker_name, $speakers);
            $monologueObj = new Monologue([
                'speaker_id' => $speakerId,
            ]);

            $object = $this->transcription->monologues()->save($monologueObj);

            $this->saveElements($object, $monologue->elements);
        }
    }

    /**
     * @param Monologue $monologue
     * @param array     $elements
     */
    protected function saveElements(Monologue $monologue, array $elements)
    {
        foreach ($elements as $element) {
            $start = null;
            $end = null;

            if (isset($element->timestamp)) {
                $start = $this->convertTimestamp($element->timestamp);
                $end = $this->convertTimestamp($element->end_timestamp);
            }

            $ele = new MonologueElement([
                'line_type' => $element->type,
                'line_value' => $element->value,
                'start_time' => $start,
                'end_time' => $end,
            ]);

            $monologue->elements()->save($ele);
        }
    }

    /**
     * Converts the timestamps if provided. 
     * 
     * @param string $convert
     * 
     * @return string
     */
    private function convertTimestamp(string $convert) 
    {
        $carbon = Carbon::createFromFormat(DateFormatEnum::MONO_TIME, $convert);
        $convert = $carbon->format(DateFormatEnum::MYSQL);

        return $carbon->format(DateFormatEnum::MYSQL);
    }
}  