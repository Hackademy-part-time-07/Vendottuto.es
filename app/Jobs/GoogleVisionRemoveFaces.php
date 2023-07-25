<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Vertex;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;

class GoogleVisionRemoveFaces implements ShouldQueue
{
  
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($image_id)
    {
        $this->image_id=$image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->image_id);
        if (!$i){
            return;
        }
        $srcPath= storage_path('/app/public/'.$i->path);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credentials.json'));

        $imageAnnotator= new ImageAnnotatorClient();

        $response=$imageAnnotator->faceDetection($image);

        $imageAnnotator->close();

        $faces=$response->getFaceAnnotations();

        foreach ($faces as $face){

            $vertices=$face->getBoundingPoly()->getVertices();
            
            $bounds=[];

            foreach($vertices as $vertex){
                $bounds[]= [$vertex->getX(),$vertex->getY()];
            }
            $w=$bounds[2][0] - $bounds[0][0];
            $h=$bounds[2][1] - $bounds[0][1];
            
            $image= SpatieImage::load($srcPath);

            $image->watermark(base_path('/resources/images/pixel_face_remove.jpeg'))
                ->watermarkPosition('top-left')
                ->watermarkPadding($bounds[0][0],$bounds[0][1])
                ->watermarkWidth($w,Manipulations::UNIT_PIXELS)
                ->watermarkHeight($h,Manipulations::UNIT_PIXELS)
                ->watermarkFit(Manipulations::FIT_STRETCH);
                
            $image->save($srcPath);
        }

    }
}
