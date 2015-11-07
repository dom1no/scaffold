<?php

namespace Laralib\L5scaffold\Makes;


use Illuminate\Filesystem\Filesystem;
use Laralib\L5scaffold\Commands\ScaffoldMakeCommand;

trait MakerTrait {

    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;
    protected $scaffoldCommandM;

    /**
     * @param ScaffoldMakeCommand $scaffoldCommand
     * @param Filesystem $files
     */
    public function __construct(ScaffoldMakeCommand $scaffoldCommand, Filesystem $files){
        $this->files = $files;
        $this->scaffoldCommandM = $scaffoldCommand;

        $this->generateNames($scaffoldCommand);
    }


    /**
     * Get the path to where we should store the controller.
     *
     * @param $file_name
     * @param string $path
     * @return string
     */
    protected function getPath($file_name, $path='controller'){

        if($path == "controller"){
            return config('scaffold.controllers_path') . $file_name . '.php';

        } elseif($path == "model"){
            return config('scaffold.models_path') . $file_name . '.php';

        } elseif($path == "seed"){
            return config('scaffold.seeds_path') . $file_name . '.php';

        } elseif($path == "view-index"){
            return config('scaffold.views_path') . $file_name . '/index.blade.php';

        } elseif($path == "view-edit"){
            return config('scaffold.views_path') . $file_name . '/edit.blade.php';

        } elseif($path == "view-show"){
            return config('scaffold.views_path') . $file_name . '/show.blade.php';

        } elseif($path == "view-create"){
            return config('scaffold.views_path') . $file_name . '/create.blade.php';

        }
    }




    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {

        if ( ! $this->files->isDirectory(dirname($path)))
        {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }







}