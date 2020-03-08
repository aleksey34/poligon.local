<?php

namespace App\Jobs\GenerateCatalog;

//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Queue\SerializesModels;

class GenerateCatalogMainJob extends AbstractJob
{
  //  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->debug('start');


        GenerateCatalogCacheJob::dispatchNow();

        $chainPrices = $this->getChainPrices();

        $chainMain =[
			new GenerateCategoriesJob() ,
	        new GenerateDeliveriesJob(),
	        new GeneratePointsJob(),
        ];

        $chainLast = [
        	new ArchiveUploadsJob(),
	        new SendPriceRequestJob()

        ];

        $chain = array_merge($chainPrices , $chainMain, $chainLast);

        GenerateGoodsFileJob::withChain($chain)->dispatch();

        $this->debug('finish');

    }
}
