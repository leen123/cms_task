<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class CreateFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create files like models or controller ... etc';

    /**
     * Execute the console command.
     */
    public function handle()
    {
   
        $extendeCommand = new ExtendeCreateFileCommand();
        $extendeCommand->createAllFiles();
    }
}

Class ExtendeCreateFileCommand{
    public function createAllFiles(){
        $this->createModels();
        $this->createControllers();
        $this->createRequests();
        $this->createResources();
        $this->createSeeders();
         $this->createFactory();
    }

    public function createModels(){
        $models=[
            'Admin\Articles',
       
            

       ];

         foreach($models as $name){
       Artisan::call('make:model',[
           'name'=>$name ,
           '-m' => true
       ]);
       }
   }


   public function createFactory(){
    $factors=[
    
   ];


     foreach($factors as $name){
   Artisan::call('make:factory',[
       'name'=>$name .'Factory',
   ]);
   }
}

public function createControllers(){
     $controllers=[
        'Auth\UserAuth',
        'Admin\Articles',
        'Admin\Editor',

    
        

    ];
    foreach($controllers as $name){
  Artisan::call('make:controller',[
      'name'=>$name . 'Controller',
      '--api' => true
  ]);
  }
}


public function createRequests(){
     $requests=[
      'Auth\UserLogin',
      'Admin\Articles',
      'Admin\Editor',
      'Admin\UpdateEditor',
      'Admin\SetPermissionEditor',
    
        

    ];
  foreach($requests as $name){
    Artisan::call('make:request',[
        'name'=>$name .'Request',

    ]);
  }
}


public function createResources(){

$resources=[

      'User',
      'Admin\Articles',
      'Admin\Editors',
  


];

    foreach($resources as $name){
      Artisan::call('make:resource',[
          'name'=>$name .'Resource',

      ]);
    }
}

public function createSeeders(){
    $seeders=[
        'Admin',
        'Editor',
        'Role'
   

   ];
   foreach($seeders as $name){
 Artisan::call('make:seeder',[
     'name'=>$name . 'Seeder',
 ]);
 }
}

}
