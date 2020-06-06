<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\RouterProperty;

class DataGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:denerator {number*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
       $number = $this->argument('number');
      if(!empty($number) && is_numeric($number[0]) && $number[0] > 0) {
        for ($i=0;$i < $number[0];$i++) {
            $requestData['sapid'] = $this->random_strings(15);
            $requestData['host_name'] = $this->random_strings(10).'.com';
            $requestData['loop_back'] = long2ip(mt_rand());
            $requestData['mac_address'] = $this->getrendom_mac_address();
            RouterProperty::create($requestData);
        }
      }
    }


    function getrendom_mac_address(){
       return implode(':', str_split(str_pad(base_convert(mt_rand(0, 0xffffff), 10, 16) . base_convert(mt_rand(0, 0xffffff), 10, 16), 12), 2));
    }
    function random_strings($length_of_string) {

    // md5 the timestamps and returns substring
    // of specified length
    return substr(md5(time()), 0, $length_of_string);
}

}
