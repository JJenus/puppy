<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Setup extends BaseConfig
{
	//--------------------------------------------------------------------
    // Views used by Auth Controllers
    //--------------------------------------------------------------------

    public $views = [
        'dashboard' => 'Views/dashboard/dashboard',
        'main' => 'Views/main',
        'laundry' => 'Views/laundry',
    ];

    //--------------------------------------------------------------------
    // Layout for the Views to extend
    //--------------------------------------------------------------------

    public $viewLayout = 'Views/temp/layout';

}
