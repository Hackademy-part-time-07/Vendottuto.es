<?php

namespace App\Jobs;



use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSafeSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($image_id)
    {
        $this->image_id = $image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i= Image::find($this->image_id);
            if(!$i){
                return;
            }
        $image = file_get_contents(storage_path('/app/public/'.$i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credentials.json'));

        $imageAnnotador = new ImageAnnotatorClient();
        $response=$imageAnnotador->safeSearchDetection($image);
        $imageAnnotador->close();
        $safe = $response->getSafeSearchAnnotation();
        
        $adult = $safe->getAdult();
        $medical=$safe->getMedical();
        $spoof=$safe->getSpoof();
        $violence=$safe->getViolence();
        $racy=$safe->getRacy();

        $likellihoodName=['UNKNOWN','VERY_UNLIKELY','UNLIKELY','POSSIBLE','LIKELY','VERY_LIKELY'];

        $i ->adult= $likellihoodName[$adult];
        $i ->medical= $likellihoodName[$medical];
        $i ->spoof= $likellihoodName[$spoof];
        $i ->violence= $likellihoodName[$violence];
        $i ->racy= $likellihoodName[$racy];
        $i ->save();
        

    }
}
