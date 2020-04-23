# Introduction

This source using CodeIgniter v.3.1.11 + Modular (HMVC)<br />
Admin Template using AdminLTE v3.0.2


## Feature

- Auth
- Frontend
- Dashboard
- HMVC (Hiraki Module Views Controller)
- RBAC (Role Base Access Controller)
- Dynamic Menu
- Ajax Validation
- CRUD




## CodeIgniter v.3.1.11

User Guide <https://codeigniter.com/docs><br />
Language File Translations <https://github.com/bcit-ci/codeigniter3-translations><br />
Community Forums <http://forum.codeigniter.com/><br />
Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki><br />
Community Slack Channel <https://codeigniterchat.slack.com><br />
Please see the license agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>.

## AdminLTE v.3.0.2

Author: Colorlib<br />
Website: AdminLTE.io <http://adminlte.io><br />
License: Open source - MIT <http://opensource.org/licenses/MIT>


## Add Custom Modules


Make New Folder <br />
<br />
OwnFolder
- controllers
- Own.php
- Models
- Own_models.php
- Views
- index.php
    .
    ├── application                 # Default Folder
    ├── modules                     # HMVC Folder
    │   └── own               
    │       │── controllers
    │           └── Own.php
    │       │── models 
    │           └── Own_model.php              
    │       │── views
    │           │── Core (opsional)
    │           └── index.php               
    

    .
    ├── ...
    ├── docs                    # Documentation files (alternatively `doc`)
    │   ├── TOC.md              # Table of contents
    │   ├── faq.md              # Frequently asked questions
    │   ├── misc.md             # Miscellaneous information
    │   ├── usage.md            # Getting started guide
    │   └── ...                 # etc.
    └── ...

Own.php

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Own extends MX_Controller {

  public function index() {

    //Something Code
    $data = [
        'title' => 'BLANK PAGE'
    ]

    //Custom JS Uncomment If You Want
    // $this->load->view('core/js');

    // Views
    $this->load->view('index', $data);
  }

    // ETC

}
```
<br/>

Own_models.php

```php
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Own_model extends CI_Model
{
    function __construct()
    {
       //somecode
    }

    public function somecode()
    {
        //somecode
    }

   
}

```
index.php

```html

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- SYMLINK WITH CONTROLLER -->
                <h1 class="m-0 text-dark"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- CONTENT -->
    </div>
</section>

```